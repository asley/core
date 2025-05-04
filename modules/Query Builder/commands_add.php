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
use Gibbon\Services\Format;
use Gibbon\Module\QueryBuilder\Forms\BindValues;
use Gibbon\Module\QueryBuilder\Domain\QueryGateway;

if (isActionAccessible($guid, $connection2, '/modules/Query Builder/commands_add.php') == false) {
    // Access denied
    $page->addError(__('You do not have access to this action.'));
} else {
    // Proceed!
    $page->breadcrumbs
        ->add(__m('Manage Commands'), 'commands.php')
        ->add(__m('Add Command'));

    $search = $_GET['search'] ?? '';

    $queryGateway = $container->get(QueryGateway::class);

    if (isset($_GET['editID'])) {
        $page->return->setEditLink($session->get('absoluteURL').'/index.php?q=/modules/Query Builder/commands_edit.php&queryBuilderQueryID='.$_GET['editID']."&search$search&sidebar=false");
    }

    if ($search != '') {
        $params = [
            "search" => $search
        ];
        $page->navigator->addSearchResultsAction(Url::fromModuleRoute('Query Builder', 'commands.php')->withQueryParams($params));
    }

    $form = Form::create('queryBuilder', $session->get('absoluteURL').'/modules/'.$session->get('module').'/commands_addProcess.php?search='.$search);

    $form->setDescription(Format::alert(__m('Commands are SQL statements that can update or delete records in your database. Be careful when creating and editing commands, as these queries can make destructive changes to your data. <b>Always backup your database before working with commands</b>.'), 'warning'));

    $form->addHiddenValue('address', $session->get('address'));

    $form->addHeaderAction('help', __m('Help'))
        ->setURL('/modules/Query Builder/queries_help_full.php')
        ->setIcon('help')
        ->addClass('underline')
        ->displayLabel()
        ->modalWindow();

    $types = [
        'Personal' => __('Personal'),
        'School' => __('School'),
    ];
    $row = $form->addRow();
        $row->addLabel('type', __('Type'));
        $row->addSelect('type')->fromArray($types)->required();

    $row = $form->addRow();
        $row->addLabel('name', __('Name'));
        $row->addTextField('name')->maxLength(255)->required();

    $row = $form->addRow();
        $row->addLabel('active', __('Active'));
        $row->addYesNo('active')->required();

    $categories = $queryGateway->selectCategoriesByPerson($session->get('gibbonPersonID'))->fetchAll(\PDO::FETCH_COLUMN, 0);
    $row = $form->addRow();
        $row->addLabel('category', __('Category'));
        $row->addTextField('category')->required()->maxLength(100)->autocomplete($categories);

    $actions = $queryGateway->selectActionListByPerson($session->get('gibbonPersonID'));
    $row = $form->addRow();
        $row->addLabel('moduleActionName', __m('Limit Access'))->description(__m('Only people with the selected permission can run this query.'));
        $row->addSelect('moduleActionName')->fromResults($actions, 'groupBy')->required()->placeholder();

    $row = $form->addRow();
        $row->addLabel('description', __('Description'));
        $row->addTextArea('description')->setRows(8);

    $col = $form->addRow()->addColumn();
        $col->addLabel('query', __m('Command'));
        $col->addCodeEditor('query')
            ->setMode('mysql')
            ->autocomplete($queryGateway->getAutocompletions())
            ->required();

    $bindValues = new BindValues($form->getFactory(), 'bindValues', [], $session);
    $form->addRow()->addElement($bindValues);

    $row = $form->addRow();
        $row->addFooter();
        $row->addSubmit();

    echo $form->getOutput();
}
