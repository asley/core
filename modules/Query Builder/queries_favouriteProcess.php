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

$URL = $session->get('absoluteURL').'/index.php?q=/modules/Query Builder/queries_run.php&queryBuilderQueryID='.$queryBuilderQueryID."&search=$search&sidebar=false";

if (isActionAccessible($guid, $connection2, '/modules/Query Builder/queries_run.php') == false) {
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

    $values = $queryGateway->getByID($queryBuilderQueryID);
    if ($values['context'] == 'Command') {
        $URL = $session->get('absoluteURL').'/index.php?q=/modules/Query Builder/commands_run.php&queryBuilderQueryID='.$queryBuilderQueryID."&search=$search&sidebar=false";
    }

    $data = [
        'queryBuilderQueryID' => $queryBuilderQueryID,
        'gibbonPersonID' => $session->get('gibbonPersonID')
    ];

    $favourite = $favouriteGateway->selectBy($data)->fetch();

    // Delete if existing, else insert
    if (!empty($favourite)) {
        $favouriteGateway->delete($favourite['queryBuilderFavouriteID']);
    } else {
        $favouriteGateway->insert($data);
    }

    $URL = $URL.'&return=success0';
    header("Location: {$URL}");
}
