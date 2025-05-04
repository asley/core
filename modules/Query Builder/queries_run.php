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

use Gibbon\Http\Url;
use Gibbon\Forms\Form;
use Gibbon\Domain\DataSet;
use Gibbon\Services\Format;
use Gibbon\Tables\DataTable;
use Gibbon\Domain\User\RoleGateway;
use Gibbon\Forms\DatabaseFormFactory;
use Gibbon\Domain\System\SettingGateway;
use Gibbon\Module\QueryBuilder\Domain\QueryGateway;
use Gibbon\Module\QueryBuilder\Domain\FavouriteGateway;

// Increase memory limit
ini_set('memory_limit', '512M');
ini_set('max_execution_time', 0);

if (isActionAccessible($guid, $connection2, '/modules/Query Builder/queries_run.php') == false) {
    // Access denied
    $page->addError(__('You do not have access to this action.'));
} else {
    // Proceed!
    $page->breadcrumbs
        ->add(__m('Manage Queries'), 'queries.php')
        ->add(__m('Run Query'));

    $settingGateway = $container->get(SettingGateway::class);
    $queryGateway = $container->get(QueryGateway::class);
    $favouriteGateway = $container->get(FavouriteGateway::class);
    $highestAction = getHighestGroupedAction($guid, $_GET['q'], $connection2);

    $queryBuilderQueryID =$_GET['queryBuilderQueryID'] ?? '';
    $search = $_GET['search'] ?? '';
    $save = $_POST['save'] ?? '';
    $query = $_POST['query'] ?? '';

    if (isset($_GET['return'])) {
        $illegals = isset($_GET['illegals'])? urldecode($_GET['illegals']) : '';
        $page->return->addReturns([
            'error3' => __m('Your query contains the following illegal term(s), and so cannot be run:').' <b>'.substr($illegals, 0, -2).'</b>.'
        ]);
    }

    // Validate the required values are present
    if (empty($queryBuilderQueryID)) {
        $page->addError(__('You have not specified one or more required parameters.'));
        return;
    }

    // Validate the database record exists
    $values = $queryGateway->getQueryByPerson($queryBuilderQueryID, $session->get('gibbonPersonID'));
    if (empty($values)) {
        $page->addError(__('The specified record cannot be found.'));
        return;
    }

    // Prevent access to the wrong context
    if ($values['context'] == 'Command') {
        $page->addError(__('You do not have access to this action.'));
        return;
    }

    // Check for specific access to this query
    if (!empty($values['actionName']) || !empty($values['moduleName'])) {
        if (empty($queryGateway->getIsQueryAccessible($queryBuilderQueryID, $session->get('gibbonPersonID')))) {
            $page->addError(__('You do not have access to this action.'));
            return;
        }
    }

    // Check for inactive
    if ($values['active'] != 'Y') {
        $page->addError(__('The specified record cannot be found.'));
        return;
    }

    if ($search != '') {
        $params = [
            "search" => $search
        ];
        $page->navigator->addSearchResultsAction(Url::fromModuleRoute('Query Builder', 'queries.php')->withQueryParams($params));
    }

    $table = DataTable::createDetails('query');

    $favourite = $favouriteGateway->selectBy(['queryBuilderQueryID' => $queryBuilderQueryID, 'gibbonPersonID' => $session->get('gibbonPersonID')])->fetch();

    $table->addHeaderAction('favourite', empty($favourite) ? __m('Favourite') : __m('Unfavourite'))
        ->setURL('/modules/Query Builder/queries_favouriteProcess.php')
        ->setIcon(empty($favourite) ? 'bookmark' : 'unbookmark')
        ->addParam('search', $search)
        ->addParam('queryBuilderQueryID', $queryBuilderQueryID)
        ->displayLabel();

    if ($highestAction == 'Manage Queries_viewEditAll') {
        $table->addHeaderAction('help', __m('Help'))
            ->setURL('/modules/Query Builder/queries_help_full.php')
            ->setIcon('help')
            ->displayLabel()
            ->modalWindow();

        if ($values['type'] != 'gibbonedu.com') {
            $table->addHeaderAction('edit', __m('Edit Query'))
                ->setURL('/modules/Query Builder/queries_edit.php')
                ->addParam('search', $search)
                ->addParam('queryBuilderQueryID', $queryBuilderQueryID)
                ->addParam('sidebar', 'false')
                ->setIcon('config')
                ->displayLabel();
        }
    }

    $table->addColumn('name', __('Name'));
    $table->addColumn('category', __('Category'));
    $table->addColumn('active', __('Active'))
        ->format(function($query) {
            return Format::yesNo($query['active']);
        });
    $table->addColumn('description', __('Description'))->addClass('col-span-3');

    if (!empty($values['actionName'])) {
        $table->addColumn('permission', __('Access'))
            ->addClass('col-span-3')
            ->format(function($query) use ($container) {
                $output = !empty($query['actionName'])
                    ? __m('Users require the {actionName} permission in the {moduleName} module to run or edit this query.', ['moduleName' => '<u>'.$query['moduleName'].'</u>', 'actionName' => '<u>'.$query['actionName'].'</u>'])
                    : '';

                $roleGateway = $container->get(RoleGateway::class);
                $users = $roleGateway->selectUsersByAction($query['actionName']);

                $output .= "<details class='mt-2'>" ;
                    $output .= "<summary>".__m('See Users With Access')."</summary>" ;
                    $output .= "<div>";
                        $output .= "<ul>";
                            while ($user = $users->fetch()) {
                                $output .= "<li>";
                                    $output .= Format::name('', $user['preferredName'], $user['surname'], 'Student', true, true);
                                $output .= "</li>";
                            }
                        $output .= "</ul>";
                    $output .= "</div>" ;
                $output .= "</details>" ;

                return $output;
            });
        }

    echo $table->render([$values]);

    // FORM
    $form = Form::create('queryBuilder', $session->get('absoluteURL').'/index.php?q=/modules/'.$session->get('module').'/queries_run.php&queryBuilderQueryID='.$queryBuilderQueryID.'&sidebar=false&search='.$search);
    $form->setFactory(DatabaseFormFactory::create($pdo));

    $form->addHiddenValue('address', $session->get('address'));

    if ($highestAction == 'Manage Queries_viewEditAll') {
        $queryText = !empty($query)? $query : $values['query'];

        $col = $form->addRow()->addColumn();
            $col->addLabel('query', __m('Query'));
            $col->addCodeEditor('query')
                ->setMode('mysql')
                ->autocomplete($queryGateway->getAutocompletions())
                ->required()
                ->setValue($queryText);
    } else {
        $form->addHiddenValue('query', $values['query']);
    }

    // Add custom bind values to the form
    $bindValues = json_decode($values['bindValues'] ?? '', true);
    if (!empty($bindValues) && is_array($bindValues)) {
        foreach ($bindValues as $bindValue) {
            $bindValue['required'] = 'Y';
            $fieldValue = $_POST[$bindValue['variable']] ?? null;

            if ($bindValue['type'] == 'date' && !empty($fieldValue)) {
                $fieldValue = Format::dateConvert($fieldValue);
            }

            $row = $form->addRow();
            $row->addLabel($bindValue['variable'], $bindValue['name'])->description($bindValue['variable']);

            if ($bindValue['type'] == 'schoolYear') {
                $row->addSelectSchoolYear($bindValue['variable'])->selected($fieldValue ?? $session->get('gibbonSchoolYearID'))->required();
            } elseif ($bindValue['type'] == 'schoolYear') {
                $row->addSelectSchoolYearTerm($bindValue['variable'], $session->get('gibbonSchoolYearID'))->selected($fieldValue)->required();
            } elseif ($bindValue['type'] == 'reportingCycle') {
                $row->addSelectReportingCycle($bindValue['variable'])->selected($fieldValue)->required();
            } elseif ($bindValue['type'] == 'yearGroups') {
                $row->addCheckboxYearGroup($bindValue['variable'])->checked($fieldValue)->required()->addCheckAllNone();
            } else {
                $row->addCustomField($bindValue['variable'], $bindValue)->setValue($fieldValue);
            }
        }
    }

    $row = $form->addRow();
        $col = $row->addColumn()->addClass('inline right');
        if ($highestAction == 'Manage Queries_viewEditAll' && (($values['type'] == 'Personal' and $values['gibbonPersonID'] == $session->get('gibbonPersonID')) or $values['type'] == 'School')) {
            $col->addCheckbox('save')->description(__m('Save Query?'))->setValue('Y')->checked($save)->wrap('<span class="inline-block">', '</span>&nbsp;&nbsp;');
        } else {
            $col->addContent('');
        }
        $col->addSubmit(__('Run Query'));

    echo $form->getOutput();

    //PROCESS QUERY
    if (!empty($query)) {
        echo '<h3>';
        echo __m('Query Results');
        echo '</h3>';

        //Strip multiple whitespaces from string
        $query = preg_replace('/\s+/', ' ', $query);

        //Security check
        $illegal = false;
        $illegalList = '';
        foreach ($queryGateway->getIllegals() as $ill) {
            if (preg_match('/\b('.$ill.')\b/i', $query)) {
                $illegal = true;
                $illegalList .= $ill.', ';
            }
        }
        if ($illegal) {
            echo "<div class='error'>";
            echo __m('Your query contains the following illegal term(s), and so cannot be run:').' <b>'.substr($illegalList, 0, -2).'</b>.';
            echo '</div>';
        } else {
            //Save the query
            if ($highestAction == 'Manage Queries_viewEditAll' && $save == 'Y') {
                $rawQuery = $_POST['query'] ?? '';
                $data = array('queryBuilderQueryID' => $queryBuilderQueryID, 'query' => $rawQuery);
                $sql = "UPDATE queryBuilderQuery SET query=:query WHERE queryBuilderQueryID=:queryBuilderQueryID";
                $pdo->update($sql, $data);
            }

            // Get bind values, if they exist
            $data = [];
            $bindValues = json_decode($values['bindValues'] ?? '', true);
            if (!empty($bindValues) && is_array($bindValues)) {
                foreach ($bindValues as $bindValue) {
                    $fieldValue = $_POST[$bindValue['variable']] ?? '';
                    if ($bindValue['type'] == 'date' && !empty($fieldValue)) {
                        $fieldValue = Format::dateConvert($fieldValue);
                    } elseif (is_array($fieldValue)) {
                        $fieldValue = implode(',', $fieldValue);
                    }
                    $data[$bindValue['variable']] = $fieldValue;
                }
            }

            // Run the query
            $result = $pdo->select($query, $data);

            if (!$pdo->getQuerySuccess()) {
                echo Format::alert(__m('Your request failed with the following error: ').$pdo->getErrorMessage(), 'error');
                return;
            }

            // Check rowLimit setting
            $rowLimit = $container->get(SettingGateway::class)->getSettingByScope('Query Builder', 'rowLimit');
            $limited = ($rowLimit > 0 && $result->rowCount() > $rowLimit) ? true : false ;
            $rows = ($limited) ? $rowLimit : $result->rowCount();

            if ($rows < 1) {
                echo Format::alert(__m('Your query has returned 0 rows.'), 'warning');
                return;
            } else {
                if ($limited) {
                    echo Format::alert(sprintf(__m('The output of your query was limited to %1$s rows to reduce memory usage. All rows will be included in the export.'), $rowLimit), 'warning');
                } else {
                    echo Format::alert(sprintf(__m('Your query has returned %1$s rows, which are displayed below.'), $result->rowCount()), 'success');
                }

                $invalidColumns = ['password', 'passwordStrong', 'passwordStrongSalt', 'gibbonStaffContract', 'gibbonStaffApplicationForm', 'gibbonStaffApplicationFormFile'];

                $table = DataTable::create('queryResults');
                $table->getRenderer();

                //Set up export header action
                $hash = md5($query);
                $session->set($hash, [
                    'query' => $query,
                    'queryData' => $data,
                ]);
                $table->addHeaderAction('export', __('Export'))
                    ->setIcon('download')
                    ->setURL('/modules/Query Builder/queries_run_export.php')
                    ->addParam('queryBuilderQueryID', $queryBuilderQueryID)
                    ->addParam('hash', $hash)
                    ->directLink()
                    ->displayLabel();

                $count = 1;
                $table->addColumn('rowCount-NNK0u7G5', '')->width('35px')->format(function($row) use (&$count) {
                    return '<span class="subdued">'.$count++.'</span>';
                });

                for ($i = 0; $i < $result->columnCount(); ++$i) {
                    $col = $result->getColumnMeta($i);
                    $colName = $col['name'];
                    if (!in_array($colName, $invalidColumns)) {
                        $table->addColumn($colName, $colName)->format(function($row) use ($colName) {
                            if (stripos($colName, 'plain text') !== false) {
                                return substr(strip_tags($row[$colName]), 0, 150).'...';
                            } elseif (strlen($row[$colName]) > 50 && $colName !='image' && $colName!='image_240') {
                                return substr($row[$colName], 0, 50).'...';
                            } else {
                                return $row[$colName];
                            }
                        });
                    }
                }

                //Selectively apply $rowLimit to result set
                if ($limited) {
                    $result = new DataSet(array_slice($result->toDataSet()->toArray(), 0, $rows));
                } else {
                    $result = $result->toDataSet();
                }

                echo "<div style='overflow-x:auto;'>";
                echo $table->render($result);
                echo '</div>';
            }

            echo Format::alert(sprintf(__m('This query used %1$sMB of memory.'), (round(memory_get_peak_usage()/(1024*1024),2))), 'message');
        }
    }

}
