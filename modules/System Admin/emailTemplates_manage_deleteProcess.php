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

use Gibbon\Domain\System\EmailTemplateGateway;

include '../../gibbon.php';

$gibbonEmailTemplateID = $_POST['gibbonEmailTemplateID'] ?? '';

$URL = $session->get('absoluteURL').'/index.php?q=/modules/'.getModuleName($_POST['address']).'/emailTemplates_manage.php';

if (isActionAccessible($guid, $connection2, '/modules/System Admin/emailTemplates_manage_delete.php') == false) {
    $URL .= '&return=error0';
    header("Location: {$URL}");
} else {
    //Proceed!
    $emailTemplateGateway = $container->get(EmailTemplateGateway::class);
    
    // Validate the required values are present
    if (empty($gibbonEmailTemplateID)) {
        $URL .= '&return=error1';
        header("Location: {$URL}");
        exit;
    }

    // Validate the database relationships exist
    if (!$emailTemplateGateway->exists($gibbonEmailTemplateID)) {
        $URL .= '&return=error2';
        header("Location: {$URL}");
        exit;
    }

    // Delete the record
    $deleted = $emailTemplateGateway->delete($gibbonEmailTemplateID);

    $URL .= !$deleted
        ? "&return=error2"
        : "&return=success0";

    header("Location: {$URL}");
}
