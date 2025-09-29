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

use Gibbon\Forms\Form;
use Gibbon\Services\Format;
use Gibbon\Tables\DataTable;
use Gibbon\Forms\DatabaseFormFactory;
use Gibbon\Domain\StudentAlerts\AlertGateway;
use Gibbon\View\Component;
use Gibbon\UI\Components\Alert;
use Gibbon\Domain\FormGroups\FormGroupGateway;


// Module includes
require_once __DIR__ . '/moduleFunctions.php';

if (!isActionAccessible($guid, $connection2, '/modules/Student Alerts/report_alertsByFormGroup.php')) {
	// Access denied
	$page->addError(__('You do not have access to this action.'));
} else {
    $highestAction = getHighestGroupedAction($guid, $_GET['q'], $connection2);
    if ($highestAction == false) {
        $page->addError(__('The highest grouped action cannot be determined.'));
    } else {
        $page->breadcrumbs->add(__('Alerts by Form Group'));

        $gibbonPersonID = $_GET['gibbonPersonID'] ?? '';
        $gibbonFormGroupID = $_REQUEST['gibbonFormGroupID'] ?? '';

        $alertGateway = $container->get(AlertGateway::class);
        $alertManager = $container->get(Alert::class);

        $formGroup = $container->get(FormGroupGateway::class)->selectFormGroupsByTutor($session->get('gibbonPersonID'))->fetch();
        if (!empty($formGroup) && empty($gibbonFormGroupID)) {
            $gibbonFormGroupID = $formGroup['gibbonFormGroupID'];
        }

        // SEARCH
        $form = Form::createSearch();
        $form->setFactory(DatabaseFormFactory::create($pdo));

        $row = $form->addRow();
            $row->addLabel('gibbonFormGroupID',__('Form Group'));
            $row->addSelectFormGroup('gibbonFormGroupID', $session->get('gibbonSchoolYearID'))->selected($gibbonFormGroupID)->placeholder();

        $row = $form->addRow();
            $row->addFooter();
            $row->addSearchSubmit($session, __('Clear Filters'));

        echo $form->getOutput();

        if (empty($gibbonFormGroupID)) return;

         // CRITERIA
        $criteria = $alertGateway->newQueryCriteria(true)
            ->sortBy(['surname', 'preferredName'])
            ->filterBy('formGroup', $gibbonFormGroupID)
            ->fromPOST();

        $students = $alertGateway->queryStudentsWithAlertsByFormGroup($criteria, $gibbonFormGroupID);
        $students->transform(function (&$student) use ($alertManager) {
            $student['alerts'] = $alertManager->getAlertsByStudent($student['gibbonPersonID']);
        });

        // DATA TABLE
        $table = DataTable::createPaginated('manageAlerts', $criteria);
        $table->setTitle(__('Alerts'));

        $table->addHeaderAction('add', __('Add Alert'))
            ->setURL('/modules/Student Alerts/studentAlerts_add.php')
            ->addParam('gibbonFormGroupID', $gibbonFormGroupID)
            ->displayLabel();

        $table->modifyRows(function($alert, $row) {
            if ($alert['status'] == 'Pending') $row->addClass('warning');
            elseif ($alert['status'] == 'Declined') $row->addClass('dull');
            return $row;
        });

        $table->addColumn('image_240', __('Photo'))
            ->context('primary')
            ->width('7%')
            ->notSortable()
            ->format(Format::using('userPhoto', ['image_240', 'xs']));

        // $table->addColumn('tag', __('Tag'))
        //     ->width('8%')
        //     ->format(function($values) {
        //         return Component::render(Alert::class, [
        //             'color'   => $values['levelColor'] ?? $values['color'],
        //             'colorBG' => $values['levelColorBG'] ?? $values['colorBG'],
        //             'title' => $values['type'] ?? '',
        //             'large' => true,
        //         ] + $values);
        //     });

        $table->addColumn('student', __('Student'))
            ->description(__('Form Group'))
            ->sortable(['student.surname', 'student.preferredName'])
            ->context('primary')
            ->format(function($student) {
                return Format::nameLinked($student['gibbonPersonID'], '', $student['preferredName'], $student['surname'], 'Student', true, true, ['subpage' => 'Personal']) . '<br/><small><i>'.$student['formGroup'].'</i></small>';
            });


        $alertTypes = $alertGateway->selectActiveAlertTypes()->fetchAll();

        foreach ($alertTypes as $alertType) {
            $table->addColumn($alertType['gibbonAlertTypeID'], __($alertType['name']))
                // ->width('8%')
                ->notSortable()
                ->format(function($values) use ($alertType, $alertManager) {
                    $alert = $values['alerts'][$alertType['name']] ?? [];
                    if (empty($alert)) return '';

                    return Component::render(Alert::class, [
                        'color'   => $alert['levelColor'] ?? $alert['color'],
                        'colorBG' => $alert['levelColorBG'] ?? $alert['colorBG'],
                        'title' => $alert['type'] ?? '',
                        'large' => true,
                    ] + $alert);
                });
        }


        // $table->addColumn('type', __('Type'));
        // $table->addColumn('level', __('Level'));
        // $table->addColumn('status', __('Status'));


        // $table->addColumn('teacher', __('Created By'))
        //     ->context('secondary')
        //     ->sortable(['preferredNameCreator', 'surnameCreator'])
        //     ->format(function($staff) {
        //         return Format::name($staff['titleCreator'], $staff['preferredNameCreator'], $staff['surnameCreator'], 'Staff');
        //     });

        // $table->addColumn('timestampCreated', __('Date Recorded'))
        //     ->context('primary')
        //     ->format(function($alert) {
        //         return Format::date($alert['timestampCreated']);
        //     });

        $table->addActionColumn()
            ->addParam('gibbonFormGroupID', $gibbonFormGroupID)
            ->addParam('gibbonPersonID')
            ->format(function ($alert, $actions)  {
                $actions->addAction('view', __('View'))
                    ->setURL('/modules/Student Alerts/studentAlerts_manage.php');

                $actions->addAction('add', __('Add'))
                    ->setURL('/modules/Student Alerts/studentAlerts_add.php');
            });

        echo $table->render($students);
    }
}
