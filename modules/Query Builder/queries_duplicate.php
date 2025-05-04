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

use Gibbon\Http\Url;
use Gibbon\Forms\Form;
use Gibbon\Module\QueryBuilder\Domain\QueryGateway;

if (isActionAccessible($guid, $connection2, '/modules/Query Builder/queries_duplicate.php') == false) {
    // Access denied
    $page->addError(__('You do not have access to this action.'));
} else {
    // Proceed!
    $page->breadcrumbs
        ->add(__('Manage Queries'), 'queries.php')
        ->add(__('Duplicate Query'));

    $queryGateway = $container->get(QueryGateway::class);

    $queryBuilderQueryID = $_GET['queryBuilderQueryID'] ?? '';
    $search = $_GET['search'] ?? '';

    if (isset($_GET['editID'])) {
        $page->return->setEditLink($session->get('absoluteURL').'/index.php?q=/modules/Query Builder/queries_edit.php&queryBuilderQueryID='.$_GET['editID']."&search=$search&sidebar=false");
    }

    if ($search != '') {
        $params = [
            "search" => $search
        ];
        $page->navigator->addSearchResultsAction(Url::fromModuleRoute('Query Builder', 'queries.php')->withQueryParams($params));
    }

    // Validate the required values are present
    if (empty($queryBuilderQueryID)) {
        $page->addError(__('You have not specified one or more required parameters.'));
        return;
    }

    // Validate the database record exists
    $values = $queryGateway->getQueryByPerson($queryBuilderQueryID, $session->get('gibbonPersonID'));
    if (empty($values)) {
        $page->addError(__('The specified record cannot be found.'));
        return;
    }

    // Prevent access to the wrong context
    if ($values['context'] == 'Command') {
        $page->addError(__('You do not have access to this action.'));
        return;
    }

    // Check for specific access to this query
    if (!empty($values['actionName']) || !empty($values['moduleName'])) {
        if (empty($queryGateway->getIsQueryAccessible($queryBuilderQueryID, $session->get('gibbonPersonID')))) {
            $page->addError(__('You do not have access to this action.'));
            return;
        }
    }

    $form = Form::create('queryBuilder', $session->get('absoluteURL').'/modules/'.$session->get('module').'/queries_duplicateProcess.php?queryBuilderQueryID='.$queryBuilderQueryID.'&search='.$search);

    $form->addHiddenValue('address', $session->get('address'));

    $row = $form->addRow();
        $row->addLabel('name', __('New Name'));
        $row->addTextField('name')->maxLength(255)->required()->loadFrom($values);

    $types = [
        'Personal' => __('Personal'),
        'School' => __('School'),
    ];
    $row = $form->addRow();
        $row->addLabel('type', __('Type'));
        $row->addSelect('type')->fromArray($types)->required();

    $row = $form->addRow();
        $row->addFooter();
        $row->addSubmit();

    echo $form->getOutput();
}
