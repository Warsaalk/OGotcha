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
 * Combat Round model.
 *
 * @package    Default
 * @subpackage Models
 */
class Default_Model_CombatRound
{

    /**
     * Array of attacking {@link Default_Model_Fleet}'s.
     *
     * @param array
     */
    protected $_attackers;

    /**
     * Array of defending {@link Default_Model_Fleet}'s
     *
     * @param array
     */
    protected $_defenders;


    /**
     * Add an attacking fleet
     *
     * @param Default_Model_Fleet $fleet
     *
     * @return Default_Model_CombatRound
     */
    public function addAttackingFleet(Default_Model_Fleet $fleet)
    {
        $this->_attackers[] = $fleet;

        return $this;
    }

    /**
     * Get all the attacking fleets
     *
     * @return array
     */
    public function getAttackers()
    {
        return $this->_attackers;
    }

    /**
     * Set all the attacking fleets
     *
     * @param array $fleets
     *
     * @return Default_Model_CombatRound
     */
    public function setAttackers(array $fleets)
    {
        $this->_attackers = $fleets;

        return $this;
    }

    /**
     * Add a defending fleet
     *
     * @param Default_Model_Fleet $fleet
     *
     * @return Default_Model_CombatRound
     */
    public function addDefendingFleet(Default_Model_Fleet $fleet)
    {
        $this->_defenders[] = $fleet;

        return $this;
    }

    /**
     * Get all the defending fleets
     *
     * @return array
     */
    public function getDefenders()
    {
        return $this->_defenders;
    }

    /**
     * Set all the defending fleets
     *
     * @param array $fleets
     *
     * @return Default_Model_CombatRound
     */
    public function setDefenders(array $fleets)
    {
        $this->_defenders = $fleets;

        return $this;
    }
}
