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
along with this program. If not, see <http:// www.gnu.org/licenses/>.
*/

use Gibbon\Domain\System\ModuleGateway;
use Gibbon\Module\QueryBuilder\Domain\QueryGateway;

$_POST['address'] = "/modules/Query Builder/queries_gibboneducom_sync_ajax.php";

// Gibbon system-wide includes
include '../../gibbon.php';

// Setup variables
$gibboneduComOrganisationName = $_POST['gibboneduComOrganisationName'];
$gibboneduComOrganisationKey = $_POST['gibboneduComOrganisationKey'];
$service = $_POST['service'];
$queries = json_decode($_POST['queries'], true);

if (count($queries) < 1) { 
    // We have a problem, report it.
    echo 'fail';
} else { 
    // Success, let's write them to the database.
    // But first let's remove all of the gibbonedu.com old queries that are not in downloaded list
    $queryGateway = $container->get(QueryGateway::class);
    $queryGateway->syncRemoveQueries($queries);

    // Prep additional module array
    $moduleGateway = $container->get(ModuleGateway::class);

    $criteria = $moduleGateway->newQueryCriteria(true)
        ->sortBy('name')
        ->filterBy('type', 'Additional')
        ->fromPOST();
    $modules = $moduleGateway->queryModules($criteria)->toArray();

    $modulesArray = array() ;
    foreach ($modules AS $module) {
        $modulesArray[$module['name']] = $module['version'];
    }

    // Now let's get them in
    foreach ($queries as $query) {
        $insert = ($query['scope'] == 'Core') ? true : false;
        if ($query['scope'] != 'Core') {
            $moduleVersion = $modulesArray[$query['scope']] ?? null;
            if (version_compare($query["versionFirst"],$moduleVersion, "<=") AND ((version_compare($query["versionLast"],$moduleVersion, ">=") OR empty($query["versionLast"])))) {
                $insert = true;
            }
        }

        if ($insert) {
            $data = [
                'queryID' => $query['queryID'], 
                'scope' => $query['scope'], 
                'context' => $query['context'], 
                'name' => $query['name'], 
                'category' => $query['category'], 
                'description' => $query['description'], 
                'query' => $query['query'], 
                'bindValues' => $query['bindValues'] ?? '', 
                'moduleName' => $query['moduleName'] ?? null, 
                'actionName' => $query['actionName'] ?? null,
            ];

            $values = $queryGateway->selectBy(['queryID' => $query['queryID'], 'type' => 'gibbonedu.com'])->fetch();
            if (empty($values)) {
                $queryGateway->insert($data);
            } else {
                $queryGateway->update($values['queryBuilderQueryID'], $data);
            }
        } else {
            $queryGateway->deleteWhere(['queryID' => $query['queryID']]);
        }
    }
}
