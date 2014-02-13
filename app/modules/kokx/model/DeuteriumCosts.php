<?php
/**
 * This file is part of Kokx's CR Converter.
 *
 * Kokx's CR Converter is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Kokx's CR Converter is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Kokx's CR Converter.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category   KokxConverter
 * @license    http://www.gnu.org/licenses/gpl.txt
 * @copyright  Copyright (c) 2009 Kokx
 * @package    Default
 * @subpackage Models
 */

/**
 * Harvest Report model.
 *
 * @package    Default
 * @subpackage Models
 */
class Default_Model_DeuteriumCosts
{

    /**
     * Fuel costs
     *
     * @var int
     */
    protected $_deuteriumCosts;

    /**
     * Constructor
     *
     * @param int $deuterium
     *
     * @return void
     */
    public function __construct($deuterium)
    {
        $this->_deuteriumCosts = $deuterium;
    }

	/**
     * Get deuterium costs
     *
     * @return int
     */
    public function getDeuteriumCosts()
    {
        return $this->_deuteriumCosts;
    }
}
