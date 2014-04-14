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
 * @subpackage Renderer
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

    public $_report, $_settings, $data, $dict, $themeSettings;

    public function __construct(array $settings = array(), $report, $dict)
    {
	
			$this->_settings = $settings;
			$this->_report = $report;
			$this->_path = __KOKX_RENDERER . $settings['theme'] . '/';
			$this->data = new stdClass;
			$this->dict = $dict;
			
			$this->getThemeSettings();
			
    }
	public function translate() { 
	
			$n = func_num_args();
			
			if( $n > 0 ) {
				
				$s = func_get_arg( 0 );
				$s = $this->dict->getVal( $s ); //Translate value
			
				if( $n > 1 ) {
				
						$args = func_get_args();
						$args[0] = $s; //Replace original value with translated one
				
						return call_user_func_array( 'sprintf', $args );
				
				}
				
				return $s;
			
			}
			
			return 'no translation';
			
	}
	
	public function getThemeSettings() {
	
			$settings = array();
			
			require_once $this->_path . 'settings.php';
			
			$this->_settings = array_merge( $this->_settings, $settings );
	
	}
	
	public function render( $file )
	{
	
			$tpl = $this->_path . 'tpl/';
			return Parser::parse($this, $file, $tpl);
	
	}
	
    public function renderReport()
    {

			$return = $this->_renderTime();
			$return .= $this->_renderRounds();
			$return .= $this->_renderResult();

			return $return;
		
    }

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

    public function _renderTime()
    {
       $this->data->hideTime = isset($this->_settings['hide_time']) ?
                                     $this->_settings['hide_time'] : true;

        return $this->render('time');
    }

    public function _renderRounds()
    {
        $result = $this->render('firstround');

        if (isset($this->_settings['middle_text'])) {
            $result .= $this->_settings['middle_text'];
        }

        $result .= $this->render('lastround');

        return $result;
    }

    public function _renderResult()
    {
        $this->data->totalDebris = 0;
	$this->data->raidDeutRes = 0;

        foreach ($this->_report->getHarvestReports() as $hr) {
            $this->data->totalDebris += $hr->getMetal() + $hr->getCrystal();
        }

        $this->data->totalRaids = $this->_report->getMetal() + $this->_report->getCrystal() + $this->_report->getDeuterium();
        foreach ($this->_report->getRaids() as $raid) {
        	$this->data->totalRaids += $raid->getMetal() + $raid->getCrystal() + $raid->getDeuterium();
		$this->data->raidDeutRes += $raid->getDeuterium();
        }
        
        // Fuel costs
	$this->data->totalFuel = 0;
        if ($this->_report->getDeuteriumCosts() > 0) {
                
                foreach ($this->_report->getDeuteriumCosts() as $fuel) {
                    $this->data->totalFuel += $fuel->getDeuteriumCosts();
                }
        }
            return $this->render('winnerloot')
                 . $this->render('lossesmoon')
                 . $this->render('debris')
                 . $this->render('summary')
		 . $this->render('advancedsummary');
    }	
	
	public function colorNumber($number, $color = '')
    {
		if( $color == '' ) $color = $this->_settings['numberColor']; 
        return "[color=$color][b]{$this->formatNumber($number)}[/b][/color]";
    }
	
	public function formatNumber($number)
    {
        return number_format($number, 0, ',', '.');
    }
	
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
