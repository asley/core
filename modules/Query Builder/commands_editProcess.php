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

$URL = $session->get('absoluteURL').'/index.php?q=/modules/Query Builder/commands_edit.php&queryBuilderQueryID='.$queryBuilderQueryID."&sidebar=false&search=$search";

if (isActionAccessible($guid, $connection2, '/modules/Query Builder/commands_edit.php') == false) {
    $URL = $URL.'&return=error0';
    header("Location: {$URL}");
    exit;
} else {
    // Proceed!
    $queryGateway = $container->get(QueryGateway::class);
    $values = $queryGateway->getByID($queryBuilderQueryID);

    list($moduleName, $actionName) = !empty($_POST['moduleActionName']) ? explode(':', $_POST['moduleActionName']) : [null, null];

    if ($values['type'] == "gibbonedu.com") {
        $data = [
            'active'      => $_POST['active'] ?? 'Y',
        ];
    } else {
        $data = [
            'name'        => $_POST['name'] ?? '',
            'category'    => $_POST['category'] ?? '',
            'moduleName'  => $moduleName ?? null,
            'actionName'  => $actionName ?? null,
            'active'      => $_POST['active'] ?? 'Y',
            'description' => $_POST['description'] ?? '',
            'query'       => $_POST['query'] ?? '',
            'bindValues'  => $_POST['bindValues'] ?? [],
        ];
    }

    // Sort and jsonify bindValues
    if (!empty($data['bindValues']) && is_array($data['bindValues'])) {
        $data['bindValues'] = array_combine(array_keys($_POST['order']), array_values($data['bindValues']));
        ksort($data['bindValues']);
        $data['bindValues'] = json_encode($data['bindValues']);
    }

    // Validate the required values are present
    if ($values['type'] == "gibbonedu.com") {
        if (empty($queryBuilderQueryID) || empty($data['active'])) {
            $URL .= '&return=error1';
            header("Location: {$URL}");
            exit;
        }
    } else {
        if (empty($queryBuilderQueryID) || empty($data['name']) || empty($data['category']) || empty($data['active']) || empty($data['query'])) {
            $URL .= '&return=error1';
            header("Location: {$URL}");
            exit;
        }
    }

    // Validate the database relationships exist
    if (empty($values)) {
        $URL .= '&return=error2';
        header("Location: {$URL}");
        exit;
    }

    // Validate this user has access to this query
    if (($values['Personal'] && $values['gibbonPersonID'] != $session->get('gibbonPersonID'))) {
        $URL .= '&return=error0';
        header("Location: {$URL}");
        exit;
    }

    // Update the record
    $updated = $queryGateway->update($queryBuilderQueryID, $data);

    $URL .= !$updated
        ? "&return=error2"
        : "&return=success0";

    header("Location: {$URL}");
}
