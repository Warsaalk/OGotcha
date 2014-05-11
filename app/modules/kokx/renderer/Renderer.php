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
 * CR parser
 *
 * @category   KokxConverter
 * @package    Default
 * @subpackage Renderer
 */
class Default_Renderer_Renderer
{

	/**
	 * @var Default_Model_CombatReport
	 */
    public $_report;
    
    /**
     * @var array
     */
    public $_settings;
    
    /**
     * @var stdClass
     */
    public $data;
    
    /**
     * @var Dictionary
     */
    public $dict;
    
    public $themeSettings;

    /**
     * @param array $settings
     * @param Default_Model_CombatReport $report
     * @param Dictionary $dict
     */
    public function __construct(array $settings = array(), $report, $dict)
    {
	
			$this->_settings = $settings;
			$this->_report = $report;
			$this->_path = __KOKX_RENDERER . $settings['theme'] . '/';
			$this->data = new stdClass;
			$this->dict = $dict;
			
			$this->mergeThemeSettings();
			
    }
    
    /**
     * @return string
     */
	public function translate() { 
		
			return call_user_func_array(array($this->dict,'getVal'),func_get_args());
			
	}
	
	public function mergeThemeSettings() {
	
			$settings = array();
			
			require_once $this->_path . 'settings.php';
			
			$this->_settings = array_merge( $this->_settings, $settings );
	
	}
	
	/**
	 * @param string $file
	 * @return string
	 */
	public function render( $file )
	{
	
			$tpl = $this->_path . 'tpl/';
			return Parser::parse($this, $file, $tpl);
	
	}
	
	/**
	 * @return string
	 */
    public function renderReport()
    {

			$return = $this->_renderTime();
			$return .= $this->_renderRounds();
			$return .= $this->_renderResult();

			return $return;
		
    }

    /**
     * @return string
     */
    public function renderTitle()
    {
	
        $rounds = $this->_report->getRounds();

        // get the attackers
        $attackers = array();

        foreach ($rounds[0]->getAttackers() as $fleet) {
            /* @var $fleet Default_Model_Fleet */
            $attackers[$fleet->getPlayer()] = '';
        }
        $attackers = array_keys($attackers);

        // get the defenders
        $defenders = array();

        foreach ($rounds[0]->getDefenders() as $fleet) {
            /* @var $fleet Default_Model_Fleet */
            $defenders[$fleet->getPlayer()] = '';
        }
        $defenders = array_keys($defenders);

        // stats
        $totalLosses = $this->_report->getLossesAttacker() + $this->_report->getLossesDefender();

        return $this->translate("[TOT: %s] %s vs. %s (A: %s, D: %s)",
        
            $this->formatNumber($totalLosses),
            implode($this->translate(" & "), $attackers),
            implode($this->translate(" & "), $defenders),
            $this->formatNumber($this->_report->getLossesAttacker()),
            $this->formatNumber($this->_report->getLossesDefender())
			
		);
			
    }

    /**
     * @return string
     */
    public function _renderTime()
    {
       	$this->data->hideTime = isset($this->_settings['hide_time']) ? $this->_settings['hide_time'] : true;

        return $this->render('time');
    }

    /**
     * @return string
     */
    public function _renderRounds()
    {
        $result = $this->render('firstround');

        if (isset($this->_settings['middle_text'])) {
            $result .= $this->_settings['middle_text'];
        }

        $result .= $this->render('lastround');

        return $result;
    }
	
    /**
     * @return string
     */
    public function _renderResult()
    {
        $this->data->totalDebrisAttackers = 0;
        $this->data->totalDebrisDefenders = 0;
		$this->data->raidDeutRes = 0;
		
		$this->data->totalLossesAttacker = $this->_report->getLossesAttacker();
		$this->data->totalLossesDefender = $this->_report->getLossesDefender();

		//Harvest reports
        foreach ($this->_report->getAttackers()->getHarvestReports() as $hr) {
            $this->data->totalDebrisAttackers += $hr->getMetal() + $hr->getCrystal();
        }
        foreach ($this->_report->getDefenders()->getHarvestReports() as $hr) {
        	$this->data->totalDebrisDefenders += $hr->getMetal() + $hr->getCrystal();
        }

        //Raids
        $this->data->totalRaids = $this->_report->getMetal() + $this->_report->getCrystal() + $this->_report->getDeuterium();
        foreach ($this->_report->getRaids() as $raid) {
        	$this->data->totalRaids += $raid->getMetal() + $raid->getCrystal() + $raid->getDeuterium();
			$this->data->raidDeutRes += $raid->getDeuterium();
        }
        
        // Fuel costs
		$this->data->totalFuelAttackers = 0;
		$this->data->totalFuelDefenders = 0;
        if ($this->_report->getAttackers()->getDeuteriumCosts() > 0) {
        	foreach ($this->_report->getAttackers()->getDeuteriumCosts() as $fuel) {
            	$this->data->totalFuelAttackers += $fuel->getDeuteriumCosts();
        	}
        }
        if ($this->_report->getDefenders()->getDeuteriumCosts() > 0) {
        	foreach ($this->_report->getDefenders()->getDeuteriumCosts() as $fuel) {
        		$this->data->totalFuelDefenders += $fuel->getDeuteriumCosts();
        	}
        }
        
        // calculate the result
        $this->data->attackerResult = $this->data->totalDebrisAttackers + $this->data->totalRaids - $this->data->totalFuelAttackers - $this->data->totalLossesAttacker;
        $this->data->defenderResult = $this->data->totalDebrisDefenders - $this->data->totalFuelDefenders - $this->data->totalLossesDefender;
        
        return 	$this->render('winnerloot')
               	. $this->render('lossesmoon')
               	. $this->render('debris')
               	. $this->render('summary');
				//. $this->render('advancedsummary');
    }	
	
    /**
     * @param string $number
     * @param string $color
     * @return string
     */
	public function colorNumber($number, $color = '')
    {
		if( $color == '' ) $color = $this->_settings['numberColor']; 
        return "[color=$color][b]{$this->formatNumber($number)}[/b][/color]";
    }
	
    /**
     * @param string $number
     * @return string
     */
	public function formatNumber($number)
    {
        return number_format($number, 0, ',', '.');
    }
	
    /**
     * @param boolean $attacker
     * @param Default_Model_Ship $ship
     * @param Default_Model_Fleet $fleet
     * @return string
     */
	public function formatShip($attacker, Default_Model_Ship $ship, Default_Model_Fleet $fleet = null)
    {
		$attColor = $this->_settings['shipColorAttacker'];
		$defColor = $this->_settings['shipColorDefender'];
        if (null === $fleet) {
            if ($attacker) {
                return "[color=$attColor]{$this->translate($ship->getName())} {$this->formatNumber($ship->getCount())}[/color]\n";
            } else {
                return "[color=$defColor]{$this->translate($ship->getName())} {$this->formatNumber($ship->getCount())}[/color]\n";
            }
        } else {
            /*
             * Note that in this case, the $ship is the old ship, and $fleet
             * contains the new fleet.
             */
            $newCount = ($fleet->getShip($ship->getName()) != null) ? $fleet->getShip($ship->getName())->getCount() : 0;
            if ($attacker) {
                return "[color=$attColor]{$this->translate($ship->getName())} {$newCount} "
                     . "[b]( -{$this->formatNumber($ship->getCount() - $newCount)} )[/b][/color]\n";
            } else {
                return "[color=$defColor]{$this->translate($ship->getName())} {$newCount} "
                     . "[b]( -{$this->formatNumber($ship->getCount() - $newCount)} )[/b][/color]\n";
            }
        }
    }
	
}
