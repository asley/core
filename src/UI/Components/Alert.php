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

namespace Gibbon\UI\Components;

use Gibbon\Http\Url;
use Gibbon\Services\Format;
use Gibbon\Contracts\Services\Session;
use Gibbon\Domain\System\SettingGateway;
use Gibbon\Contracts\Database\Connection;
use Gibbon\Domain\StudentAlerts\AlertGateway;
use Gibbon\Domain\Students\MedicalGateway;
use Gibbon\Domain\System\AlertLevelGateway;
use Gibbon\Domain\Behaviour\BehaviourGateway;
use Gibbon\Domain\Markbook\MarkbookEntryGateway;
use Gibbon\Domain\IndividualNeeds\INPersonDescriptorGateway;
use Gibbon\View\Component;
use Gibbon\Domain\User\UserGateway;

/**
 * Alert class to calculate and get Alerts for Students
 *
 * @version  v30
 * @since    v30
 */

class Alert
{
    protected $db;
    protected $session;
    protected $settingGateway;
    protected $alertLevelGateway;
    protected $userGateway;
    protected $medicalGateway;
    protected $inPersonDescriptorGateway;
    protected $markbookEntryGateway;
    protected $behaviourGateway;
    protected $alertGateway;

    protected $alertTypes;
    protected $alertLevels = ['High' => 001, 'Medium' => 002, 'Low' => 003];
    protected $alerts = [];

    protected $days = 60;

    public function __construct(
        Connection $db,
        Session $session,
        SettingGateway $settingGateway,
        AlertLevelGateway $alertLevelGateway,
        UserGateway $userGateway,
        MedicalGateway $medicalGateway,
        INPersonDescriptorGateway $inPersonDescriptorGateway,
        MarkbookEntryGateway $markbookEntryGateway,
        BehaviourGateway $behaviourGateway,
        AlertGateway $alertGateway
    ) {
        $this->db = $db;
        $this->session = $session;
        $this->settingGateway = $settingGateway;
        $this->alertLevelGateway = $alertLevelGateway;
        $this->userGateway = $userGateway;
        $this->medicalGateway = $medicalGateway;
        $this->inPersonDescriptorGateway = $inPersonDescriptorGateway;
        $this->markbookEntryGateway = $markbookEntryGateway;
        $this->behaviourGateway = $behaviourGateway;
        $this->alertGateway = $alertGateway;

        $this->alertTypes = $this->alertGateway->selectAllAlertTypes()->fetchGroupedUnique();
    }

    public function getAlertBar($gibbonPersonID, $privacy = '', $divExtras = '', $div = true, $large = false, $target = "_self") 
    {
        $guid = $this->session->get('guid');
        $connection2 = $this->db->getConnection();
       
        $output = '';
        $target = ($target == "_blank") ? "_blank" : "_self";

        $highestAction = getHighestGroupedAction($guid, '/modules/Students/student_view_details.php', $connection2);
        if ($highestAction == 'View Student Profile_full' || $highestAction == 'View Student Profile_fullNoNotes' || $highestAction == 'View Student Profile_fullEditAllNotes') {
            
            // Get all alerts for a student
            $alerts = $this->getStudentAlerts($gibbonPersonID);
            
            foreach ($alerts as $alert) {
                $details = $this->getAlertTextAndLink($gibbonPersonID, $alert['type'], $alert['level'] ?? $privacy);

                $output .= Component::render(Alert::class, [
                    'color'   => $alert['levelColor'] ?? $alert['color'] ?? '#939090',
                    'colorBG' => $alert['levelColorBG'] ?? $alert['colorBG'] ?? '#dddddd',
                    'large'   => $large,
                    'target'  => $target,
                ] + $details + $alert);
            }

            if ($div == true) {
                $output = "<div {$divExtras} class='w-20 lg:w-24 h-6 text-left py-1 px-0 mx-auto'>{$output}</div>";
            }
        }
        
        return $output;
    }

    public function calculateAlerts($gibbonPersonID)
    {
        $this->alerts = [];

        $this->calculateIndividualNeedsAlerts($gibbonPersonID);
        $this->calculateAcademicAlerts($gibbonPersonID);
        $this->calculateBehaviourAlerts($gibbonPersonID);
        $this->calculateMedicalAlerts($gibbonPersonID);
        $this->calculatePrivacyAlerts($gibbonPersonID);

        return $this->alerts;
    }

