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

use Gibbon\Domain\System\SettingGateway;
use Gibbon\Forms\Form;
use Gibbon\Forms\DatabaseFormFactory;
use Gibbon\Services\Format;
use Gibbon\Tables\DataTable;
use Gibbon\Domain\DataUpdater\FamilyUpdateGateway;

//Module includes
require_once __DIR__ . '/moduleFunctions.php';

if (isActionAccessible($guid, $connection2, '/modules/Data Updater/report_family_dataUpdaterHistory.php') == false) {
    // Access denied
    $page->addError(__('You do not have access to this action.'));
} else {
    //Proceed!
    $page->breadcrumbs->add(__('Family Data Updater History'));

    echo '<p>';
    echo __('This report allows a user to select a range of families, with at least one child enrolled in the target year group, and check whether or not they have had their family and personal data updated after a specified date.');
    echo '</p>';

    echo '<h2>';
    echo __('Choose Options');
    echo '</h2>';

    $settingGateway = $container->get(SettingGateway::class);

    $cutoffDate = $settingGateway->getSettingByScope('Data Updater', 'cutoffDate');
    $cutoffDate = !empty($cutoffDate)? Format::date($cutoffDate) : Format::dateFromTimestamp(time() - (604800 * 26));

    $gibbonYearGroupIDList = $_POST['gibbonYearGroupIDList'] ?? array();
    $nonCompliant = $_POST['nonCompliant'] ?? '';
    $hideDetails = $_POST['hideDetails'] ?? '';
    $date = $_POST['date'] ?? $cutoffDate;

    $form = Form::create('action', $session->get('absoluteURL').'/index.php?q=/modules/'.$session->get('module').'/report_family_dataUpdaterHistory.php');
    $form->setFactory(DatabaseFormFactory::create($pdo));
    $form->addHiddenValue('address', $session->get('address'));

    $row = $form->addRow();
        $row->addLabel('gibbonYearGroupIDList',__('Year Groups'));
        $row->addSelectYearGroup('gibbonYearGroupIDList')->selectMultiple()->selected($gibbonYearGroupIDList)->selectAll(true);

    $row = $form->addRow();
        $row->addLabel('date', __('Date'))->description(__('Earliest acceptable update'));
        $row->addDate('date')->setValue($date)->required();

    $row = $form->addRow();
        $row->addLabel('nonCompliant', __('Show Only Non-Compliant?'))->description(__('If not checked, show all. If checked, show only non-compliant students.'));
        $row->addCheckbox('nonCompliant')->setValue('Y')->checked($nonCompliant);

    $row = $form->addRow();
        $row->addLabel('hideDetails', __('Hide Details?'));
        $row->addCheckbox('hideDetails')->setValue('Y')->checked($hideDetails);

    $row = $form->addRow();
        $row->addSubmit();

    echo $form->getOutput();

    if (!empty($gibbonYearGroupIDList)) {
        echo '<h2>';
        echo __('Report Data');
        echo '</h2>';

        $requiredUpdatesByType = explode(',', $settingGateway->getSettingByScope('Data Updater', 'requiredUpdatesByType'));

        $gateway = $container->get(FamilyUpdateGateway::class);

        // QUERY
        $criteria = $gateway->newQueryCriteria(true)
            ->sortBy(['gibbonFamily.name'])
            ->filterBy('cutoff', $nonCompliant == 'Y'? Format::dateConvert($date) : '')
            ->fromPOST();

        $dataUpdates = $gateway->queryFamilyUpdaterHistory($criteria, $session->get('gibbonSchoolYearID'), $gibbonYearGroupIDList, $requiredUpdatesByType);
        $families = $dataUpdates->getColumn('gibbonFamilyID');

        // Join a set of family adults & updater info
        $familyAdults = $gateway->selectFamilyAdultUpdatesByFamily($families)->fetchGrouped();
        $dataUpdates->joinColumn('gibbonFamilyID', 'familyAdults', $familyAdults);

        // Join a set of family children & updater info
        $familyChildren = $gateway->selectFamilyChildUpdatesByFamily($families, $session->get('gibbonSchoolYearID'))->fetchGrouped();
        $dataUpdates->joinColumn('gibbonFamilyID', 'familyChildren', $familyChildren);

        // Function to display the updater info based on the cutoff date
        $dateCutoff = DateTime::createFromFormat('Y-m-d H:i:s', Format::dateConvert($date).' 00:00:00');
        $dataChecker = function($dateUpdated, $title = '') use ($dateCutoff, $session) {
            $dateDisplay = !empty($dateUpdated)? Format::dateTime($dateUpdated) : __('No data');
            return empty($dateUpdated) || $dateCutoff > DateTime::createFromFormat('Y-m-d H:i:s', $dateUpdated)
                ? Format::tooltip(icon('solid', 'cross', 'size-6 fill-current text-red-700'),  __('Update Required').': '.$dateDisplay)
                : Format::tooltip(icon('solid', 'check', 'size-6 fill-current text-green-600'),  __('Up to date').': '.$dateDisplay);
        };

        // DATA TABLE
        $table = DataTable::createPaginated('studentUpdaterHistory', $criteria);
        $table->addMetaData('post', ['gibbonYearGroupIDList' => $gibbonYearGroupIDList, 'hideDetails' => $hideDetails]);

        $count = $dataUpdates->getPageFrom();
        $table->addColumn('count', '')
            ->notSortable()
            ->width('5%')
            ->addClass($hideDetails == 'Y' ? 'unselectable' : '')
            ->format(function ($row) use (&$count) {
                return $count++;
            });

        $table->addColumn('familyName', __('Family'))
            ->width('20%')
            ->addClass($hideDetails == 'Y' ? 'unselectable' : '')
            ->format(function($row) use ($session) {
                return '<a href="'.$session->get('absoluteURL').'/index.php?q=/modules/User Admin/family_manage_edit.php&gibbonFamilyID='.$row['gibbonFamilyID'].'">'.$row['familyName'].'</a>';
            });

        if ($hideDetails != 'Y') {
            $table->addColumn('familyUpdate', __('Family Data'))
                ->width('5%')
                ->format(function($row) use ($dataChecker) {
                    return $dataChecker($row['familyUpdate'],  __('Family'));
                });

            $table->addColumn('familyAdults', __('Adults'))
                ->notSortable()
                ->format(function($row) use ($dataChecker, $requiredUpdatesByType) {
                    $output = '<table class="smallIntBorder w-full colorOddEven" cellspacing=0>';
                    foreach ($row['familyAdults'] as $adult) {
                        $output .= '<tr>';
                        $output .= '<td style="width:90%">'.Format::name($adult['title'], $adult['preferredName'], $adult['surname'], 'Parent').'</td>';
                        if (in_array('Personal', $requiredUpdatesByType)) {
                            $output .= '<td style="width:10%">'.$dataChecker($adult['personalUpdate'],  __('Personal')).'</td>';
                        }
                        $output .= '</tr>';
                    }
                    $output .= '</table>';
                    return $output;
                });

            $table->addColumn('familyChildren', __('Children'))
                ->notSortable()
                ->format(function($row) use ($dataChecker, $requiredUpdatesByType) {
                    $output = '<table class="smallIntBorder w-full colorOddEven" cellspacing=0>';
                    foreach ($row['familyChildren'] as $child) {
                        $output .= '<tr>';
                        $output .= '<td style="width:80%">'.Format::name('', $child['preferredName'], $child['surname'], 'Student').'</td>';
                        $output .= '<td style="width:10%">'.$child['formGroup'].'</td>';
                        if (in_array('Personal', $requiredUpdatesByType)) {
                            $output .= '<td style="width:10%">'.$dataChecker($child['personalUpdate'], __('Personal')).'</td>';
                        }
                        if (in_array('Medical', $requiredUpdatesByType)) {
                            $output .= '<td style="width:10%">'.$dataChecker($child['medicalUpdate'], __('Medical')).'</td>';
                        }
                        $output .= '</tr>';
                    }
                    $output .= '</table>';
                    return $output;
                });
        }

        $table->addColumn('familyAdultsEmail', __('Parent Email'))
            ->notSortable()
            ->width('25%')
            ->format(function($row) {
                return trim(implode(', ', array_column($row['familyAdults'], 'email')), ', ');
            });

        echo $table->render($dataUpdates);
    }
}
