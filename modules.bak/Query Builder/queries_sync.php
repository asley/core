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

use Gibbon\Domain\System\SettingGateway;

if (isActionAccessible($guid, $connection2, '/modules/Query Builder/queries_sync.php') == false) {
    // Access denied
    $page->addError(__('You do not have access to this action.'));
} else {
    // Proceed!
    $page->breadcrumbs
        ->add(__m('Manage Queries'), 'queries.php')
        ->add(__m('Sync Queries'));

    echo '<p>';
    echo __m('This page will automatically attempt to sync queries from the gibbonedu.com Query Builder valued added service. The results of the sync will be given below.');
    echo '<p>';

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
				url: "https://gibbonedu.org/gibboneducom/queryBuilder.php?callback=?",
				data: "gibboneduComOrganisationName=<?php echo urlencode($gibboneduComOrganisationName) ?>&gibboneduComOrganisationKey=<?php echo $gibboneduComOrganisationKey ?>&service=queryBuilder&version=<?php echo $version ?>",
				dataType: "jsonp",
				jsonpCallback: 'fnsuccesscallback',
				jsonpResult: 'jsonpResult',
				success: function(data) {
					if (data['access']==='0') {
						$("#status").attr("class","error");
						$("#status").html('Checking gibbonedu.com for a license to access value added Query Builder shows that you do not have access. You have either not set up access, or your access has expired or is invalid. Visit <a target=\'_blank\' href=\'http://gibbonedu.com\'>http://gibbonedu.com</a> to register for value added services, and then enter the name and key provided, or email <a href=\'mailto:support@gibbonedu.com\'>support@gibbonedu.com</a> to seek support as to why your key is not working. You may still use your own queries without a valid license.') ;
					}
					else {
						$("#status").attr("class","success");
						$("#status").html('Success! Your system has a valid license to access value added Query Builder queries from gibbonedu.com. We are now syncing your queries. Watch here for results.') ;
						$.ajax({
							type: "POST",
            				url: "<?php echo $session->get('absoluteURL') ?>/modules/Query Builder/queries_gibboneducom_sync_ajax.php",
							data: { gibboneduComOrganisationName: "<?php echo urlencode($gibboneduComOrganisationName) ?>", gibboneduComOrganisationKey: "<?php echo $gibboneduComOrganisationKey ?>", service: "queryBuilder", queries: JSON.stringify(data) },
							success: function(data) {
								if (data==="fail") {
									$("#status").attr("class","error");
									$("#status").html('We could not sync your queries. Try again later.') ;
								}
								else {
									$("#status").attr("class","success");
									$("#status").html('Your queries have been successfully synced. Please <a href=\'<?php echo $session->get('absoluteURL') ?>/index.php?q=/modules/Query Builder/queries.php\'>click here</a> to return to your query list.') ;
								}
							},
							error: function (data, textStatus, errorThrown) {
								$("#status").attr("class","error");
								$("#status").html('We could not sync your queries. Try again later.') ;
							}
						});
					}
				},
				error: function (data, textStatus, errorThrown) {
					$("#status").attr("class","error");
					$("#status").html('Checking gibbonedu.com license for access to value added Query Builder queries has failed. You may still use your own queries.') ;
					$.ajax({
						url: "<?php echo $session->get('absoluteURL') ?>/modules/Query Builder/queries_gibboneducom_remove_ajax.php",
						data: "gibboneduComOrganisationName=<?php echo urlencode($gibboneduComOrganisationName) ?>&gibboneduComOrganisationKey=<?php echo $gibboneduComOrganisationKey ?>&service=queryBuilder"
					});
				}
			});
			<?php
        echo '});';
    echo '</script>';

    echo "<div id='status' class='warning'>";
    echo "<div style='width: 100%; text-align: center'>";
    echo "<img style='margin: 10px 0 5px 0' src='".$session->get('absoluteURL')."/themes/Default/img/loading.gif' alt='Loading'/><br/>";
    echo __m('Checking gibbonedu.com value added license status.');
    echo '</div>';
    echo '</div>';
}
