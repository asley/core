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

namespace Gibbon\Module\Admissions\Forms;

use Gibbon\Http\Url;
use Gibbon\View\View;
use Gibbon\Forms\Form;
use Gibbon\Services\Format;
use Gibbon\Contracts\Services\Session;
use Gibbon\Domain\System\SettingGateway;
use Gibbon\Domain\User\UserGateway;

/**
 * ApplicationMilestonesForm
 *
 * @version v24
 * @since   v24
 */
class ApplicationMilestonesForm extends Form
{
    protected $view;
    protected $session;
    protected $settingGateway;
    protected $userGateway;

    public function __construct(Session $session, View $view, SettingGateway $settingGateway, UserGateway $userGateway)
    {
        $this->view = $view;
        $this->session = $session;
        $this->settingGateway = $settingGateway;
        $this->userGateway = $userGateway;
    }

    public function createForm($urlParams, $milestones)
    {
        $action = Url::fromHandlerRoute('modules/Admissions/applications_manage_editMilestoneProcess.php');

        // Get the milestones
        $milestonesList = $this->settingGateway->getSettingByScope('Application Form', 'milestones');
        $milestonesList = array_map('trim', explode(',', $milestonesList));

        $milestonesData = json_decode($milestones ?? '', true);

        // Build the form
        $form = Form::createBlank('applicationMilestones', $action);

        $form->addHiddenValue('address', $this->session->get('address'));
        $form->addHiddenValues($urlParams);
        $form->addHiddenValue('tab', 2);

        $checkIcon = icon('basic', 'check', 'milestoneCheck size-6 fill-current mr-3 -my-2 text-green-600');
        $crossIcon = icon('basic', 'cross', 'milestoneCross size-6 fill-current mr-3 -my-2 text-red-700');

        foreach ($milestonesList as $index => $milestone) {
            $data = $milestonesData[$milestone] ?? [];
            $checked = !empty($data);
            $dateInfo = '';
            if ($checked) {
                $user = $this->userGateway->getByID($milestonesData[$milestone]['user'], ['preferredName', 'surname']);
                $dateInfo = Format::dateReadable($milestonesData[$milestone]['date']).' '.__('By').' '.Format::name('', $user['preferredName'], $user['surname'], 'Staff', false, true);
            }

            $row = $form->addRow()->addClass('milestoneInput flex justify-between items-center border rounded p-4 my-2 '. ($checked ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'));

            $row->addContent($checked ? $checkIcon : $crossIcon)->setClass('w-12');
            $row->addContent(__($milestone))->addClass('flex-1 text-base font-medium');
            $row->addContent($dateInfo)->addClass('flex-1 text-xs');

            $row->addCheckbox("milestones[{$milestone}]")
                ->setValue('Y')
                ->checked($checked ? 'Y' : 'N')
                ->alignRight()
                ->setClass('w-24');
        }

        $form->addRow()->addSubmit();

        return $form;
    }
}
