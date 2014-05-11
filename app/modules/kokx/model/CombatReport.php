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
 * Combat Report model
 *
 * @package    Default
 * @subpackage Models
 */
class Default_Model_CombatReport
{

    // constants for the result of the battle
    const ATTACKER = 'attacker';
    const DEFENDER = 'defender';
    const DRAW     = 'draw';

    // references to other classes
    /**
     * Array of {@link Default_Model_HarvestReport}, for the debris field.
     *
     * @var array
     */
    protected $_hrs = array();

    /**
     * Array of {@link Default_Model_Raid}, for raids after the target has been
     * crushed.
     *
     * @var array
     */
    protected $_raids = array();

    /**
     * Array of {@link Default_Model_CombatRound}, for founds of the combat.
     *
     * @var array
     */
    protected $_rounds = array();

    // properties of a CR
    
    // loot
    /**
     * Amount of stolen metal.
     *
     * @var int
     */
    protected $_metal;

    /**
     * Amount of stolen crystal
     *
     * @var int
     */
    protected $_crystal;

    /**
     * Amount of stolen deuterium
     *
     * @var int
     */
    protected $_deuterium;

    // debris field
    /**
     * Amount of metal in the debris field.
     *
     * @var int
     */
    protected $_debrisMetal;

    /**
     * Amount of crystal in the debris field.
     *
     * @var int
     */
    protected $_debrisCrystal;

    // losses
    /**
     * Number of losses the attackers made.
     *
     * @var int
     */
    protected $_lossesAttacker;

    /**
     * Number of losses the defenders made.
     *
     * @var int
     */
    protected $_lossesDefender;

    /**
     * Time that it happened
     *
     * @var DateTime
     */
    protected $_time;

    // other things that could happen
    /**
     * Moon given.
     *
     * @var boolean
     */
    protected $_moonGiven = false;

    /**
     * Chance that a moon is given.
     *
     * @var int
     */
    protected $_moonChance;

    /**
     * Winner of the battle.
     *
     * Either self::ATTACKER, self::DEFENDER or self::DRAW
     *
     * @var string
     */
    protected $_winner;
	
	 /**
     * Deuterium costs
     *
     * @var int
     */
	
	protected $_deuteriumCosts;
	
	/**
	 * @var Default_Model_Team
	 */
	protected $_attackers;

	/**
	 * @var Default_Model_Team
	 */
	protected $_defenders;

	public function __construct()
	{
		$this->_attackers = new Default_Model_Team();
		$this->_defenders = new Default_Model_Team();
	}

    /**
     * Set the Harvest Reports.
     *
     * @param array $reports array of {@link Default_Model_HarvestReport}'s
     *
     * @return Default_Model_CombatReport
     */
    public function setHarvestReports(array $reports)
    {
        $this->_hrs = $reports;

        return $this;
    }

    /**
     * Get the Harvest reports.
     *
     * @return array
     */
    public function getHarvestReports()
    {
        return $this->_hrs;
    }

    /**
     * Set the Raid reports.
     *
     * @param array $raids array of {@link Default_Model_Raid}'s
     *
     * @return Default_Model_Raid
     */
    public function setRaids(array $raids)
    {
        $this->_raids = $raids;

        return $this;
    }

    /**
     * Get the raid reports
     *
     * @return array
     */
    public function getRaids()
    {
        return $this->_raids;
    }
	
	/**
     * Set the Deuterium costs.
     *
     * @param array $raids array of {@link Default_Model_deuteriumCosts}'s
     *
     * @return Default_Model_DeuteriumCosts
     */
    public function setDeuteriumCosts(array $deuterium)
    {
        $this->_deuteriumCosts = $deuterium;

        return $this;
    }

    /**
     * Get the deuterium costs
     *
     * @return array
     */
    public function getDeuteriumCosts()
    {
        return $this->_deuteriumCosts;
    }

    /**
     * Set the time of battle.
     *
     * @param DateTime $time
     *
     * @return Default_Model_CombatReport
     */
    public function setTime(DateTime $time)
    {
        $this->_time = $time;

        return $this;
    }

    /**
     * Get the time of the battle.
     *
     * @return DateTime
     */
    public function getTime()
    {
        return $this->_time;
    }

    /**
     * Add a round to the CR.
     *
     * @param Default_Model_CombatRound $round
     *
     * @return Default_Model_CombatReport
     */
    public function addRound(Default_Model_CombatRound $round)
    {
        $this->_rounds[] = $round;

        return $this;
    }

