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

namespace Gibbon\Module\QueryBuilder\Forms;

use Gibbon\Forms\Layout\Column;

/**
 * Bind Values
 *
 * @version v1.7.02
 * @since   v1.7.02
 */
class BindValues extends Column
{
    protected $factory;
    protected $values;
    protected $session;

    public function __construct($factory, $name, $values, $session)
    {
        $this->factory = $factory;
        $this->values = $values;
        $this->session = $session;

        parent::__construct($factory, $name);
    }

    /**
     * Gets the HTML output for this form element.
     * @return  string
     */
    public function getOutput()
    {
        // BIND VALUES
        $bindValues = json_decode($this->values['bindValues'] ?? '', true);
        $types = [
            __('Basic') => [
                'varchar'        => __('Text'),
                'number'         => __('Number'),
                'yesno'          => __('Yes/No'),
                'date'           => __('Date'),
            ],
            __('System') => [
                'reportingCycle' => __('Reporting Cycle'),
                'schoolYear'     => __('School Year'),
                'term'           => __('Term'),
                'yearGroups'     => __('Year Groups'),
            ],
        ];

        $missingValues = array_filter($bindValues ?? [], function ($bindValue) {
            return strpos($this->values['query'], ':'.$bindValue['variable']) === false;
        });

        // Custom Block Template
        $addBlockButton = $this->factory->createButton(__m('Add Variable'))->addClass('addBlock');

        $blockTemplate = $this->factory->createTable()->setClass('blank');
        $row = $blockTemplate->addRow();
            $row->addTextField('name')
                ->setClass('w-full m-0 title')
                ->required()
                ->placeholder(__m('Label Name'));

        $col = $blockTemplate->addRow()->addColumn()->addClass('flex mt-1');
            $col->addTextField('variable')
                ->setClass('w-64')
                ->required()
                ->placeholder(__m('Variable Name'))
                ->addValidation('Validate.Format', 'pattern: /^[A-Za-z0-9]+$/, failureMessage: "'.__m('Must be alphanumeric.').'"');
            $col->addSelect('type')->fromArray($types)->setClass('w-full float-none ml-1')->required()->placeholder();

        // Custom Blocks
        $this->addLabel('bindValues', __m('Variables'));
        $this->addContent(__m('You can optionally define named variables that a user can enter when running this query. Each variable name must be alphanumeric with no spaces or special symbols, and must be present in the query as :variableName'))->wrap('<span class="small emphasis">', '</span>');

        if (!empty($missingValues)) {
            $this->addAlert(__m('SQL Error! The following variable names were not found in your query: {variables}', ['variables' => implode(', ', array_column($missingValues, 'variable'))]), 'error');
        }

        $customBlocks = $this->addCustomBlocks('bindValues', $this->session)
            ->fromTemplate($blockTemplate)
            ->settings(array('inputNameStrategy' => 'object', 'addOnEvent' => 'click', 'sortable' => true))
            ->placeholder(__m('Variables will be listed here...'))
            ->addToolInput($addBlockButton);

        // Add existing bindValues
        foreach ($bindValues ?? [] as $index => $bindValue) {
            $customBlocks->addBlock($index, $bindValue);
        }

        return parent::getOutput();
    }
}
