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
use Gibbon\Module\QueryBuilder\Forms\BindValues;
use Gibbon\Module\QueryBuilder\Domain\QueryGateway;

if (isActionAccessible($guid, $connection2, '/modules/Query Builder/queries_edit.php') == false) {
    // Access denied
    $page->addError(__('You do not have access to this action.'));
} else {
    // Proceed!
    $page->breadcrumbs
        ->add(__m('Manage Queries'), 'queries.php')
        ->add(__m('Edit Query'));

    $queryGateway = $container->get(QueryGateway::class);

    $queryBuilderQueryID = $_GET['queryBuilderQueryID'] ?? '';
    $search = $_GET['search'] ?? '';

    // Validate the required values are present
    if (empty($queryBuilderQueryID)) {
        $page->addError(__('You have not specified one or more required parameters.'));
        return;
    }

    // Validate the database record exists
    $values = $queryGateway->getQueryByPerson($queryBuilderQueryID, $session->get('gibbonPersonID'), true);
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

    if ($search != '') {
        $params = [
            "search" => $search
        ];
        $page->navigator->addSearchResultsAction(Url::fromModuleRoute('Query Builder', 'queries.php')->withQueryParams($params));
    }

    $form = Form::create('queryBuilder', $session->get('absoluteURL').'/modules/'.$session->get('module').'/queries_editProcess.php?queryBuilderQueryID='.$queryBuilderQueryID.'&search='.$search);

    $form->addHiddenValue('address', $session->get('address'));

    $form->addHeaderAction('help', __m('Help'))
        ->setURL('/modules/Query Builder/queries_help_full.php')
        ->setIcon('help')
        ->displayLabel()
        ->modalWindow();

    if ($values['active'] == 'Y') {
        $form->addHeaderAction('run', __m('Run Query'))
            ->setURL('/modules/Query Builder/queries_run.php')
            ->addParam('search', $search)
            ->addParam('queryBuilderQueryID', $queryBuilderQueryID)
            ->addParam('sidebar', 'false')
            ->setIcon('run')
            ->displayLabel();
    }

    $row = $form->addRow();
        $row->addLabel('type', __('Type'));
        $row->addTextField('type')->required()->readonly();

    $row = $form->addRow();
        $row->addLabel('name', __('Name'));
        if ($values['type'] == "gibbonedu.com") {
            $row->addTextField('name')->maxLength(255)->required()->readonly();
        } else {
            $row->addTextField('name')->maxLength(255)->required();
        }

    $row = $form->addRow();
        $row->addLabel('active', __('Active'));
        $row->addYesNo('active')->required();

    if ($values['type'] != "gibbonedu.com") {
        $categories = $queryGateway->selectCategoriesByPerson($session->get('gibbonPersonID'))->fetchAll(\PDO::FETCH_COLUMN, 0);
        $row = $form->addRow();
            $row->addLabel('category', __('Category'));
            $row->addTextField('category')->required()->maxLength(100)->autocomplete($categories);

        $actions = $queryGateway->selectActionListByPerson($session->get('gibbonPersonID'));
        $row = $form->addRow();
            $row->addLabel('moduleActionName', __m('Limit Access'))->description(__m('Only people with the selected permission can run this query.'));
            $row->addSelect('moduleActionName')->fromResults($actions, 'groupBy')->placeholder()->selected($values['moduleName'].':'.$values['actionName']);

        $row = $form->addRow();
            $row->addLabel('description', __('Description'));
            $row->addTextArea('description')->setRows(8);

        $col = $form->addRow()->addColumn();
            $col->addLabel('query', __m('Query'));
            $col->addCodeEditor('query')
                ->setMode('mysql')
                ->autocomplete($queryGateway->getAutocompletions())
                ->required();

        $bindValues = new BindValues($form->getFactory(), 'bindValues', $values, $session);
        $form->addRow()->addElement($bindValues);
    }

    $row = $form->addRow();
        $row->addFooter();
        $row->addSubmit();

    $form->loadAllValuesFrom($values);

    echo $form->getOutput();
}