    /**
     * Get the rounds.
     *
     * @return array of {@link Default_Model_CombatRound}'s
     */
    public function getRounds()
    {
        return $this->_rounds;
    }

    /**
     * Set the winner.
     *
     * @param string $winner
     *
     * @return Default_Model_CombatReport
     */
    public function setWinner($winner)
    {
        if (!in_array($winner, array(self::ATTACKER, self::DEFENDER, self::DRAW))) {
            // TODO: throw an exception or something like that
        }

        $this->_winner = $winner;

        return $this;
    }

    /**
     * Get the winner
     *
     * @return string
     */
    public function getWinner()
    {
        return $this->_winner;
    }

    /**
     * Set the loot.
     *
     * @param int $metal
     * @param int $crystal
     * @param int $deuterium
     *
     * @return Default_Model_CombatReport
     */
    public function setLoot($metal, $crystal, $deuterium)
    {
        $this->_metal     = $metal;
        $this->_crystal   = $crystal;
        $this->_deuterium = $deuterium;

        return $this;
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
     * Set the attacker's losses
     *
     * @param int $losses
     *
     * @return Default_Model_CombatReport
     */
    public function setLossesAttacker($losses)
    {
        $this->_lossesAttacker = $losses;

        return $this;
    }

    /**
     * Get the attacker's losses
     *
     * @return int
     */
    public function getLossesAttacker()
    {
    	$losses = $this->_lossesAttacker;
    	
    	foreach ($this->getRaids() as $raid) {
	    	if( $raid->isAdvancedRaid() ){
	    		$losses += $raid->getLossesAttacker();
	    	}
    	}
    	
        return $losses;
    }

    /**
     * Set the defender's losses
     *
     * @param int $losses
     *
     * @return Default_Model_CombatReport
     */
    public function setLossesDefender($losses)
    {
        $this->_lossesDefender = $losses;

        return $this;
    }

    /**
     * Get the attacker's losses
     *
     * @return int
     */
    public function getLossesDefender()
    {
        $losses = $this->_lossesDefender;
    	
    	foreach ($this->getRaids() as $raid) {
	    	if( $raid->isAdvancedRaid() ){
	    		$losses += $raid->getLossesDefender();
	    	}
    	}
    	
        return $losses;
    }

    /**
     * Set the debris field.
     *
     * @param int $metal
     * @param int $crystal
     *
     * @return Default_Model_CombatReport
     */
    public function setDebris($metal, $crystal)
    {
        $this->_debrisMetal   = $metal;
        $this->_debrisCrystal = $crystal;

        return $this;
    }

    /**
     * Get the metal in the debris field.
     *
     * @return int
     */
    public function getDebrisMetal()
    {
    	$debris = $this->_debrisMetal;
    	
    	foreach ($this->getRaids() as $raid) {
    		if( $raid->isAdvancedRaid() ){
    			$debris += $raid->getDebrisMetal();
    		}
    	}
    	
        return $debris;
    }

    /**
     * Get the crystal in the debris field.
     *
     * @return int
     */
    public function getDebrisCrystal()
    {
    	$debris = $this->_debrisCrystal;
    	
    	foreach ($this->getRaids() as $raid) {
    		if( $raid->isAdvancedRaid() ){
    			$debris += $raid->getDebrisCrystal();
    		}
    	}
    	
        return $debris;
    }

    /**
     * Set the chance that a moon is created.
     *
     * @param int $chance
     *
     * @return Default_Model_CombatReport
     */
    public function setMoonChance($chance)
    {
        $this->_moonChance = $chance;

        return $this;
    }

    /**
     * Get the chance that a moon is created.
     *
     * @return int
     */
    public function getMoonChance()
    {
        return $this->_moonChance;
    }

    /**
     * Set if a moon is given.
     *
     * @param boolean $given
     *
     * @return Default_Model_CombatReport
     */
    public function setMoonGiven($given)
    {
        if ($given) {
            $this->_moonGiven = true;
        } else {
            $this->_moonGiven = false;
        }

        return $this;
    }

    /**
     * Get if a moon is given.
     *
     * @return boolean
     */
    public function getMoonGiven()
    {
        return $this->_moonGiven;
    }
    
    /**
     * @return Default_Model_Team
     */
    public function getAttackers()
    {
    	return $this->_attackers;
    }
    
    /**
     * @return Default_Model_Team
     */
    public function getDefenders()
    {
    	return $this->_defenders;	
    }
    
}
