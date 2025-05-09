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

use Gibbon\Data\Validator;
use Gibbon\Services\Format;
use Gibbon\Comms\NotificationSender;
use Gibbon\Domain\System\SettingGateway;
use Gibbon\Domain\System\NotificationGateway;
use Gibbon\Domain\Finance\FinanceExpenseApproverGateway;

require_once '../../gibbon.php';

$_POST = $container->get(Validator::class)->sanitize($_POST);

//Module includes
include './moduleFunctions.php';

$gibbonFinanceBudgetCycleID = $_POST['gibbonFinanceBudgetCycleID'] ?? '';
$gibbonFinanceBudgetID = $_POST['gibbonFinanceBudgetID'] ?? '';
$gibbonFinanceExpenseID = $_POST['gibbonFinanceExpenseID'] ?? '';
$status2 = $_POST['status2'] ?? '';
$gibbonFinanceBudgetID2 = $_POST['gibbonFinanceBudgetID2'] ?? '';

if ($gibbonFinanceBudgetCycleID == '' or $gibbonFinanceBudgetID == '') { echo 'Fatal error loading this page!';
} else {
    $URL = $session->get('absoluteURL').'/index.php?q=/modules/'.getModuleName($_POST['address'])."/expenses_manage_approve.php&gibbonFinanceBudgetCycleID=$gibbonFinanceBudgetCycleID&gibbonFinanceBudgetID2=$gibbonFinanceBudgetID2&status2=$status2";
    $URLApprove = $session->get('absoluteURL').'/index.php?q=/modules/'.getModuleName($_POST['address'])."/expenses_manage.php&gibbonFinanceBudgetCycleID=$gibbonFinanceBudgetCycleID&gibbonFinanceBudgetID2=$gibbonFinanceBudgetID2&status2=$status2";

    if (isActionAccessible($guid, $connection2, '/modules/Finance/expenses_manage_approve.php') == false) {
        $URL .= '&return=error0';
        header("Location: {$URL}");
    } else {
        $highestAction = getHighestGroupedAction($guid, $_POST['address'], $connection2);
        if ($highestAction == false) {
            $URL .= '&return=error0';
            header("Location: {$URL}");
        } else {
            //Check if params are specified
            if ($gibbonFinanceExpenseID == '' or $gibbonFinanceBudgetCycleID == '') {
                $URL .= '&return=error0';
                header("Location: {$URL}");
            } else {
                $budgetsAccess = false;
                if ($highestAction == 'Manage Expenses_all') { //Access to everything
                    $budgetsAccess = true;
                } else {
                    //Check if have Full or Write in any budgets
                    $budgets = getBudgetsByPerson($connection2, $session->get('gibbonPersonID'));
                    if (is_array($budgets) && count($budgets)>0) {
                        foreach ($budgets as $budget) {
                            if ($budget[2] == 'Full' or $budget[2] == 'Write') {
                                $budgetsAccess = true;
                            }
                        }
                    }
                }

                if ($budgetsAccess == false) {
                    $URL .= '&return=error0';
                    header("Location: {$URL}");
                } else {
                    //Get and check settings
                    $settingGateway = $container->get(SettingGateway::class);
                    $expenseApprovalType = $settingGateway->getSettingByScope('Finance', 'expenseApprovalType');
                    $budgetLevelExpenseApproval = $settingGateway->getSettingByScope('Finance', 'budgetLevelExpenseApproval');
                    $expenseRequestTemplate = $settingGateway->getSettingByScope('Finance', 'expenseRequestTemplate');
                    if ($expenseApprovalType == '' or $budgetLevelExpenseApproval == '') {
                        $URL .= '&return=error0';
                        header("Location: {$URL}");
                    } else {
                        //Check if there are approvers
                        $result = $container->get(FinanceExpenseApproverGateway::class)->selectExpenseApprovers();
                        
                        if ($result->rowCount() < 1) {
                            $URL .= '&return=error0';
                            header("Location: {$URL}");
                        } else {
                            //Ready to go! Just check record exists and we have access, and load it ready to use...
                            try {
                                //Set Up filter wheres
                                $data = array('gibbonFinanceBudgetCycleID' => $gibbonFinanceBudgetCycleID, 'gibbonFinanceExpenseID' => $gibbonFinanceExpenseID);
                                //GET THE DATA ACCORDING TO FILTERS
                                if ($highestAction == 'Manage Expenses_all') { //Access to everything
                                    $sql = "SELECT gibbonFinanceExpense.*, gibbonFinanceBudget.name AS budget, surname, preferredName, 'Full' AS access
										FROM gibbonFinanceExpense
										JOIN gibbonFinanceBudget ON (gibbonFinanceExpense.gibbonFinanceBudgetID=gibbonFinanceBudget.gibbonFinanceBudgetID)
										JOIN gibbonPerson ON (gibbonFinanceExpense.gibbonPersonIDCreator=gibbonPerson.gibbonPersonID)
										WHERE gibbonFinanceBudgetCycleID=:gibbonFinanceBudgetCycleID AND gibbonFinanceExpenseID=:gibbonFinanceExpenseID";
                                } else { //Access only to own budgets
                                    $data['gibbonPersonID'] = $session->get('gibbonPersonID');
                                    $sql = "SELECT gibbonFinanceExpense.*, gibbonFinanceBudget.name AS budget, surname, preferredName, access
										FROM gibbonFinanceExpense
										JOIN gibbonFinanceBudget ON (gibbonFinanceExpense.gibbonFinanceBudgetID=gibbonFinanceBudget.gibbonFinanceBudgetID)
										JOIN gibbonFinanceBudgetPerson ON (gibbonFinanceBudgetPerson.gibbonFinanceBudgetID=gibbonFinanceBudget.gibbonFinanceBudgetID)
										JOIN gibbonPerson ON (gibbonFinanceExpense.gibbonPersonIDCreator=gibbonPerson.gibbonPersonID)
										WHERE gibbonFinanceBudgetCycleID=:gibbonFinanceBudgetCycleID AND gibbonFinanceExpenseID=:gibbonFinanceExpenseID AND gibbonFinanceBudgetPerson.gibbonPersonID=:gibbonPersonID AND access='Full'";
                                }
                                $result = $connection2->prepare($sql);
                                $result->execute($data);
                            } catch (PDOException $e) {
                                $URL .= '&return=error2';
                                header("Location: {$URL}");
                                exit();
                            }

                            if ($result->rowCount() != 1) {
                                $URL .= '&return=error0';
                                header("Location: {$URL}");
                            } else {
                                $row = $result->fetch();

                                $approval = $_POST['approval'] ?? '';
                                if ($approval == 'Approval - Partial') {
                                    if ($row['statusApprovalBudgetCleared'] == 'N') {
                                        $approval = 'Approval - Partial - Budget';
                                    } else {
                                        //Check if school approver, if not, abort
                                        $data = ['gibbonPersonID' => $session->get('gibbonPersonID')];
                                        $sql = "SELECT * FROM gibbonFinanceExpenseApprover JOIN gibbonPerson ON (gibbonFinanceExpenseApprover.gibbonPersonID=gibbonPerson.gibbonPersonID) WHERE status='Full' AND gibbonFinanceExpenseApprover.gibbonPersonID=:gibbonPersonID";
                                        $result = $connection2->prepare($sql);
                                        $result->execute($data);

                                        if ($result->rowCount() == 1) {
                                            $approval = 'Approval - Partial - School';
                                        } else {
                                            $URL .= '&return=error0';
                                            header("Location: {$URL}");
                                            exit();
                                        }
                                    }
                                }
                                $comment = $_POST['comment'] ?? '';

                                if ($approval == '') {
                                    $URL .= '&return=error7';
                                    header("Location: {$URL}");
                                } else {
                                    //Write budget change
                                    try {
                                        $dataBudgetChange = array('gibbonFinanceBudgetID' => $gibbonFinanceBudgetID, 'gibbonFinanceExpenseID' => $gibbonFinanceExpenseID);
                                        $sqlBudgetChange = 'UPDATE gibbonFinanceExpense SET gibbonFinanceBudgetID=:gibbonFinanceBudgetID WHERE gibbonFinanceExpenseID=:gibbonFinanceExpenseID';
                                        $resultBudgetChange = $connection2->prepare($sqlBudgetChange);
                                        $resultBudgetChange->execute($dataBudgetChange);
                                    } catch (PDOException $e) {
                                        $URL .= '&return=error2';
                                        header("Location: {$URL}");
                                        exit();
                                    }

                                    /**
                                     * @var NotificationGateway
                                     */
                                    $notificationGateway = $container->get(NotificationGateway::class);
                                    //Attempt to archive notification
                                    $notificationGateway->archiveNotificationForPersonAction(
                                        $session->get('gibbonPersonID'),
                                        "/index.php?q=/modules/Finance/expenses_manage_approve.php&gibbonFinanceExpenseID=$gibbonFinanceExpenseID"
                                    );

                                    /**
                                     * @var NotificationSender
                                     */
                                    $notificationSender = $container->get(NotificationSender::class);

                                    if ($approval == 'Rejection') { //REJECT!
                                        //Write back to gibbonFinanceExpense
                                        try {
                                            $data = array('gibbonFinanceExpenseID' => $gibbonFinanceExpenseID);
                                            $sql = "UPDATE gibbonFinanceExpense SET status='Rejected' WHERE gibbonFinanceExpenseID=:gibbonFinanceExpenseID";
                                            $result = $connection2->prepare($sql);
                                            $result->execute($data);
                                        } catch (PDOException $e) {
                                            $URL .= '&return=error2';
                                            header("Location: {$URL}");
                                            exit();
                                        }

                                        //Write rejection to log
                                        try {
                                            $data = array('gibbonFinanceExpenseID' => $gibbonFinanceExpenseID, 'gibbonPersonID' => $session->get('gibbonPersonID'), 'comment' => $comment);
                                            $sql = "INSERT INTO gibbonFinanceExpenseLog SET gibbonFinanceExpenseID=:gibbonFinanceExpenseID, gibbonPersonID=:gibbonPersonID, timestamp='".date('Y-m-d H:i:s')."', action='Rejection', comment=:comment";
                                            $result = $connection2->prepare($sql);
                                            $result->execute($data);
                                        } catch (PDOException $e) {
                                            $URL .= '&return=error2';
                                            header("Location: {$URL}");
                                            exit();
                                        }

                                        //Notify original creator that it is rejected
                                        $notificationText = sprintf(__('Your expense request for "%1$s" in budget "%2$s" has been rejected.'), $row['title'], $row['budget']);
                                        $notificationSender->addNotification($row['gibbonPersonIDCreator'], $notificationText, 'Finance', "/index.php?q=/modules/Finance/expenses_manage_view.php&gibbonFinanceExpenseID=$gibbonFinanceExpenseID&gibbonFinanceBudgetCycleID=$gibbonFinanceBudgetCycleID&status2=&gibbonFinanceBudgetID2=".$row['gibbonFinanceBudgetID']);
                                        $notificationSender->sendNotifications();

                                        $URLApprove .= '&return=success0';
                                        header("Location: {$URLApprove}");
                                    } elseif ($approval == 'Comment') { //COMMENT!
                                        //Write comment to log
                                        try {
                                            $data = array('gibbonFinanceExpenseID' => $gibbonFinanceExpenseID, 'gibbonPersonID' => $session->get('gibbonPersonID'), 'comment' => $comment);
                                            $sql = "INSERT INTO gibbonFinanceExpenseLog SET gibbonFinanceExpenseID=:gibbonFinanceExpenseID, gibbonPersonID=:gibbonPersonID, timestamp='".date('Y-m-d H:i:s')."', action='Comment', comment=:comment";
                                            $result = $connection2->prepare($sql);
                                            $result->execute($data);
                                        } catch (PDOException $e) {
                                            $URL .= '&return=error2';
                                            header("Location: {$URL}");
                                            exit();
                                        }

                                        //Notify original creator that it is commented upon
                                        $personName = Format::name('', $session->get('preferredName'), $session->get('surname'), 'Staff', false, true);

                                        $notificationText = __('{person} has commented on your expense request for {title} in budget {budgetName}.', ['person' => $personName, 'title' => $row['title'], 'budgetName' => $row['budget']]);
                                        $notificationSender->addNotification($row['gibbonPersonIDCreator'], $notificationText, 'Finance', "/index.php?q=/modules/Finance/expenses_manage_view.php&gibbonFinanceExpenseID=$gibbonFinanceExpenseID&gibbonFinanceBudgetCycleID=$gibbonFinanceBudgetCycleID&status2=&gibbonFinanceBudgetID2=".$row['gibbonFinanceBudgetID']);
                                        $notificationSender->sendNotifications();

                                        $URLApprove .= '&return=success0';
                                        header("Location: {$URLApprove}");
                                    } else { //APPROVE!
                                        if (approvalRequired($guid, $session->get('gibbonPersonID'), $row['gibbonFinanceExpenseID'], $gibbonFinanceBudgetCycleID, $connection2, true) == false) {
                                            $URL .= '&return=error0';
                                            header("Location: {$URL}");
                                        } else {
                                            //Add log entry
                                            try {
                                                $data = array('gibbonFinanceExpenseID' => $gibbonFinanceExpenseID, 'gibbonPersonID' => $session->get('gibbonPersonID'), 'action' => $approval, 'comment' => $comment);
                                                $sql = "INSERT INTO gibbonFinanceExpenseLog SET gibbonFinanceExpenseID=:gibbonFinanceExpenseID, gibbonPersonID=:gibbonPersonID, timestamp='".date('Y-m-d H:i:s')."', action=:action, comment=:comment";
                                                $result = $connection2->prepare($sql);
                                                $result->execute($data);
                                            } catch (PDOException $e) {
                                                $URL .= '&return=error2';
                                                header("Location: {$URL}");
                                                exit();
                                            }

                                            if ($approval = 'Approval - Partial - Budget') { //If budget-level approval, write that budget passed to expense record
                                                try {
                                                    $data = array('gibbonFinanceExpenseID' => $gibbonFinanceExpenseID);
                                                    $sql = "UPDATE gibbonFinanceExpense SET statusApprovalBudgetCleared='Y' WHERE gibbonFinanceExpenseID=:gibbonFinanceExpenseID";
                                                    $result = $connection2->prepare($sql);
                                                    $result->execute($data);
                                                } catch (PDOException $e) {
                                                    $URL .= '&return=error2';
                                                    header("Location: {$URL}");
                                                    exit();
                                                }
                                            }

                                            //Check for completion status (returns FALSE, none, budget, school) based on log
                                            $partialFail = false;
                                            $completion = checkLogForApprovalComplete($guid, $gibbonFinanceExpenseID, $connection2);
                                            if ($completion == false) { //If false
                                                $URL .= '&return=error2';
                                                header("Location: {$URL}");
                                                exit();
                                            } elseif ($completion == 'none') { //If none
                                                $URL .= '&return=error2';
                                                header("Location: {$URL}");
                                                exit();
                                            } elseif ($completion == 'budget') { //If budget completion met
                                                //Issue Notifications
                                                if (setExpenseNotification($guid, $gibbonFinanceExpenseID, $gibbonFinanceBudgetCycleID, $connection2) == false) {
                                                    $partialFail = true;
                                                }

                                                //Write back to gibbonFinanceExpense
                                                try {
                                                    $data = array('gibbonFinanceExpenseID' => $gibbonFinanceExpenseID);
                                                    $sql = "UPDATE gibbonFinanceExpense SET statusApprovalBudgetCleared='Y' WHERE gibbonFinanceExpenseID=:gibbonFinanceExpenseID";
                                                    $result = $connection2->prepare($sql);
                                                    $result->execute($data);
                                                } catch (PDOException $e) {
                                                    $URL .= '&return=error2';
                                                    header("Location: {$URL}");
                                                    exit();
                                                }

                                                if ($partialFail == true) {
                                                    $URLApprove .= '&return=success1';
                                                    header("Location: {$URLApprove}");
                                                } else {
                                                    $URLApprove .= '&return=success0';
                                                    header("Location: {$URLApprove}");
                                                }
                                            } elseif ($completion == 'school') { //If school completion met
                                                //Write completion to log
                                                try {
                                                    $data = array('gibbonFinanceExpenseID' => $gibbonFinanceExpenseID, 'gibbonPersonID' => $session->get('gibbonPersonID'));
                                                    $sql = "INSERT INTO gibbonFinanceExpenseLog SET gibbonFinanceExpenseID=:gibbonFinanceExpenseID, gibbonPersonID=:gibbonPersonID, timestamp='".date('Y-m-d H:i:s')."', action='Approval - Final'";
                                                    $result = $connection2->prepare($sql);
                                                    $result->execute($data);
                                                } catch (PDOException $e) {
                                                    $URL .= '&return=error2';
                                                    header("Location: {$URL}");
                                                    exit();
                                                }

                                                //Write back to gibbonFinanceExpense
                                                try {
                                                    $data = array('gibbonFinanceExpenseID' => $gibbonFinanceExpenseID);
                                                    $sql = "UPDATE gibbonFinanceExpense SET status='Approved' WHERE gibbonFinanceExpenseID=:gibbonFinanceExpenseID";
                                                    $result = $connection2->prepare($sql);
                                                    $result->execute($data);
                                                } catch (PDOException $e) {
                                                    $URL .= '&return=error2';
                                                    header("Location: {$URL}");
                                                    exit();
                                                }

                                                $notificationExtra = '';
                                                //Notify purchasing officer, if a school purchase, and officer set
                                                $purchasingOfficer = $settingGateway->getSettingByScope('Finance', 'purchasingOfficer');
                                                if ($purchasingOfficer != false and $purchasingOfficer != '' and $row['purchaseBy'] == 'School') {
                                                    $notificationText = sprintf(__('A newly approved expense (%1$s) needs to be purchased from budget "%2$s".'), $row['title'], $row['budget']);
                                                    $notificationSender->addNotification($purchasingOfficer, $notificationText, 'Finance', "/index.php?q=/modules/Finance/expenses_manage_view.php&gibbonFinanceExpenseID=$gibbonFinanceExpenseID&gibbonFinanceBudgetCycleID=$gibbonFinanceBudgetCycleID&status2=&gibbonFinanceBudgetID2=".$row['gibbonFinanceBudgetID']);
                                                    $notificationSender->sendNotifications();

                                                    $notificationExtra = '. '.__('The Purchasing Officer has been alerted, and will purchase the item on your behalf.');
                                                }

                                                //Notify original creator that it is approved
                                                $notificationText = sprintf(__('Your expense request for "%1$s" in budget "%2$s" has been fully approved.').$notificationExtra, $row['title'], $row['budget']);
                                                $notificationSender->addNotification($row['gibbonPersonIDCreator'], $notificationText, 'Finance', "/index.php?q=/modules/Finance/expenses_manage_view.php&gibbonFinanceExpenseID=$gibbonFinanceExpenseID&gibbonFinanceBudgetCycleID=$gibbonFinanceBudgetCycleID&status2=&gibbonFinanceBudgetID2=".$row['gibbonFinanceBudgetID']);
                                                $notificationSender->sendNotifications();

                                                $URLApprove .= '&return=success0';
                                                header("Location: {$URLApprove}");
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
