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
 * Fleet model.
 *
 * @package    Default
 * @subpackage Models
 */
class Default_Model_Fleet
{

    /**
     * The player that sent this fleet.
     *
     * @var string
     */
    protected $_player;

    /**
     * An array of {@link Default_Model_Ship} in this fleet.
     *
     * @var array
     */
    protected $_ships = array();


    /**
     * Set the player.
     *
     * @param string $player
     *
     * @return Default_Model_Fleet
     */
    public function setPlayer($player)
    {
        $this->_player = $player;

        return $this;
    }

    /**
     * Get the player.
     *
     * @return string
     */
    public function getPlayer()
    {
        return $this->_player;
    }

    /**
     * Add a ship.
     *
     * @param Default_Model_Ship $ship
     *
     * @return Default_Model_Fleet
     */
    public function addShip(Default_Model_Ship $ship)
    {
        $this->_ships[] = $ship;

        return $this;
    }

    /**
     * Get the ships
     *
     * @return array of {@link Default_Model_Ship}'s
     */
    public function getShips()
    {
        return $this->_ships;
    }

    /**
     * Get a ship by name
     *
     * @param string $name
     *
     * @return Default_Model_Ship
     */
    public function getShip($name)
    {
        foreach ($this->_ships as $ship) {
            if ($ship->getName() == $name) {
                return $ship;
            }
        }

        return null;
    }

    /**
     * Check if we have a certain ship.
     * 
     * @param string $name
     *
     * @return boolean
     */
    public function hasShip($name)
    {
        foreach ($this->_ships as $ship) {
            if ($ship->getName() == $name) {
                return true;
            }
        }

        return false;
    }
}
