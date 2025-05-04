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

use Gibbon\Module\QueryBuilder\Domain\QueryGateway;
use Gibbon\Forms\Prefab\DeleteForm;

if (isActionAccessible($guid, $connection2, '/modules/Query Builder/commands_delete.php') == false) {
    // Access denied
    $page->addError(__('You do not have access to this action.'));
} else {
    // Proceed!
    $queryGateway = $container->get(QueryGateway::class);
    
    $queryBuilderQueryID = $_GET['queryBuilderQueryID'] ?? '';
    $search = $_GET['search'] ?? '';

    // Validate the required values are present
    if (empty($queryBuilderQueryID)) { 
        $page->addError(__('You have not specified one or more required parameters.'));
        return;
    }

    // Validate this user has access to this query
    $values = $queryGateway->getQueryByPerson($queryBuilderQueryID, $session->get('gibbonPersonID'), true);
    if (empty($values)) {
        $page->addError(__('The selected record does not exist, or you do not have access to it.'));
        return;
    }

    // Prevent access to the wrong context
    if ($values['context'] == 'Query') {
        $page->addError(__('You do not have access to this action.'));
        return;
    }

    // Let's go!
    $form = DeleteForm::createForm($session->get('absoluteURL').'/modules/'.$session->get('module')."/commands_deleteProcess.php?queryBuilderQueryID=$queryBuilderQueryID&search=$search");
    echo $form->getOutput();
}
