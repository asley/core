<?php

use Gibbon\Services\Format;
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

include './config.php';

if (isActionAccessible($guid, $connection2, '/modules/Query Builder/queries_help_full.php') == false) {
    // Access denied
    $page->addError(__('You do not have access to this action.'));
} else {
    // Proceed!
    echo '<h1>';
    echo __m('Help');
    echo '</h1>';
    echo '<p>';
    echo __m("This help page gives a listing of all database tables contained within your Gibbon database ($databaseName). For each table there is a listing of all of the columns available. Where the same column name is found two tables, it generally infers a relationship, which can be queried with an SQL JOIN statement.");
    echo '</p>';

    //Get class variable
    $result = $pdo->select('SHOW TABLES');
    if ($result->rowCount() < 1) { 
        $page->addError(__m('There are no tables to show.'));
    } else {
        ?>
        <script type="text/javascript">
            $( document ).ready(function() {
                $('#my-textbox').keyup(function() {
                    var value = $(this).val();
                    var exp = new RegExp(value, 'i');

                    $('.table').each(function() {
                        var isMatch = exp.test($('.tableName', this).text());
                        $(this).toggle(isMatch);
                    });
                });
            });
        </script>

        <?php

        echo "<input type=\"text\" class=\"w-full\" id=\"my-textbox\" placeholder=\"".__m("Filter by table name")."\"/>";

        while ($row = $result->fetch()) {
            echo "<div class='table' id='".$row['Tables_in_'.$databaseName]."'>";
                echo '<h2 class="tableName" style="text-transform: none;">';
                echo $row['Tables_in_'.$databaseName];
                echo '</h2>';

                $resultTable = $pdo->select('SHOW COLUMNS FROM '.$row['Tables_in_'.$databaseName]);

                if ($resultTable->rowCount() < 1) {
                    echo Format::alert(__m('There are no columns to show.'), 'error');
                } else {
                    echo '<ol>';
                    while ($rowTable = $resultTable->fetch()) {
                        echo '<li><b>'.$rowTable['Field'].'</b> - '.$rowTable['Type'].'</li>';
                    }
                    echo '</ol>';
                }
            echo "</div>";
        }
    }
}