    public function getAlertType($type)
    {
        return $this->alertTypes[$type] ?? [];
    }

    public function isAlertTypeActive($type)
    {
        return !empty($this->alertTypes[$type]) && $this->alertTypes[$type]['active'] == 'Y';
    }

    protected function getStudentAlerts($gibbonPersonID)
    {
        $allAlerts = $this->alertGateway->getAllAlertsByStudent($this->session->get('gibbonSchoolYearID'), $gibbonPersonID);
        $alerts = [];
        
        foreach ($allAlerts as $alert) {
            if (empty($alerts[$alert['type']])) {
                $alerts[$alert['type']] = $alert;
                continue;
            }

            $existing = $alerts[$alert['type']];

            $isHigherLevel = $alert['alertLevel'] > $existing['alertLevel'];
            $isHigherContext = $alert['context'] == 'Manual' && $existing['context'] != 'Manual';
            $isMoreRecent = $alert['timestampCreated'] > $existing['timestampCreated'];

            if ($isHigherLevel || $isHigherContext || $isMoreRecent) {
                $alerts[$alert['type']] = $alert;
            }
        }

        return $alerts;
    }

    // Individual Needs Alert
    protected function calculateIndividualNeedsAlerts($gibbonPersonID)
    {
        if (!$this->isAlertTypeActive('Individual Needs')) return;

        $resultAlert = $this->inPersonDescriptorGateway->selectINDescriptorAlertLevelsByPerson($gibbonPersonID);

        if ($alert = $resultAlert->fetch()) {
            $alertType = $this->getAlertType('Individual Needs');

            $this->alerts[] = [
                'gibbonAlertTypeID'  => $alertType['gibbonAlertTypeID'],
                'gibbonAlertLevelID' => $this->getAlertLevelID($alert['level']),
                'context'            => 'Automatic',
                'status'             => 'Approved',
                'type'               => $alertType['name'],
                'level'              => $alert['level'] ?? null,
            ];
        }
    }

    // Academic Alert
    protected function calculateAcademicAlerts($gibbonPersonID)
    {
        if (!$this->isAlertTypeActive('Academic')) return;

        $resultAlert = $this->markbookEntryGateway->selectMarkbookConcernsByStudentAndDate($this->session->get('gibbonSchoolYearID'), $gibbonPersonID, $this->days);

        $alertType = $this->getAlertType('Academic');
        $alertLevel = $this->getAlertLevelByThreshold($alertType['name'], $resultAlert->rowCount());

        if (!empty($alertLevel)) {
            $this->alerts[] = [
                'gibbonAlertTypeID'  => $alertType['gibbonAlertTypeID'],
                'gibbonAlertLevelID' => $alertLevel['id'] ?? null,
                'context'            => 'Automatic',
                'status'             => 'Approved',
                'type'               => $alertType['name'],
                'level'              => $alertLevel['level'] ?? null,
            ];
        }
        
    }

    // Behaviour Alert
    protected function calculateBehaviourAlerts($gibbonPersonID)
    {
        if (!$this->isAlertTypeActive('Behaviour')) return;

        $resultAlert = $this->behaviourGateway->selectNegativeBehaviourByStudentAndDate($gibbonPersonID, $this->days);

        $alertType = $this->getAlertType('Behaviour');
        $alertLevel = $this->getAlertLevelByThreshold($alertType['name'], $resultAlert->rowCount());

        if (!empty($alertLevel)) {
            $this->alerts[] = [
                'gibbonAlertTypeID'  => $alertType['gibbonAlertTypeID'],
                'gibbonAlertLevelID' => $alertLevel['id'] ?? null,
                'context'            => 'Automatic',
                'status'             => 'Approved',
                'type'               => $alertType['name'],
                'level'              => $alertLevel['level'] ?? null,
            ];
        }
    }

    // Medical Alert
    protected function calculateMedicalAlerts($gibbonPersonID)
    {
        if (!$this->isAlertTypeActive('Medical')) return;

        if ($alert = $this->medicalGateway->getHighestMedicalRisk($gibbonPersonID)) {
            $alertType = $this->getAlertType('Medical');
            $this->alerts[] = [
                'gibbonAlertTypeID'  => $alertType['gibbonAlertTypeID'],
                'gibbonAlertLevelID' => $this->getAlertLevelID($alert['level']),
                'context'            => 'Automatic',
                'status'             => 'Approved',
                'type'               => $alertType['name'],
                'level'              => $alert['level'],
            ];
        }
    }

