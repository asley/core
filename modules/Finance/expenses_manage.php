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

use Gibbon\Forms\Form;
use Gibbon\Services\Format;
use Gibbon\Forms\Prefab\BulkActionForm;
use Gibbon\Domain\System\SettingGateway;
use Gibbon\Domain\Finance\FinanceBudgetCycleGateway;
use Gibbon\Domain\Finance\FinanceExpenseApproverGateway;

//Module includes
require_once __DIR__ . '/moduleFunctions.php';

if (isActionAccessible($guid, $connection2, '/modules/Finance/expenses_manage.php') == false) {
    // Access denied
    $page->addError(__('You do not have access to this action.'));
} else {
    //Get action with highest precendence
    $highestAction = getHighestGroupedAction($guid, $_GET['q'], $connection2);
    if ($highestAction == false) {
        $page->addError(__('The highest grouped action cannot be determined.'));
    } else {
        //Proceed!
        $page->breadcrumbs->add(__('Manage Expenses'));

        $page->return->addReturns(['success0' => __('Your request was completed successfully.'), 'success1' => __('Your request was completed successfully, but notifications could not be sent out.')]);


        echo '<p>';
        if ($highestAction == 'Manage Expenses_all') {
            echo __('This action allows you to manage all expenses for all budgets, regardless of your access rights to individual budgets.').'<br/>';
        } else {
            echo __('This action allows you to manage expenses for the budgets in which you have relevant access rights.').'<br/>';
        }
        echo '</p>';

        //Check if have Full, Write or Read access in any budgets
        $budgetsAccess = false;
        $budgetsActionAccess = false;
        $budgets = getBudgetsByPerson($connection2, $session->get('gibbonPersonID'));
        $budgetsAll = null;
        if ($highestAction == 'Manage Expenses_all') {
            $budgetsAll = getBudgets($connection2);
            $budgetsAccess = true;
            $budgetsActionAccess = true;
        } else {
            if (is_array($budgets) && count($budgets)>0) {
                foreach ($budgets as $budget) {
                    if ($budget[2] == 'Full' or $budget[2] == 'Write') {
                        $budgetsActionAccess = true;
                        $budgetsAccess = true;
                    }
                    if ($budget[2] == 'Read') {
                        $budgetsAccess = true;
                    }
                }
            }
        }

        if ($budgetsAccess == false) {
            $page->addError(__('You do not have Full or Write access to any budgets.'));
        } else {
            //Get and check settings
            $settingGateway = $container->get(SettingGateway::class);
            $expenseApprovalType = $settingGateway->getSettingByScope('Finance', 'expenseApprovalType');
            $budgetLevelExpenseApproval = $settingGateway->getSettingByScope('Finance', 'budgetLevelExpenseApproval');
            if ($expenseApprovalType == '' or $budgetLevelExpenseApproval == '') {
                $page->addError(__('An error has occurred with your expense and budget settings.'));
            } else {
                // Check if there are approvers
                $result = $container->get(FinanceExpenseApproverGateway::class)->selectExpenseApprovers();
                
                if ($result->rowCount() < 1) {
                    $page->addError(__('An error has occurred with your expense and budget settings.'));
                } else {
                    //Ready to go!
                    $gibbonFinanceBudgetCycleID = '';
                    if (isset($_GET['gibbonFinanceBudgetCycleID'])) {
                        $gibbonFinanceBudgetCycleID = $_GET['gibbonFinanceBudgetCycleID'] ?? '';
                    }
                    if ($gibbonFinanceBudgetCycleID == '') {
                        
                            $data = array();
                            $sql = "SELECT * FROM gibbonFinanceBudgetCycle WHERE status='Current'";
                            $result = $connection2->prepare($sql);
                            $result->execute($data);
                        if ($result->rowcount() != 1) {
                            echo "<div class='error'>";
                            echo __('The Current budget cycle cannot be determined.');
                            echo '</div>';
                        } else {
                            $row = $result->fetch();
                            $gibbonFinanceBudgetCycleID = $row['gibbonFinanceBudgetCycleID'];
                            $gibbonFinanceBudgetCycleName = $row['name'];
                        }
                    }
                    if ($gibbonFinanceBudgetCycleID != '') {
                            $result = $container->get(FinanceBudgetCycleGateway::class)->getByID($gibbonFinanceBudgetCycleID);

                        if (empty($result)) {
                            echo "<div class='error'>";
                            echo __('The specified budget cycle cannot be determined.');
                            echo '</div>';
                        } else {
                            $row = $result;
                            $gibbonFinanceBudgetCycleName = $row['name'];
                        }

                        echo '<h2>';
                        echo $gibbonFinanceBudgetCycleName;
                        echo '</h2>';

                        echo "<div class='linkTop'>";
                        //Print year picker
                        $previousCycle = getPreviousBudgetCycleID($gibbonFinanceBudgetCycleID, $connection2);
                        if ($previousCycle != false) {
                            echo "<a href='".$session->get('absoluteURL').'/index.php?q=/modules/'.$session->get('module').'/expenses_manage.php&gibbonFinanceBudgetCycleID='.$previousCycle."'>".__('Previous Cycle').'</a> ';
                        } else {
                            echo __('Previous Cycle').' ';
                        }
                        echo ' | ';
                        $nextCycle = getNextBudgetCycleID($gibbonFinanceBudgetCycleID, $connection2);
                        if ($nextCycle != false) {
                            echo "<a href='".$session->get('absoluteURL').'/index.php?q=/modules/'.$session->get('module').'/expenses_manage.php&gibbonFinanceBudgetCycleID='.$nextCycle."'>".__('Next Cycle').'</a> ';
                        } else {
                            echo __('Next Cycle').' ';
                        }
                        echo '</div>';

                        $status2 = null;
                        if (isset($_GET['status2'])) {
                            $status2 = $_GET['status2'] ?? '';
                        }
                        $gibbonFinanceBudgetID2 = null;
                        if (isset($_GET['gibbonFinanceBudgetID2'])) {
                            $gibbonFinanceBudgetID2 = $_GET['gibbonFinanceBudgetID2'] ?? '';
                        }

                        echo '<h3>';
                        echo __('Filters');
                        echo '</h3>';

                        $form = Form::create('searchForm', $session->get('absoluteURL').'/index.php', 'get');
                        $form->setClass('noIntBorder w-full');

                        $form->addHiddenValue('q', '/modules/Finance/expenses_manage.php');
                        $form->addHiddenValue('gibbonFinanceBudgetCycleID', $gibbonFinanceBudgetCycleID);

                        $statuses = array(
                            '' => __('All'),
                            'Requested' => __('Requested'),
                            'Requested - Approval Required' => __('Requested - Approval Required'),
                            'Approved' => __('Approved'),
                            'Rejected' => __('Rejected'),
                            'Cancelled' => __('Cancelled'),
                            'Ordered' => __('Ordered'),
                            'Paid' => __('Paid'),
                        );
                        $row = $form->addRow();
                            $row->addLabel('status2', __('Status'));
                            $row->addSelect('status2')
                                ->fromArray($statuses)
                                ->selected($status2);

                        $budgetsList = array_reduce($budgetsAll != null? $budgetsAll : $budgets, function($group, $item) {
                            $group[$item[0]] = $item[1];
                            return $group;
                        }, array());
                        $row = $form->addRow();
                            $row->addLabel('gibbonFinanceBudgetID2', __('Budget'));
                            $row->addSelect('gibbonFinanceBudgetID2')
                                ->fromArray(array('' => __('All')))
                                ->fromArray($budgetsList)
                                ->selected($gibbonFinanceBudgetID2);

                        $row = $form->addRow();
                            $row->addSearchSubmit($session, __('Clear Filters'), array('gibbonFinanceBudgetCycleID'));

                        echo $form->getOutput();

                        try {
                            //Set Up filter wheres
                            $data = array('gibbonFinanceBudgetCycleID' => $gibbonFinanceBudgetCycleID);
                            $whereBudget = '';
                            if ($gibbonFinanceBudgetID2 != '') {
                                $data['gibbonFinanceBudgetID'] = $gibbonFinanceBudgetID2;
                                $whereBudget .= ' AND gibbonFinanceBudget.gibbonFinanceBudgetID=:gibbonFinanceBudgetID';
                            }
                            $approvalRequiredFilter = false;
                            $whereStatus = '';
                            if ($status2 != '') {
                                if ($status2 == 'Requested - Approval Required') {
                                    $data['status'] = 'Requested';
                                    $approvalRequiredFilter = true;
                                } else {
                                    $data['status'] = $status2;
                                }
                                $whereStatus .= ' AND gibbonFinanceExpense.status=:status';
                            }
                            //GET THE DATA ACCORDING TO FILTERS
                            if ($highestAction == 'Manage Expenses_all') { //Access to everything
                                $sql = "SELECT gibbonFinanceExpense.*, gibbonFinanceBudget.name AS budget, surname, preferredName, 'Full' AS access
                                    FROM gibbonFinanceExpense
                                    JOIN gibbonFinanceBudget ON (gibbonFinanceExpense.gibbonFinanceBudgetID=gibbonFinanceBudget.gibbonFinanceBudgetID)
                                    JOIN gibbonPerson ON (gibbonFinanceExpense.gibbonPersonIDCreator=gibbonPerson.gibbonPersonID)
                                    WHERE gibbonFinanceBudgetCycleID=:gibbonFinanceBudgetCycleID $whereBudget $whereStatus
                                    ORDER BY FIND_IN_SET(gibbonFinanceExpense.status, 'Pending,Issued,Paid,Refunded,Cancelled'), timestampCreator DESC";
                            } else { //Access only to own budgets
                                $data['gibbonPersonID'] = $session->get('gibbonPersonID');
                                $sql = "SELECT gibbonFinanceExpense.*, gibbonFinanceBudget.name AS budget, surname, preferredName, access
                                    FROM gibbonFinanceExpense
                                    JOIN gibbonFinanceBudget ON (gibbonFinanceExpense.gibbonFinanceBudgetID=gibbonFinanceBudget.gibbonFinanceBudgetID)
                                    JOIN gibbonFinanceBudgetPerson ON (gibbonFinanceBudgetPerson.gibbonFinanceBudgetID=gibbonFinanceBudget.gibbonFinanceBudgetID)
                                    JOIN gibbonPerson ON (gibbonFinanceExpense.gibbonPersonIDCreator=gibbonPerson.gibbonPersonID)
                                    WHERE gibbonFinanceBudgetCycleID=:gibbonFinanceBudgetCycleID AND gibbonFinanceBudgetPerson.gibbonPersonID=:gibbonPersonID $whereBudget $whereStatus
                                    ORDER BY FIND_IN_SET(gibbonFinanceExpense.status, 'Pending,Issued,Paid,Refunded,Cancelled'), timestampCreator DESC";
                            }
                            $result = $connection2->prepare($sql);
                            $result->execute($data);
                        } catch (PDOException $e) {
                        }

                        echo '<h3>';
                        echo __('View');
                        echo '</h3>';

                        $allowExpenseAdd = $settingGateway->getSettingByScope('Finance', 'allowExpenseAdd');
                        if ($highestAction == 'Manage Expenses_all' and $allowExpenseAdd == 'Y') { //Access to everything
                            echo "<div class='linkTop' style='text-align: right'>";
                            echo "<a style='margin-right: 3px' href='".$session->get('absoluteURL').'/index.php?q=/modules/'.$session->get('module')."/expenses_manage_add.php&gibbonFinanceBudgetCycleID=$gibbonFinanceBudgetCycleID&status2=$status2&gibbonFinanceBudgetID2=$gibbonFinanceBudgetID2'>".__('Add')."<img style='margin-left: 5px' title='".__('Add')."' src='./themes/".$session->get('gibbonThemeName')."/img/page_new.png'/></a><br/>";
                            echo '</div>';
                        }

                        $linkParams = array(
                            'status2'                    => $status2,
                            'gibbonFinanceBudgetCycleID' => $gibbonFinanceBudgetCycleID,
                            'gibbonFinanceBudgetID2'     => $gibbonFinanceBudgetID2,
                        );

                        $form = BulkActionForm::create('bulkAction', $session->get('absoluteURL') . '/modules/' . $session->get('module') . '/expenses_manage_processBulk.php?'.http_build_query($linkParams));

                        $form->addHiddenValue('address', $session->get('address'));

                        if ($budgetsActionAccess) {
                            $bulkActions = array('export' => __('Export'));
                            $row = $form->addBulkActionRow($bulkActions)->addClass('flex justify-end');
                                $row->addSubmit(__('Go'));
                        }

                        $table = $form->addRow()->addTable()->setClass('colorOddEven w-full');

                        $header = $table->addHeaderRow();
                            $header->addContent(__('Title'))->append('<br/><small><i>'.__('Budget').'</i></small>');
                            $header->addContent(__('Staff'));
                            $header->addContent(__('Status'))->append('<br/><small><i>'.__('Reimbursement').'</i></small>');
                            $header->addContent(__('Cost'))->append('<br/><small><i>('.$session->get('currency').')</i></small>');
                            $header->addContent(__('Date'));

                            if ($budgetsActionAccess) {
                                $header->addContent(__('Actions'));
                                $header->addCheckAll();
                            }

                        if ($result->rowCount() == 0) {
                            $table->addRow()->addTableCell(__('There are no records to display.'))->colSpan(7);
                        }

                        while ($expense = $result->fetch()) {
                            $approvalRequired = approvalRequired($guid, $session->get('gibbonPersonID'), $expense['gibbonFinanceExpenseID'], $gibbonFinanceBudgetCycleID, $connection2, false);

                            if (!empty($approvalRequiredFilter) && $approvalRequired == false) {
                                continue;
                            }

                            $rowClass = ($expense['status'] == 'Approved')? 'current' : ( ($expense['status'] == 'Rejected' || $expense['status'] == 'Cancelled')? 'error' : '');

                            $row = $table->addRow()->addClass($rowClass);
                                $row->addContent($expense['title'])
                                    ->wrap('<b>', '</b>')
                                    ->append('<br/><span class="text-xs italic">'.$expense['budget'].'</span>');
                                $row->addContent(Format::name('', $expense['preferredName'], $expense['surname'], 'Staff', false, true));
                                $row->addContent(__($expense['status']))
                                    ->append('<br/><span class="text-xs italic">'.__($expense['paymentReimbursementStatus']).'</span>');
                                $row->addContent(number_format($expense['cost'], 2, '.', ','));
                                $row->addContent(Format::date(substr($expense['timestampCreator'], 0, 10)));

                            if ($budgetsActionAccess) {
                                $col = $row->addColumn()->addClass('flex items-center justify-end gap-4');
                                    $col->addAction('view', __('View'))
                                        ->setURL('/modules/'.$session->get('module').'/expenses_manage_view.php')
                                        ->addParam('gibbonFinanceExpenseID', $expense['gibbonFinanceExpenseID'])
                                        ->addParams($linkParams)
                                        ->displayLabel();
                                    $col->addAction('print', __('Print'))
                                        ->setURL('/modules/'.$session->get('module').'/expenses_manage_print.php')
                                        ->addParam('gibbonFinanceExpenseID', $expense['gibbonFinanceExpenseID'])
                                        ->addParams($linkParams);

                                if (isActionAccessible($guid, $connection2, '/modules/Finance/expenses_manage_add.php', 'Manage Expenses_all')) {
                                    if ($expense['status'] == 'Requested' or $expense['status'] == 'Approved' or $expense['status'] == 'Ordered' or ($expense['status'] == 'Paid' && $expense['paymentReimbursementStatus'] == 'Requested')) {
                                        $col->addAction('edit', __('Edit'))
                                            ->setURL('/modules/'.$session->get('module').'/expenses_manage_edit.php')
                                            ->addParam('gibbonFinanceExpenseID', $expense['gibbonFinanceExpenseID'])
                                            ->addParams($linkParams);
                                    }
                                }

                                if ($expense['status'] == 'Requested') {
                                    if ($approvalRequired == true) {
                                        $col->addWebLink('<img title="'.__('Approve/Reject').'" src="./themes/'.$session->get('gibbonThemeName').'/img/iconTick.png"  style="margin-left:4px;"/>')
                                            ->setURL($session->get('absoluteURL').'/index.php?q=/modules/'.$session->get('module').'/expenses_manage_approve.php')
                                            ->addParam('gibbonFinanceExpenseID', $expense['gibbonFinanceExpenseID'])
                                            ->addParams($linkParams);
                                    }
                                }

                                $row->addCheckbox('gibbonFinanceExpenseIDs[]')->setValue($expense['gibbonFinanceExpenseID'])->alignCenter();
                            }
                        }

                        echo $form->getOutput();
                    }
                }
            }
        }
    }
}
?>
