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

use Gibbon\Services\Format;
use Gibbon\Tables\DataTable;
use Gibbon\Domain\Calendar\CalendarEventTypeGateway;
use Gibbon\Forms\Form;

if (isActionAccessible($guid, $connection2, '/modules/Calendar/calendar_manage.php') == false) {
    // Access denied
    $page->addError(__('You do not have access to this action.'));
} else {
    // Proceed!
    $page->breadcrumbs
        ->add(__('Manage Calendars'), 'calendar_manage.php')
        ->add(__('Event Types'));

    $gibbonSchoolYearID = $_REQUEST['gibbonSchoolYearID'] ?? $session->get('gibbonSchoolYearID');

    $eventTypeGateway = $container->get(CalendarEventTypeGateway::class);

    // FORM
    $form = Form::create('calendar', $session->get('absoluteURL').'/modules/Calendar/calendar_manage_typesProcess.php');
    $form->removeMeta();

    // EDITORS
    $form->addRow()->addHeading(__('Event Types'));

    // Custom Block Template
    $addBlockButton = $form->getFactory()->createButton(__m('Add'))->addClass('addBlock');

    $blockTemplate = $form->getFactory()->createTable()->setClass('blank');
    $row = $blockTemplate->addRow()->addClass('w-full flex justify-between items-center mt-1 ml-2');
        $row->addTextField('type')->maxLength(60)->required()->addClass('w-64')->placeholder(__('Event Type'));
        $row->addColor('color', __('Colour'))
            ->append("<input type='hidden' id='gibbonCalendarEventTypeID' name='gibbonCalendarEventTypeID' value=''/>");

    // Custom Blocks
    $row = $form->addRow();
    $customBlocks = $row->addCustomBlocks('types', $session)
        ->fromTemplate($blockTemplate)
        ->settings(['inputNameStrategy' => 'object', 'addOnEvent' => 'click', 'sortable' => true])
        ->placeholder(__('Add a type...'))
        ->addToolInput($addBlockButton);

    $types = $eventTypeGateway->selectEventTypes()->fetchAll();
    foreach ($types as $type) {
        $customBlocks->addBlock($type['gibbonCalendarEventTypeID'], [
            'gibbonCalendarEventTypeID' => $type['gibbonCalendarEventTypeID'],
            'type'                      => $type['type'] ?? '',
            'color'                     => $type['color'] ?? '',
        ]);
    }

    $row = $form->addRow()->addSubmit();

    echo $form->getOutput();
}
