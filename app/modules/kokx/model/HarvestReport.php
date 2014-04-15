<?php
/**   OGotcha, a combat report converter for Ogame
 *    Copyright (C) 2014  Klaas Van Parys
 *
 *   This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *   
 *    This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details. 
 *   
 *    You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *   
 *   This program is based on the Kokx's CR Converter � 2009 kokx: https://github.com/kokx/kokx-converter
 */

/**
 * Harvest Report model.
 *
 * @package    Default
 * @subpackage Models
 */
class Default_Model_HarvestReport
{

    /**
     * Number of recyclers.
     *
     * @var int
     */
    protected $_recyclers;

    /**
     * Storage capacity of the recyclers.
     *
     * @var int
     */
    protected $_capacity;

    /**
     * Metal in the field.
     *
     * @var int
     */
    protected $_fieldMetal;

    /**
     * Crystal in the field.
     *
     * @var int
     */
    protected $_fieldCrystal;

    /**
     * Harvested metal.
     *
     * @var int
     */
    protected $_metal;

    /**
     * Harvested crystal.
     *
     * @var int
     */
    protected $_crystal;
	
	/**
     * Harvested coordinate.
     *
     * @var int
     */
    protected $_coordinates;


    /**
     * Constructor
     *
     * @param int $recyclers
     * @param int $capacity
     * @param int $fieldMetal
     * @param int $fieldCrystal
     * @param int $metal
     * @param int $crystal
     *
     * @return void
     */
    public function __construct($recyclers, $capacity, $coordinates, $fieldMetal, $fieldCrystal, $metal, $crystal)
    {
        $this->_recyclers    = $recyclers;
        $this->_capacity     = $capacity;
        $this->_fieldMetal   = $fieldMetal;
        $this->_fieldCrystal = $fieldCrystal;
        $this->_metal        = $metal;
        $this->_crystal      = $crystal;
		$this->_coordinates	 = $coordinates;
    }

	/**
     * Get harvested coordinates
     *
     * @return int
     */
    public function getCoordinates()
    {
        return $this->_coordinates;
    }
	
    /**
     * Get the number of recyclers.
     *
     * @return int
     */
    public function getRecyclers()
    {
        return $this->_recyclers;
    }

    /**
     * Get the capacity.
     *
     * @return int
     */
    public function getCapacity()
    {
        return $this->_capacity;
    }

    /**
     * Get the metal in the field.
     *
     * @return int
     */
    public function getFieldMetal()
    {
        return $this->_fieldMetal;
    }

    /**
     * Get the crystal in the field.
     *
     * @return int
     */
    public function getFieldCrystal()
    {
        return $this->_fieldCrystal;
    }

    /**
     * Get the metal recycled.
     *
     * @return int
     */
    public function getMetal()
    {
        return $this->_metal;
    }

    /**
     * Get the crystal recycled.
     *
     * @return int
     */
    public function getCrystal()
    {
        return $this->_crystal;
    }
}
