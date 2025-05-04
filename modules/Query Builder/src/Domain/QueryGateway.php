<?php
/*
Gibbon: the flexible, open school platform
Founded by Ross Parker at ICHK Secondary. Built by Ross Parker, Sandra Kuipers and the Gibbon community (https://gibbonedu.org/about/)
Copyright © 2010, Gibbon Foundation
Gibbon™, Gibbon Education Ltd. (Hong Kong)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program. If not, see <http://www.gnu.org/licenses/>.
*/

namespace Gibbon\Module\QueryBuilder\Domain;

use Gibbon\Domain\Traits\TableAware;
use Gibbon\Domain\QueryCriteria;
use Gibbon\Domain\QueryableGateway;

/**
 * @version v16
 * @since   v16
 */
class QueryGateway extends QueryableGateway
{
    use TableAware;

    private static $tableName = 'queryBuilderQuery';
    private static $primaryKey = 'queryBuilderQueryID';

    private static $searchableColumns = ['name', 'category'];

    /**
     * @param QueryCriteria $criteria
     * @return DataSet
     */
    public function queryQueries(QueryCriteria $criteria, $gibbonPersonID, $context = 'Query')
    {
        $data = ['gibbonPersonID' => $gibbonPersonID];
        $gibbonRoleIDAll = $this->db()->selectOne('SELECT gibbonRoleIDAll FROM gibbonPerson WHERE gibbonPersonID=:gibbonPersonID', $data);

        $query = $this
            ->newQuery()
            ->cols([
                'queryBuilderQuery.queryBuilderQueryID', 'name', 'type', 'category', 'active', 'queryBuilderQuery.gibbonPersonID', 'queryID', 'queryBuilderQuery.actionName', 'queryBuilderQuery.moduleName', 'permission.permissionID', '(CASE WHEN queryBuilderFavourite.queryBuilderFavouriteID IS NOT NULL THEN 0 ELSE 1 END) as favouriteOrder',
            ])
            ->from($this->getTableName())
            ->joinSubSelect(
                'LEFT',
                'SELECT gibbonPermission.permissionID, gibbonRole.gibbonRoleID, gibbonAction.name as actionName, gibbonModule.name as moduleName
                FROM gibbonModule
                JOIN gibbonAction ON (gibbonModule.gibbonModuleID=gibbonAction.gibbonModuleID)
                JOIN gibbonPermission ON (gibbonPermission.gibbonActionID=gibbonAction.gibbonActionID)
                JOIN gibbonRole ON (gibbonRole.gibbonRoleID=gibbonPermission.gibbonRoleID)',
                'permission',
                "(permission.actionName=queryBuilderQuery.actionName OR permission.actionName LIKE CONCAT(queryBuilderQuery.actionName, '_%')) AND permission.moduleName=queryBuilderQuery.moduleName AND FIND_IN_SET(permission.gibbonRoleID, :gibbonRoleIDAll)"
            )
            ->leftJoin('queryBuilderFavourite', '(queryBuilderFavourite.queryBuilderQueryID=queryBuilderQuery.queryBuilderQueryID AND queryBuilderFavourite.gibbonPersonID=:gibbonPersonID)')
            ->where('queryBuilderQuery.context=:context')
            ->bindValue('context', $context)
            ->where(function($query) {
                $query->where("(type='Personal' AND queryBuilderQuery.gibbonPersonID=:gibbonPersonID)")
                    ->orWhere("type='School'")
                    ->orWhere("type='gibbonedu.com'");
            })
            ->bindValue('gibbonPersonID', $gibbonPersonID)
            ->bindValue('gibbonRoleIDAll', $gibbonRoleIDAll)
            ->having("((actionName IS NULL OR actionName = '') OR (actionName IS NOT NULL AND permissionID IS NOT NULL))")
            ->groupBy(['queryBuilderQuery.queryBuilderQueryID']);

        return $this->runQuery($query, $criteria);
    }

    public function syncRemoveQueries($queries)
    {
        $queryIDs = array_map(function($query) use ($queries) {
                        return intval($query["queryID"]);
                    }, $queries);

        $queryIDList = implode(",", $queryIDs);

        $sql = "DELETE FROM queryBuilderQuery WHERE type='gibbonedu.com' AND queryID NOT IN ($queryIDList)";
        return $this->db()->delete($sql);
    }

