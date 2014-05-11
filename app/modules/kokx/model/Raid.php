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
 *   This program is based on the Kokx's CR Converter © 2009 kokx: https://github.com/kokx/kokx-converter
 */

/**
 * Raid model.
 *
 * @category   KokxConverter
 * @package    Default
 * @subpackage Models
 */
class Default_Model_Raid
{

    /**
     * Stolen metal.
     *
     * @var int
     */
    protected $_metal;

    /**
     * Stolen crystal.
     *
     * @var int
     */
    protected $_crystal;

    /**
     * Stolen deuterium.
     *
     * @var int
     */
    protected $_deuterium;

    /**
     * Losses the attacker made in this raid.
     *
     * @var int
     */
    protected $_lossesAttacker;

    /**
     * Losses the defender made in this raid.
     *
     * @var int
     */
    protected $_lossesDefender;
    
     /**
     * Metal debris made in this raid.
     *
     * @var int
     */
    protected $_debrisMetal;
    
    /**
     * Cristal debris made in this raid.
     *
     * @var int
     */
    protected $_debrisCristal;

    /**
     * Advanced raid or not
     * 
     * @var boolean
     */
	protected $_advanced = false;
    
    /**
     * Create the raid object.
     *
     * @param int $metal
     * @param int $crystal
     * @param int $deuterium
     * @param int $lossesAttacker
     * @param int $lossesDefender
     * @param int $debrisMetal
     * @param int $debrisCristal
     *
     * @return void
     */
    public function __construct($metal, $crystal, $deuterium, $lossesAttacker = 0, $lossesDefender = 0, $debrisMetal = 0, $debrisCristal = 0)
    {
        $this->_metal          = $metal;
        $this->_crystal        = $crystal;
        $this->_deuterium      = $deuterium;
        
        $this->_lossesAttacker = $lossesAttacker;
        $this->_lossesDefender = $lossesDefender;
        
        $this->_debrisMetal 	= $debrisMetal; 
        $this->_debrisCristal 	= $debrisCristal;
    }

    /**
     * Get the stolen metal.
     *
     * @return int
     */
    public function getMetal()
    {
        return $this->_metal;
    }

    /**
     * Get the stolen crystal.
     *
     * @return int
     */
    public function getCrystal()
    {
        return $this->_crystal;
    }

    /**
     * Get the stolen deuterium.
     *
     * @return int
     */
    public function getDeuterium()
    {
        return $this->_deuterium;
    }

    /**
     * Get the attacker's losses.
     *
     * @return int
     */
    public function getLossesAttacker()
    {
        return $this->_lossesAttacker;
    }

    /**
     * Get the defender's losses.
     *
     * @return int
     */
    public function getLossesDefender()
    {
        return $this->_lossesDefender;
    }
    
     /**
     * Get the metal debris
     *
     * @return int
     */
    public function getDebrisMetal()
    {
        return $this->_debrisMetal;
    }
    
    /**
     * Get the cristal debris
     *
     * @return int
     */
    public function getDebrisCristal()
    {
        return $this->_debrisCristal;
    }
    
    /**
     * Set advanced raid
     * 
     * @return Default_Model_Raid
     */
    public function setAdvancedRaid(){
    	$this->_advanced = true;
    	return $this;
    }
    
    /**
     * Return if advanced raid
     * 
     * @return boolean
     */
    public function isAdvancedRaid(){
    	return $this->_advanced;
    }
}
