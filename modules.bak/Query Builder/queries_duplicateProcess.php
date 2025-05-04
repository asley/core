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

include '../../gibbon.php';

$queryBuilderQueryID = $_GET['queryBuilderQueryID'] ?? '';
$search = $_GET['search'] ?? '';

$URL = $session->get('absoluteURL').'/index.php?q=/modules/'.getModuleName($_POST['address']).'/queries_duplicate.php&queryBuilderQueryID='.$queryBuilderQueryID."&search=$search";

if (isActionAccessible($guid, $connection2, '/modules/Query Builder/queries_duplicate.php') == false) {
    // Access denied
    $URL = $URL.'&return=error0';
    header("Location: {$URL}");
} else {
    // Proceed!
    $queryGateway = $container->get(QueryGateway::class);
    
    // Validate the required values are present
    if (empty($queryBuilderQueryID)) {
        $URL = $URL.'&return=error1';
        header("Location: {$URL}");
        exit;
    }

    // Validate the database record exists
    $values = $queryGateway->getQueryByPerson($queryBuilderQueryID, $session->get('gibbonPersonID'));
    if (empty($values)) {
        $URL = $URL.'&return=error2';
        header("Location: {$URL}");
        exit;
    }

    // Validate Inputs
    $data = [
        'context'        => 'Query',
        'name'           => $_POST['name'] ?? '',
        'type'           => $_POST['type'] ?? '',
        'category'       => $values['category'],
        'moduleName'     => $values['moduleName'],
        'actionName'     => $values['actionName'],
        'active'         => $values['active'],
        'description'    => $values['description'],
        'query'          => $values['query'],
        'bindValues'     => $values['bindValues'],
        'gibbonPersonID' => $session->get('gibbonPersonID'),
    ];

    if (empty($data['name']) || empty($data['category']) || empty($data['active']) || empty($data['query'])) {
        $URL = $URL.'&return=error3';
        header("Location: {$URL}");
        exit;
    } 

    // Insert the record
    $inserted = $queryGateway->insert($data);
    $queryBuilderQueryID = str_pad($inserted, 10, '0', STR_PAD_LEFT);

    $URL = $URL.'&return=success0&editID='.$queryBuilderQueryID;
    header("Location: {$URL}");
}
