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

use Gibbon\View\Component;

/**
 * Color
 * 
 * Color palette: https://tailscan.com/colors
 *
 * @version v21
 * @since   v21
 */
class Color extends Input
{
    protected $showField = true;
    protected $palette = 'default';

    /**
     * Create an HTML color input.
     * @param  string  $name
     */
    public function __construct($name)
    {
        parent::__construct($name);

        $this->setAttribute('maxlength', 7);
        $this->addValidation(
            'Validate.Format',
            'pattern: /#[0-9a-fA-F]{6}/, failureMessage: "'.__('Must be a valid hex colour').'"'
        );
    }

    /**
     * Set a named color palette for this field to use.
     *
     * @param string $palette
     * @return self
     */
    public function setPalette(string $palette)
    {
        $this->palette = $palette;
        return $this;
    }

    /**
     * Hides the text field that displays the hex color value.
     *
     * @return self
     */
    public function hideField()
    {
        $this->showField = false;
        return $this;
    }

    /**
     * Gets the HTML output for this form element.
     * @return  string
     */
    protected function getElement()
    {
        return Component::render(Color::class, $this->getAttributeArray() + [
            'color'     => !empty($this->getValue()) ? $this->getValue() : '#ffffff',
            'showField' => $this->showField,
            'palette'   => $this->palette,
        ]);
    }
}
