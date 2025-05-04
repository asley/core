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

use Gibbon\Services\Format;
use Gibbon\Tables\DataTable;
use Gibbon\Domain\System\SettingGateway;
use Gibbon\Tables\Renderer\SpreadsheetRenderer;
use Gibbon\Module\QueryBuilder\Domain\QueryGateway;

$_POST['address'] = '/modules/Query Builder/queries_run.php';

// System-wide include
include '../../gibbon.php';

//Increase memory limit
ini_set('memory_limit','512M');
ini_set('max_execution_time', 0);

$queryBuilderQueryID = $_GET['queryBuilderQueryID'] ?? '';
$hash = $_GET['hash'] ?? '';
$query = $session->get($hash)['query'] ?? '';
$queryData = $session->get($hash)['queryData'] ?? [];

$URL = $session->get('absoluteURL').'/index.php?q=/modules/Query Builder/queries_run.php&sidebar=false&queryBuilderQueryID='.$queryBuilderQueryID;

if (isActionAccessible($guid, $connection2, '/modules/Query Builder/queries_run.php') == false) {
    $URL = $URL.'&return=error0';
    header("Location: {$URL}");
    exit;
} else {
    $session->remove($hash);

    if ($queryBuilderQueryID == '' or $hash == '' or $query == '') {
        $URL = $URL.'&return=error1';
        header("Location: {$URL}");
        exit;
    }

    $queryGateway = $container->get(QueryGateway::class);

    // Validate the database record exists
    $values = $queryGateway->getQueryByPerson($queryBuilderQueryID, $session->get('gibbonPersonID'), false, true);
    if (empty($values)) {
        $URL = $URL.'&return=error1';
        header("Location: {$URL}");
        exit;
    }

    // Security check
    $illegalList = [];
    foreach ($queryGateway->getIllegals() as $illegal) {
        if (preg_match('/\b('.$illegal.')\b/i', $query)) {
            $illegalList[] = $illegal;
        }
    }
    if (!empty($illegalList)) {
        $URL = $URL.'&return=error3&illegals='.urlencode(implode(',', $illegalList));
        header("Location: {$URL}");
        exit;
    }

    // Check for specific access to this query
    if (!empty($values['actionName']) || !empty($values['moduleName'])) {
        if (empty($queryGateway->getIsQueryAccessible($queryBuilderQueryID, $session->get('gibbonPersonID')))) {
            $URL = $URL.'&return=error0';
            header("Location: {$URL}");
            exit;
        }
    }

    // Check for inactive
    if ($values['active'] != 'Y') {
        $URL = $URL.'&return=error1';
        header("Location: {$URL}");
        exit;
    }

    // Run the query
    $result = $pdo->select($query, $queryData);

    if (!$pdo->getQuerySuccess()) {
        $URL = $URL.'&return=error2';
        header("Location: {$URL}");
        exit;
    }

    // Proceed!
    $renderer = new SpreadsheetRenderer($session->get('absolutePath'));
    $table = DataTable::create('queryBuilderExport', $renderer);

    $filename = substr(preg_replace('/[^a-zA-Z0-9]/', '', $values['name']), 0, 30);

    $table->addMetaData('filename', 'queryExport_'.$filename);
    $table->addMetaData('filetype', $container->get(SettingGateway::class)->getSettingByScope('Query Builder', 'exportDefaultFileType'));
    $table->addMetaData('creator', Format::name('', $session->get('preferredName'), $session->get('surname'), 'Staff'));
    $table->addMetaData('name', $values['name']);

    for ($i = 0; $i < $result->columnCount(); ++$i) {
        $col = $result->getColumnMeta($i);
        $width = stripos($col['native_type'], 'text') !== false ? '25' : 'auto';

        $table->addColumn($col['name'], $col['name'])->width($width);
    }

    echo $table->render($result->toDataSet());
}
