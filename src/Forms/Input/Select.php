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

namespace Gibbon\Forms\Input;

use Gibbon\Forms\Traits\MultipleOptionsTrait;
use Gibbon\Contracts\Database\Connection;
use Gibbon\View\Component;
use Gibbon\Forms\Traits\ButtonGroupTrait;

/**
 * Select
 *
 * @version v14
 * @since   v14
 */
class Select extends Input
{
    use ButtonGroupTrait;
    use MultipleOptionsTrait;

    protected $placeholder = null;
    protected $selected = null;
    protected $hasSelected = false;

    protected $chainedToID;
    protected $chainedToValues = [];

    /**
     * Sets the selected element(s) of the select input.
     * @param   mixed  $value
     * @param   bool  $replaceValue     Should an existing value be replace if the incoming one is blank?
     * @return  self
     */
    public function selected($value, $replaceValue = true)
    {
        if (!$replaceValue && !empty($this->selected) && empty($value)) return $this;

        $this->selected = $value;

        return $this;
    }

    /**
     * Adds an initial entry to the select input. Required elements default to 'Please select...'
     * @param   string  $value
     * @return  self
     */
    public function placeholder($value = '')
    {
        $this->placeholder = $value;

        return $this;
    }

    /**
     * Set the selected element(s) to include all available options.
     * @param   bool    $onlyIfEmpty
     * @return  self
     */
    public function selectAll($onlyIfEmpty = false)
    {
        if ($this->getAttribute('multiple') == true) {
            if (!$onlyIfEmpty || ($onlyIfEmpty && empty($this->selected))) {
                $this->selected = array_keys($this->options);
            }
        }

        return $this;
    }

    /**
     * Sets the select input attribute to handle multiple selections.
     * @param   bool    $value
     * @return  self
     */
    public function selectMultiple($value = true)
    {
        $this->setAttribute('multiple', $value);

        return $this;
    }

    /**
     * Add extra help text to multi-select inputs.
     * @return string
     */
    public function getLabelContext($label)
    {
        if ($this->getAttribute('multiple') == true) {
            return __('Use Control, Command and/or Shift to select multiple.');
        }
        return '';
    }

    /**
     * Provide an ID of another select input to chain the values in this input to the selected element of the first input.
     * Chained values are paired with the options array, and correlate to the available options in the first select input.
     * @param   string  $id
     * @param   array   $values
     * @return  self
     */
    public function chainedTo($id, $values)
    {
        $this->chainedToID = $id;
        $this->chainedToValues = array_merge($this->chainedToValues, $values);

        return $this;
    }

    /**
     * Build an internal options array from an SQL query with required value and name fields
     * @param   Connection  $pdo
     * @param   string                 $sql
     * @param   array                  $data
     * @return  self
     */
    public function fromQueryChained(Connection $pdo, $sql, $data = array(), $chainedToID = false, $groupBy = false)
    {
        $results = $pdo->select($sql, $data);
        $this->fromResults($results, $groupBy);

        $results = $pdo->select($sql, $data);

        if ($results && $results->rowCount() > 0) {
            $chainedOptions = array_reduce($results->fetchAll(), function($group, $item) {
                $group[$item['value']] = isset($item['chainedTo'])? $item['chainedTo'] : '';
                return $group;
            }, array());

            $this->chainedTo($chainedToID, $chainedOptions);
        }

        return $this;
    }

    /**
     * Return true if the value passed in is in the array of selected options.
     * @param   string  $value
     * @return  bool
     */
    protected function isOptionSelected($value)
    {
        if ($value === '') return false;

        if ($this->hasSelected) return false;

        if (is_array($this->selected)) {
            return in_array($value, $this->selected);
        } else {
            $selected = strval($value) == strval($this->selected);
            if ($selected && $this->getAttribute('multiple') == false) $this->hasSelected = true;
            return $selected;
        }
    }

    /**
     * Gets the HTML output for this form element.
     * @return  string
     */
    protected function getElement()
    {
        if ($this->getReadonly()) {
            $options = [];
            $selected = is_array($this->selected)? $this->selected : [$this->selected];

            array_walk_recursive($this->options, function ($item, $key) use (&$selected, &$options) {
                if (in_array($key, $selected)) {
                    $options[$key] = $item;
                }
            });
            $this->options = $options;
            $this->setRequired(false)->placeholder(null);
        }

        if (!empty($this->getAttribute('multiple'))) {
            if (empty($this->getAttribute('size'))) {
                $this->setAttribute('size', 8);
            }

            if (stripos($this->getName(), '[]') === false) {
                $this->setName($this->getName().'[]');
            }
        }

        if (!isset($this->placeholder) && $this->getOptionCount() == 0) {
            $this->placeholder('');
        }

        if ($this->getRequired() && $this->placeholder === '') {
            $this->placeholder('Please select...');
        }
        
        if (key($this->getOptions()) === '' && $this->placeholder === '') {
            $this->placeholder(null);
        }

        if ($this->getRequired() && !empty($this->placeholder) && $this->getAttribute('multiple') == false) {
            $this->addValidation('Validate.Exclusion', 'within: [\''.$this->placeholder.'\'], failureMessage: "'.__('Select something!').'"');
        }

        $options = [];
        if (!empty($this->getOptions()) && is_array($this->getOptions())) {
            foreach ($this->getOptions() as $key => $items) {
                $optLabel = is_array($items) ? $key : '';
                $optGroup = is_array($items) ? $items : [$key => $items];

                foreach ($optGroup as $value => $label) {
                    $options[$optLabel][$value] = [
                        'value' => $value,
                        'label' => $label,
                        'selected' => $this->isOptionSelected($value) ? 'selected' : '',
                        'class' => !empty($this->chainedToValues[$value]) ? $this->chainedToValues[$value] : '',
                    ];
                }
            }
        }

        return Component::render(Select::class, $this->getAttributeArray() + [
            'groupClass'  => $this->getGroupClass(),
            'placeholder' => $this->placeholder,
            'chainedToID' => $this->chainedToID,
            'options'     => $options,
        ]);
    }
}
