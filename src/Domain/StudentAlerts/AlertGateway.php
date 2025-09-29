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

namespace Gibbon\Domain\StudentAlerts;

use Gibbon\Domain\Traits\TableAware;
use Gibbon\Domain\QueryCriteria;
use Gibbon\Domain\QueryableGateway;

/**
 * AlertGateway
 *
 * @version v30
 * @since   v30
 */

class AlertGateway extends QueryableGateway
{
    use TableAware;

    private static $tableName = 'gibbonAlert';
    private static $primaryKey = 'gibbonAlertID';
    private static $searchableColumns = [];

    public function queryAlertsBySchoolYear(QueryCriteria $criteria, $gibbonSchoolYearID, $gibbonPersonIDCreator = null)
    {
        $query = $this
            ->newQuery()
            ->from($this->getTableName())
            ->cols([
                'gibbonAlert.gibbonAlertID',
                'gibbonAlert.gibbonAlertLevelID',
                'gibbonAlert.context',
                'gibbonAlert.type',
                'gibbonAlert.status',
                'gibbonAlert.level',
                'gibbonAlert.dateStart',
                'gibbonAlert.dateEnd',
                'gibbonAlert.comment',
                'gibbonAlert.gibbonPersonIDCreator',
                'gibbonAlert.timestampCreated',
                'gibbonAlertLevel.color as levelColor',
                'gibbonAlertLevel.colorBG as levelColorBG',
                'gibbonAlertType.tag',
                'gibbonAlertType.color',
                'gibbonAlertType.colorBG',
                'gibbonStudentEnrolment.gibbonFormGroupID',
                'gibbonStudentEnrolment.gibbonYearGroupID',
                'student.gibbonPersonID',
                'student.surname',
                'student.preferredName',
                'gibbonFormGroup.nameShort AS formGroup',
                'creator.title AS titleCreator',
                'creator.surname AS surnameCreator',
                'creator.preferredName AS preferredNameCreator',
            ])
            ->innerJoin('gibbonAlertType', 'gibbonAlert.gibbonAlertTypeID=gibbonAlertType.gibbonAlertTypeID')
            ->leftJoin('gibbonAlertLevel', 'gibbonAlert.gibbonAlertLevelID=gibbonAlertLevel.gibbonAlertLevelID')
            ->innerJoin('gibbonPerson AS student', 'gibbonAlert.gibbonPersonID=student.gibbonPersonID')
            ->innerJoin('gibbonStudentEnrolment', 'student.gibbonPersonID=gibbonStudentEnrolment.gibbonPersonID')
            ->innerJoin('gibbonFormGroup', 'gibbonStudentEnrolment.gibbonFormGroupID=gibbonFormGroup.gibbonFormGroupID')
            ->leftJoin('gibbonPerson AS creator', 'gibbonAlert.gibbonPersonIDCreator=creator.gibbonPersonID')
            ->where('gibbonAlert.gibbonSchoolYearID = :gibbonSchoolYearID')
            ->bindValue('gibbonSchoolYearID', $gibbonSchoolYearID)
            ->where('gibbonStudentEnrolment.gibbonSchoolYearID=gibbonAlert.gibbonSchoolYearID')
            ->where('gibbonAlertType.active="Y"');

        if (!empty($gibbonPersonIDCreator)) {
            $query->where('gibbonAlert.gibbonPersonIDCreator = :gibbonPersonIDCreator')
                ->bindValue('gibbonPersonIDCreator', $gibbonPersonIDCreator);
        }

        $criteria->addFilterRules([
            'student' => function ($query, $gibbonPersonID) {
                return $query
                    ->where('gibbonAlert.gibbonPersonID = :gibbonPersonID')
                    ->bindValue('gibbonPersonID', $gibbonPersonID);
            },
            'formGroup' => function ($query, $gibbonFormGroupID) {
                return $query
                    ->where('gibbonStudentEnrolment.gibbonFormGroupID = :gibbonFormGroupID')
                    ->bindValue('gibbonFormGroupID', $gibbonFormGroupID);
            },
            'yearGroup' => function ($query, $gibbonYearGroupID) {
                return $query
                    ->where('gibbonStudentEnrolment.gibbonYearGroupID = :gibbonYearGroupID')
                    ->bindValue('gibbonYearGroupID', $gibbonYearGroupID);
            },
        ]);

        return $this->runQuery($query, $criteria);
    }

