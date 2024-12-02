<?php
/*
Gibbon, Flexible & Open School System
Copyright (C) 2010, Ross Parker

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

use Gibbon\Data\Validator;
use Gibbon\Domain\Calendar\CalendarEventTypeGateway;

require_once '../../gibbon.php';

$_POST = $container->get(Validator::class)->sanitize($_POST);

$gibbonSchoolYearID = $_REQUEST['gibbonSchoolYearID'] ?? $session->get('gibbonSchoolYearID');

$URL = $session->get('absoluteURL')."/index.php?q=/modules/Calendar/calendar_manage_types.php&gibbonSchoolYearID=$gibbonSchoolYearID";

if (isActionAccessible($guid, $connection2, '/modules/Calendar/calendar_manage_types.php') == false) {
    $URL .= '&return=error0';
    header("Location: {$URL}");
    exit;
} else {
    // Proceed!
    $partialFail = false;

    $eventTypeGateway = $container->get(CalendarEventTypeGateway::class);

    // Update the types
    $types = $_POST['types'] ?? '';
    $order = $_POST['order'] ?? [];
    $typeIDs = [];
    foreach ($types as $index => $type) {
        $data = [
            'type'           => $type['type'] ?? '',
            'color'          => $type['color'] ?? '',
            'sequenceNumber' => $order[$index-1] ?? 0,
        ];

        $gibbonCalendarEventTypeID = $type['gibbonCalendarEventTypeID'] ?? '';

        if (!empty($gibbonCalendarEventTypeID)) {
            $partialFail &= !$eventTypeGateway->update($gibbonCalendarEventTypeID, $data);
        } else {
            $gibbonCalendarEventTypeID = $eventTypeGateway->insert($data);
            $partialFail &= !$gibbonCalendarEventTypeID;
        }

        $typeIDs[] = str_pad($gibbonCalendarEventTypeID, 6, '0', STR_PAD_LEFT);
    }

    // Cleanup editor that have been deleted
    $eventTypeGateway->deleteTypesNotInList($typeIDs);

    $URL .= $partialFail
        ? "&return=warning1"
        : "&return=success0";

    header("Location: {$URL}");
}