    // Privacy Alert
    protected function calculatePrivacyAlerts($gibbonPersonID)
    {
        if (!$this->isAlertTypeActive('Privacy')) return;

        $privacySetting = $this->settingGateway->getSettingByScope('User Admin', 'privacy');
        if ($privacySetting != 'Y') return;
           
        $person = $this->userGateway->getByID($gibbonPersonID, ['privacy']);
        if (!empty($person['privacy']) && $alertType = $this->getAlertType('Privacy')) {
            $this->alerts[] = [
                'gibbonAlertTypeID'  => $alertType['gibbonAlertTypeID'],
                'gibbonAlertLevelID' => null,
                'context'            => 'Automatic',
                'status'             => 'Approved',
                'type'               => $alertType['name'],
                'level'              => null,
            ];
        }
    }

    private function getAlertTextAndLink($gibbonPersonID, $type, $level = '') : array
    {
        $link = Url::fromModuleRoute('Students', 'student_view_details');

        switch ($type) {
            case 'Individual Needs':
                return [
                    'title' => __('Individual Needs alerts are set, up to a maximum alert level of {level}.', ['level' => $level]),
                    'link' => $link->withQueryParams(['gibbonPersonID' => $gibbonPersonID, 'subpage' => 'Individual Needs']),
                ];
            case 'Academic':
                return [
                    'title' => __('Student has a {level} alert for academic concern over the past 60 days.', ['level' => $level]).' '.$this->getThresholdText($type, $level),
                    'link' => $link->withQueryParams(['gibbonPersonID' => $gibbonPersonID, 'subpage' => 'Markbook', 'filter' => $this->session->get('gibbonSchoolYearID')]),
                ];
            case 'Behaviour':
                return [
                    'title' => __('Student has a {level} alert for behaviour over the past 60 days.', ['level' => $level]).' '.$this->getThresholdText($type, $level),
                    'link' => $link->withQueryParams(['gibbonPersonID' => $gibbonPersonID, 'subpage' => 'Behaviour']),
                ];
            case 'Medical':
                return [
                    'title' => __('Medical alerts are set, up to a maximum of {level}', ['level' => $level]),
                    'link' => $link->withQueryParams(['gibbonPersonID' => $gibbonPersonID, 'subpage' => 'Medical']),
                ];
            case 'Privacy':
                return [
                    'title' => __('Privacy is required: {level}', ['level' => $level]),
                    'link' => $link->withQueryParams(['gibbonPersonID' => $gibbonPersonID]),
                ];
            default:
                return [
                    'title' => __($type).': '.__($level),
                    'link' => $link->withQueryParams(['gibbonPersonID' => $gibbonPersonID]),
                ];
        }
    }

    private function getThresholdText($type, $level) : string
    {
        $alertType = $this->getAlertType($type);

        if (empty($level) || empty($alertType['thresholdHigh'])) return '';

        switch ($level) {
            case 'High':
                return __('This alert level occurs when there are more than {count} events recorded for a student.', ['count' => $alertType['thresholdHigh']]);
            case 'Medium':
                return __('This alert level occurs when there are between {count} and {count2} events recorded for a student.', ['count' => $alertType['thresholdMed'], 'count2' => $alertType['thresholdHigh'] - 1]);
            case 'Low':
                return __('This alert level occurs when there are between {count} and {count2} events recorded for a student.', ['count' => $alertType['thresholdLow'], 'count2' => $alertType['thresholdMed'] - 1]);
        }

        return '';
    }

    private function getAlertLevelID($level)
    {
        return $this->alertLevels[$level] ?? null;
    }

    private function getAlertLevelByThreshold($type, $count)
    {
        $alertType = $this->getAlertType($type);

        if (empty($alertType['thresholdHigh']) || empty($alertType['thresholdMed']) || empty($alertType['thresholdLow'])) return null;

        if ($count >= $alertType['thresholdHigh']) {
            return ['id' => 001, 'level' => 'High'];
        } elseif ($count >= $alertType['thresholdMed']) {
            return ['id' => 002, 'level' => 'Medium'];
        } elseif ($count >= $alertType['thresholdLow']) {
            return ['id' => 003, 'level' => 'Low'];
        }

        return null;
    }   
}
