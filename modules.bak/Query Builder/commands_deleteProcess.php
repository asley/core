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
use Gibbon\Module\QueryBuilder\Domain\FavouriteGateway;

include '../../gibbon.php';

$queryBuilderQueryID = $_GET['queryBuilderQueryID'] ?? '';
$search = $_GET['search'] ?? '';

$URL = $session->get('absoluteURL')."/index.php?q=/modules/Query Builder/commands_delete.php&queryBuilderQueryID=$queryBuilderQueryID&search=$search";
$URLDelete = $session->get('absoluteURL')."/index.php?q=/modules/Query Builder/commands.php&search=$search";

if (isActionAccessible($guid, $connection2, '/modules/Query Builder/commands_delete.php') == false) {
    // Access denied
    $URL = $URL.'&return=error0';
    header("Location: {$URL}");
} else {
    // Proceed!
    $queryGateway = $container->get(QueryGateway::class);
    $favouriteGateway = $container->get(FavouriteGateway::class);

    // Validate the required values are present
    if (empty($queryBuilderQueryID)) {
        $URL = $URL.'&return=error1';
        header("Location: {$URL}");
        exit;
    } 

    // Validate this user has access to this query
    $values = $queryGateway->getQueryByPerson($queryBuilderQueryID, $session->get('gibbonPersonID'), true);
    if (empty($values)) {
        $URL = $URL.'&return=error2';
        header("Location: {$URL}");
        exit;
    }

    // Prevent access to the wrong context
    if ($values['context'] == 'Query') {
        $URL = $URL.'&return=error0';
        header("Location: {$URL}");
        exit;
    }

    // Delete record
    $deleted = $queryGateway->delete($queryBuilderQueryID);

    if (!$deleted) {
        $URL = $URL.'&return=error2';
        header("Location: {$URL}");
        exit;
    }

    $favouriteGateway->deleteWhere(['queryBuilderQueryID' => $queryBuilderQueryID]);

    $URLDelete = $URLDelete.'&return=success0';
    header("Location: {$URLDelete}");
}