    public function selectActionListByPerson($gibbonPersonID)
    {
        $data = ['gibbonPersonID' => $gibbonPersonID];
        $sql = "(
            SELECT gibbonModule.name as groupBy, CONCAT(gibbonModule.name, ':', SUBSTRING_INDEX(gibbonAction.name, '_', 1)) as value, CONCAT(SUBSTRING_INDEX(gibbonAction.name, '_', 1), ' (grouped)') as name
                FROM gibbonPerson
                JOIN gibbonRole ON (gibbonPerson.gibbonRoleIDPrimary=gibbonRole.gibbonRoleID OR FIND_IN_SET(gibbonRole.gibbonRoleID, gibbonPerson.gibbonRoleIDAll))
                JOIN gibbonPermission ON (gibbonRole.gibbonRoleID=gibbonPermission.gibbonRoleID)
                JOIN gibbonAction ON (gibbonPermission.gibbonActionID=gibbonAction.gibbonActionID)
                JOIN gibbonModule ON (gibbonModule.gibbonModuleID=gibbonAction.gibbonModuleID)
                WHERE gibbonPerson.gibbonPersonID=:gibbonPersonID
                AND gibbonAction.name LIKE '%\_%'
            ) UNION ALL (
                SELECT gibbonModule.name as groupBy, CONCAT(gibbonModule.name, ':', gibbonAction.name) as value, gibbonAction.name as name
                FROM gibbonPerson
                JOIN gibbonRole ON (gibbonPerson.gibbonRoleIDPrimary=gibbonRole.gibbonRoleID OR FIND_IN_SET(gibbonRole.gibbonRoleID, gibbonPerson.gibbonRoleIDAll))
                JOIN gibbonPermission ON (gibbonRole.gibbonRoleID=gibbonPermission.gibbonRoleID)
                JOIN gibbonAction ON (gibbonPermission.gibbonActionID=gibbonAction.gibbonActionID)
                JOIN gibbonModule ON (gibbonModule.gibbonModuleID=gibbonAction.gibbonModuleID)
                WHERE gibbonPerson.gibbonPersonID=:gibbonPersonID

            ) ORDER BY groupBy, name" ;

        return $this->db()->select($sql, $data);
    }

    public function selectCategoriesByPerson($gibbonPersonID, $context = 'Query')
    {
        $data = ['gibbonPersonID' => $gibbonPersonID, 'context' => $context];
        $sql = "SELECT DISTINCT category FROM queryBuilderQuery WHERE type='School' OR type='gibbonedu.com' OR (type='Personal' AND gibbonPersonID=:gibbonPersonID) AND context=:context ORDER BY category";

        return $this->db()->select($sql, $data);
    }

    public function getQueryByPerson($queryBuilderQueryID, $gibbonPersonID, $editing = false, $active = false)
    {
        $data = ['queryBuilderQueryID' => $queryBuilderQueryID, 'gibbonPersonID' => $gibbonPersonID];
        $sql = "SELECT * FROM queryBuilderQuery WHERE queryBuilderQueryID=:queryBuilderQueryID ";

        if ($editing) {
            $sql .= "AND (type='gibbonedu.com' OR type='School' OR (type='Personal' AND gibbonPersonID=:gibbonPersonID) )";
        } else {
            $sql .= "AND (type='gibbonedu.com' OR type='School' OR (type='Personal' AND gibbonPersonID=:gibbonPersonID) )";
        }

        if ($active) {
            $sql .= " AND active='Y'";
        }

        return $this->db()->selectOne($sql, $data);
    }

    public function getIsQueryAccessible($queryBuilderQueryID, $gibbonPersonID)
    {
        $data = ['queryBuilderQueryID' => $queryBuilderQueryID, 'gibbonPersonID' => $gibbonPersonID];
        $sql = "SELECT gibbonModule.name as groupBy, CONCAT(gibbonModule.name, ':', gibbonAction.name) as value, gibbonAction.name as name
                FROM queryBuilderQuery
                JOIN gibbonModule ON (gibbonModule.name=queryBuilderQuery.moduleName)
                JOIN gibbonAction ON ((gibbonAction.name=queryBuilderQuery.actionName OR gibbonAction.name LIKE CONCAT(queryBuilderQuery.actionName, '_%')) AND gibbonAction.gibbonModuleID=gibbonModule.gibbonModuleID)
                JOIN gibbonPermission ON (gibbonPermission.gibbonActionID=gibbonAction.gibbonActionID)
                JOIN gibbonPerson ON (FIND_IN_SET(gibbonPermission.gibbonRoleID, gibbonPerson.gibbonRoleIDAll))
                WHERE queryBuilderQuery.queryBuilderQueryID=:queryBuilderQueryID
                AND gibbonPerson.gibbonPersonID=:gibbonPersonID" ;

        return $this->db()->selectOne($sql, $data);
    }

    public function getIllegals($allowCommands = false)
    {
        $illegals = [
            'USE',
            'SHOW DATABASES',
            'SHOW TABLES',
            'DESCRIBE',
            'SHOW FIELDS FROM',
            'SHOW COLUMNS FROM',
            'SHOW INDEX FROM',
            'SET PASSWORD',
            'CREATE TABLE',
            'DROP TABLE',
            'ALTER TABLE',
            'CREATE INDEX',
            'LOAD DATA LOCAL INFILE',
            'GRANT USAGE ON',
            'GRANT SELECT ON',
            'GRANT ALL ON',
            'FLUSH PRIVILEGES',
            'REVOKE ALL ON',
        ];

        if (!$allowCommands) {
            $illegals[] = 'UPDATE';
            $illegals[] = 'DELETE';
            $illegals[] = 'DELETE FROM';
            $illegals[] = 'INSERT';
            $illegals[] = 'INSERT INTO';
        }

        return $illegals;
    }

    public function getAutocompletions()
    {
        $databaseName = $this->db()->selectOne('select database()');

        $fields = [];
        $tables = $this->db()->select("SHOW TABLES")->fetchAll();

        foreach ($tables as $table) {
            $tableName = $table['Tables_in_'.$databaseName];
            $tableFields = $this->db()->select("SHOW COLUMNS FROM ".$table['Tables_in_'.$databaseName])->fetchAll();
            $fields[] = $tableName;

            foreach ($tableFields as $field) {
                $fields[] = $tableName.'.'.$field['Field'];
            }
        }

        return $fields;
    }
}