    public function queryStudentsWithAlertsByFormGroup(QueryCriteria $criteria, $gibbonFormGroupID)
    {
        $query = $this
            ->newQuery()
            ->from('gibbonPerson')
            ->cols([
                'gibbonPerson.gibbonPersonID', 'gibbonStudentEnrolmentID', 'gibbonStudentEnrolment.gibbonSchoolYearID', 'gibbonPerson.title', 'gibbonPerson.preferredName', 'gibbonPerson.surname', 'gibbonPerson.image_240', 'gibbonYearGroup.nameShort AS yearGroup', 'gibbonFormGroup.nameShort AS formGroup', 'gibbonStudentEnrolment.rollOrder', 'gibbonPerson.dateStart', 'gibbonPerson.dateEnd', 'gibbonPerson.status', "'Student' as roleCategory"
            ])
            ->innerJoin('gibbonStudentEnrolment', 'gibbonPerson.gibbonPersonID=gibbonStudentEnrolment.gibbonPersonID')
            ->innerJoin('gibbonYearGroup', 'gibbonStudentEnrolment.gibbonYearGroupID=gibbonYearGroup.gibbonYearGroupID')
            ->innerJoin('gibbonFormGroup', 'gibbonStudentEnrolment.gibbonFormGroupID=gibbonFormGroup.gibbonFormGroupID')
            ->innerJoin('gibbonAlert', 'gibbonAlert.gibbonPersonID=gibbonPerson.gibbonPersonID AND gibbonAlert.gibbonSchoolYearID=gibbonStudentEnrolment.gibbonSchoolYearID')
            ->where("gibbonPerson.status = 'Full'")
            ->where('(gibbonPerson.dateStart IS NULL OR gibbonPerson.dateStart <= :today)')
            ->where('(gibbonPerson.dateEnd IS NULL OR gibbonPerson.dateEnd >= :today)')
            ->bindValue('today', date('Y-m-d'))
            ->where('gibbonStudentEnrolment.gibbonFormGroupID = :gibbonFormGroupID')
            ->bindValue('gibbonFormGroupID', $gibbonFormGroupID)
            ->groupBy(['gibbonPerson.gibbonPersonID']);

        return $this->runQuery($query, $criteria);
    }

    public function getAlertEditAccess($gibbonAlertID, $gibbonPersonID)
    {
        $data = ['gibbonAlertID' => $gibbonAlertID, 'gibbonPersonID' => $gibbonPersonID];
        $sql = "SELECT (CASE WHEN gibbonPersonIDCreator = :gibbonPersonID THEN TRUE ELSE FALSE END) AS canEdit FROM gibbonAlert WHERE gibbonAlertID = :gibbonAlertID";

        return $this->db()->selectOne($sql, $data);
    }

    public function selectActiveAlertTypes()
    {
        $sql = "SELECT name as groupBy, gibbonAlertType.* FROM gibbonAlertType WHERE active='Y' ORDER BY sequenceNumber, name";

        return $this->db()->select($sql);
    }

    public function selectAllAlertTypes()
    {
        $sql = "SELECT name as groupBy, gibbonAlertType.* FROM gibbonAlertType ORDER BY sequenceNumber, name";

        return $this->db()->select($sql);
    }

