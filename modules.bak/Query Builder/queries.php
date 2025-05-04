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
use Gibbon\Tables\DataTable;
use Gibbon\Domain\System\SettingGateway;
use Gibbon\Module\QueryBuilder\Domain\QueryGateway;

$page->breadcrumbs->add(__('Manage Queries'));

if (isModuleAccessible($guid, $connection2) == false) {
    // Access denied
    $page->addError(__('You do not have access to this action.'));
} else {
    $highestAction = getHighestGroupedAction($guid, $_GET['q'], $connection2);

    if ($highestAction == 'Manage Queries_viewEditAll') {
    	$settingGateway = $container->get(SettingGateway::class);
        $gibboneduComOrganisationName = $settingGateway->getSettingByScope('System', 'gibboneduComOrganisationName');
        $gibboneduComOrganisationKey = $settingGateway->getSettingByScope('System', 'gibboneduComOrganisationKey');

        echo '<script type="text/javascript">';
            echo '$(document).ready(function(){';
                ?>
                $.ajax({
                    crossDomain: true,
                    type:"GET",
                    contentType: "application/json; charset=utf-8",
                    async:false,
                    url: "https://gibbonedu.org/gibboneducom/keyCheck.php?callback=?",
                    data: "gibboneduComOrganisationName=<?php echo urlencode($gibboneduComOrganisationName) ?>&gibboneduComOrganisationKey=<?php echo $gibboneduComOrganisationKey ?>&service=queryBuilder",
                    dataType: "jsonp",
                    jsonpCallback: 'fnsuccesscallback',
                    jsonpResult: 'jsonpResult',
                    success: function(data) {
                        if (data['access']==='1') {
                            $("#status").attr("class","success");
                            $("#status").html('Success! Your system has a valid license to access value added Query Builder queries from gibbonedu.com. <a href=\'<?php echo $session->get('absoluteURL') ?>/index.php?q=/modules/Query Builder/queries_sync.php\'>Click here</a> to get the latest queries for your version of Gibbon.') ;
                        }
                        else if (data['access']==='0') {
                            $("#status").attr("class","warning");
                            $("#status").html('Checking gibbonedu.com for a license to access value added Query Builder shows that you do not have access. You have either not set up access, or your access has expired or is invalid. Visit <a target=\'_blank\' href=\'http://gibbonedu.com\'>http://gibbonedu.com</a> to register for value added services, and then enter the name and key provided, or email <a href=\'mailto:support@gibbonedu.com\'>support@gibbonedu.com</a> to seek support as to why your key is not working. You may still use your own queries without a valid license.') ;
                            $.ajax({
                                url: "<?php echo $session->get('absoluteURL') ?>/modules/Query Builder/queries_gibboneducom_remove_ajax.php",
                                data: "gibboneduComOrganisationName=<?php echo urlencode($gibboneduComOrganisationName) ?>&gibboneduComOrganisationKey=<?php echo $gibboneduComOrganisationKey ?>&service=queryBuilder"
                            });
                        }
                        else {
                            $("#status").attr("class","error");
                            $("#status").html('An error has occured whilst checking gibbonedu.com for a license.') ;
                        }
                    },
                    error: function (data, textStatus, errorThrown) { }
                });
                <?php
            echo '});';
        echo '</script>';

        echo "<div id='output'>";
        echo "<div id='status' class='warning'>";
        echo "<div style='width: 100%; text-align: center'>";
        echo "<img style='margin: 10px 0 5px 0' src='".$session->get('absoluteURL')."/themes/Default/img/loading.gif' alt='Loading'/><br/>";
        echo __m('Checking gibbonedu.com value added license status.');
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }

    $search = $_GET['search'] ?? '';

    // CRITERIA
    $queryGateway = $container->get(QueryGateway::class);
    $criteria = $queryGateway->newQueryCriteria(true)
        ->searchBy($queryGateway->getSearchableColumns(), $search)
        ->sortBy(['favouriteOrder', 'category', 'gibbonPersonID', 'name'])
        ->pageSize(100)
        ->fromArray($_POST);

    $form = Form::create('search', $session->get('absoluteURL').'/index.php', 'get');
    $form->setTitle(__('Search'));
    $form->setClass('noIntBorder w-full');

    $form->addHiddenValue('q', '/modules/'.$session->get('module').'/queries.php');

    $row = $form->addRow();
        $row->addLabel('search', __('Search For'))->description(__m('Query name and category.'));
        $row->addTextField('search')->setValue($criteria->getSearchText());

    $row = $form->addRow();
        $row->addSearchSubmit($session, __('Clear Search'));

    echo $form->getOutput();

    // QUERY
    $queries = $queryGateway->queryQueries($criteria, $session->get('gibbonPersonID'), 'Query');

    $table = DataTable::createPaginated('queriesManage', $criteria);
    $table->setTitle(__m('Queries'));

    if ($highestAction == 'Manage Queries_viewEditAll') {
        $table->addHeaderAction('add', __('Add'))
            ->setURL('/modules/Query Builder/queries_add.php')
            ->addParam('search', $criteria->getSearchText(true))
            ->addParam('sidebar', 'false')
            ->displayLabel();
    }

    $table->modifyRows(function ($query, $row) {
        if ($query['active'] != 'Y') $row->addClass('error');
        return $row;
    });

    // COLUMNS
    $table->addColumn('type', __('Type'))
        ->format(function ($query) {
            return !is_null($query['queryID'])? 'gibbonedu.com' : $query['type'];
        });
    $table->addColumn('category', __('Category'));
    $table->addColumn('name', __('Name'))
        ->format(function ($query) use ($session) {
            return $query['name'] . ($query['favouriteOrder'] == 0 ? '<img class="w-4 h-4 ml-2 opacity-50" src="'.$session->get('absoluteURL').'/themes/'.$session->get('gibbonThemeName').'/img/gift.png" title="'.__('Favourite').'">' : '');
        });
    $table->addColumn('active', __('Active'))
          ->format(Format::using('yesNo', 'active'));

    // ACTIONS
    $table->addActionColumn()
        ->addParam('queryBuilderQueryID')
        ->addParam('search', $criteria->getSearchText(true))
        ->format(function ($query, $actions) use ($highestAction, $session) {

            if ($query['active'] == 'Y') {
                $actions->addAction('run', __m('Run Query'))
                    ->setURL('/modules/Query Builder/queries_run.php')
                    ->addParam('sidebar', 'false')
                    ->setIcon('run');
            }
            
            if ($highestAction == 'Manage Queries_viewEditAll') {
                if (($query['type'] == 'Personal' && $query['gibbonPersonID'] == $session->get('gibbonPersonID')) || $query['type'] == 'School' || $query['type'] == 'gibbonedu.com') {
                    $actions->addAction('edit', __('Edit'))
                        ->setURL('/modules/Query Builder/queries_edit.php')
                        ->addParam('sidebar', 'false');
                }
                
                if ($query['active'] == 'Y') {
                    $actions->addAction('duplicate', __('Duplicate'))
                        ->setURL('/modules/Query Builder/queries_duplicate.php')
                        ->setIcon('copy');
                }

                if (($query['type'] == 'Personal' && $query['gibbonPersonID'] == $session->get('gibbonPersonID')) || $query['type'] == 'School') {
                    $actions->addAction('delete', __('Delete'))
                        ->setURL('/modules/Query Builder/queries_delete.php');
                }
            }

            
        });

    echo $table->render($queries);
}
