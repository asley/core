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

$search = $_GET['search'] ?? '';

$URL = $session->get('absoluteURL').'/index.php?q=/modules/'.getModuleName($_POST['address'])."/commands_add.php&sidebar=false&search=$search";

if (isActionAccessible($guid, $connection2, '/modules/Query Builder/commands_add.php') == false) {
    // Fail 0
    $URL = $URL.'&return=error0';
    header("Location: {$URL}");
    exit;
} else {
    // Proceed!
    $queryGateway = $container->get(QueryGateway::class);

    list($moduleName, $actionName) = !empty($_POST['moduleActionName']) ? explode(':', $_POST['moduleActionName']) : [null, null];

    $data = [
        'context'     => 'Command',
        'type'        => $_POST['type'] ?? '',
        'name'        => $_POST['name'] ?? '',
        'category'    => $_POST['category'] ?? '',
        'moduleName'  => $moduleName ?? null,
        'actionName'  => $actionName ?? null,
        'active'      => $_POST['active'] ?? 'Y',
        'description' => $_POST['description'] ?? '',
        'query'       => $_POST['query'] ?? '',
        'bindValues'  => $_POST['bindValues'] ?? [],
        'gibbonPersonID'  => $session->get('gibbonPersonID'),
    ];

    // Sort and jsonify bindValues
    if (!empty($data['bindValues']) && is_array($data['bindValues'])) {
        $data['bindValues'] = array_combine(array_keys($_POST['order']), array_values($data['bindValues']));
        ksort($data['bindValues']);
        $data['bindValues'] = json_encode($data['bindValues']);
    }

    // Validate the required values are present
    if (empty($data['type']) || empty($data['name']) || empty($data['category']) || empty($data['active']) || empty($data['query'])) {
        $URL .= '&return=error1';
        header("Location: {$URL}");
        exit;
    }

    // Update the record
    $inserted = $queryGateway->insert($data);
    $queryBuilderQueryID = str_pad($inserted, 10, '0', STR_PAD_LEFT);

    $URL .= !$inserted
        ? "&return=error2"
        : "&return=success0";

    header("Location: {$URL}&editID={$queryBuilderQueryID}");
}
