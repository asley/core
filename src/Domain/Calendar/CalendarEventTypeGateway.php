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

namespace Gibbon\Domain\Calendar;

use Gibbon\Domain\Traits\TableAware;
use Gibbon\Domain\QueryCriteria;
use Gibbon\Domain\QueryableGateway;

/**
 * @version v29
 * @since   v29
 */
class CalendarEventTypeGateway extends QueryableGateway
{
    use TableAware;

    private static $tableName = 'gibbonCalendarEventType';
    private static $primaryKey = 'gibbonCalendarEventTypeID';

    private static $searchableColumns = [];

    public function selectEventTypes()
    {
        $sql = "SELECT *
                FROM gibbonCalendarEventType
                ORDER BY sequenceNumber";

        return $this->db()->select($sql);
    }

    public function deleteTypesNotInList($typeList)
    {
        $typeList = is_array($typeList) ? implode(',', $typeList) : $typeList;

        $data = ['typeList' => $typeList];
        $sql = "DELETE FROM gibbonCalendarEventType WHERE NOT FIND_IN_SET(gibbonCalendarEventTypeID, :typeList)";

        return $this->db()->delete($sql, $data);
    }
}