    public function selectActiveAlertsByStudent($gibbonSchoolYearID, $gibbonPersonID)
    {
        $data = ['gibbonPersonID' => $gibbonPersonID, 'gibbonSchoolYearID' => $gibbonSchoolYearID];
        $sql = "SELECT gibbonAlertType.name, gibbonAlertType.tag, gibbonAlertType.description, gibbonAlertType.color, gibbonAlertType.colorBG, gibbonAlertType.name as `type`, gibbonAlertLevel.name as `level`, gibbonAlertLevel.sequenceNumber as `alertLevel`, gibbonAlertLevel.color as `levelColor`, gibbonAlertLevel.colorBG as `levelColorBG`, gibbonPerson.privacy
            FROM gibbonAlert 
            JOIN gibbonAlertType ON (gibbonAlertType.gibbonAlertTypeID=gibbonAlert.gibbonAlertTypeID)
            LEFT JOIN gibbonAlertLevel ON (gibbonAlert.gibbonAlertLevelID=gibbonAlertLevel.gibbonAlertLevelID) 
            JOIN gibbonPerson ON (gibbonPerson.gibbonPersonID=gibbonAlert.gibbonPersonID)
            WHERE gibbonAlert.gibbonSchoolYearID=:gibbonSchoolYearID 
            AND gibbonAlert.gibbonPersonID=:gibbonPersonID 
            AND gibbonAlert.status='Approved'
            AND gibbonAlertType.active='Y'
            AND (gibbonAlert.dateStart IS NULL OR gibbonAlert.dateStart<=CURRENT_DATE)
            AND (gibbonAlert.dateEnd IS NULL OR gibbonAlert.dateEnd>=CURRENT_DATE)
            ORDER BY gibbonAlertType.sequenceNumber, gibbonAlertLevel.sequenceNumber DESC, FIND_IN_SET(gibbonAlert.context,'Automatic,Manual'), gibbonAlert.timestampCreated DESC";

        return $this->db()->select($sql, $data);
    }

    public function selectAutomaticAlertsByStudent($gibbonSchoolYearID, $gibbonPersonID)
    {
        $data = ['gibbonPersonID' => $gibbonPersonID, 'gibbonSchoolYearID' => $gibbonSchoolYearID];
        $sql = "SELECT gibbonAlertType.name as groupBy, gibbonAlert.gibbonAlertID, gibbonAlert.type
            FROM gibbonAlert 
            JOIN gibbonAlertType ON (gibbonAlertType.gibbonAlertTypeID=gibbonAlert.gibbonAlertTypeID)
            WHERE gibbonAlert.gibbonSchoolYearID=:gibbonSchoolYearID 
            AND gibbonAlert.gibbonPersonID=:gibbonPersonID 
            AND gibbonAlert.context='Automatic'";

        return $this->db()->select($sql, $data);
    }

    public function getHighestAlertByType($gibbonSchoolYearID, $gibbonPersonID, $alertType)
    {
        $data = ['gibbonPersonID' => $gibbonPersonID, 'gibbonSchoolYearID' => $gibbonSchoolYearID, 'status' => 'Approved', 'name' => $alertType];
        $sql = "SELECT gibbonAlertType.gibbonAlertTypeID, gibbonAlertLevel.gibbonAlertLevelID, gibbonAlertType.name, gibbonAlertType.tag, gibbonAlertType.description, gibbonAlertType.color, gibbonAlertType.colorBG, gibbonAlertType.name as `type`, gibbonAlertLevel.name as `level`, gibbonAlertLevel.color as `levelColor`, gibbonAlertLevel.colorBG as `levelColorBG`
            FROM gibbonAlert 
            JOIN gibbonAlertType ON (gibbonAlertType.gibbonAlertTypeID=gibbonAlert.gibbonAlertTypeID)
            LEFT JOIN gibbonAlertLevel ON (gibbonAlert.gibbonAlertLevelID=gibbonAlertLevel.gibbonAlertLevelID) 
            WHERE gibbonPersonID=:gibbonPersonID 
            AND gibbonAlert.gibbonSchoolYearID=:gibbonSchoolYearID 
            AND gibbonAlert.status=:status 
            AND gibbonAlertType.name=:name
            AND gibbonAlertType.active='Y'
            ORDER BY gibbonAlertLevel.sequenceNumber DESC";

        return $this->db()->selectOne($sql, $data);
    }
}
