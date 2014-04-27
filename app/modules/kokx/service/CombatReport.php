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
 * @subpackage Service
 */
class Default_Service_CombatReport
{

	/**
	 * @var array
	 */
    protected	$_themes = array(
		'kokx'         => 'kokx',
		'kokx-nolines' => 'kokx-nolines',
		'tsjerk'       => 'Albert Fish',
		'virus'        => 'ViRuS',
		'nexus'        => 'Nexus',
		'vii'          => 'Vii'
	);
    
    /**
     * @var array
     */
    protected $_data = array();

    /**
     * @var Main
     */
	private $_main;
	
    /**
     * @var Kokx_Reader_CombatReport
     */
	private $_report;
	
    /**
     * @var array
     */
	private $_settings;
	
    /**
     * @var array
     */
	private $_regex;
	
	/**
	 * @param Main $main
	 */
	public function __construct ( $main ) {
	
		$this->_main = $main;
		$this->_main->getStore()->set( 'themes', $this->_themes );
	
	}

	/**
	 * @return array
	 */
    public function getThemes()
    {
        return $this->_themes;
    }
	
    /**
     * @return array
     */
	private function getRegexes(){
	
		global $phpExt;
	
		$regexes = array();
		require_once( __KOKX_REGEX . $this->_settings['lang'] . $phpExt );
		return $regexes;
	
	}

	/**
	 * @return Kokx_Reader_CombatReport
	 */
	public function getReport(){
		
		$vl = $this->_main->getValidator();		
		$rg = $this->getRegexes();
		
		$this->readCombatReport( $vl->getVariable('report','value'), $rg );
		
		$this->readRaids( $vl->getVariable('raids','value'), $rg );
		$this->readHarvests( $vl->getVariable('attacker_harvest','value'), $rg, Default_Model_Team::ATTACKERS );
		$this->readDeuteriumCosts( $vl->getVariable('attacker_deuterium','value'), $rg, Default_Model_Team::ATTACKERS );
		$this->readHarvests( $vl->getVariable('defender_harvest','value'), $rg, Default_Model_Team::DEFENDERS );
		$this->readDeuteriumCosts( $vl->getVariable('defender_deuterium','value'), $rg, Default_Model_Team::DEFENDERS );
		
		return $this->_report;
	
	}

	/**
	 * @param string $data
	 * @param array $regexes
	 */
    public function readCombatReport( $data, $regexes )
    {
    	
        $this->_report = Kokx_Reader_CombatReport::parse($data, $regexes, $this->_settings);
        
	}
	
	/**
	 * @param string $data
	 * @param array $regexes
	 */
	public function readRaids( $data, $regexes )
    {
    	
        if ( $data != "" ) $this->_report->setRaids( Kokx_Reader_Raid::parse($data, $regexes) );  
        
	}

	/**
	 * @param string $data
	 * @param array $regexes
	 * @param int $team
	 */
	public function readHarvests( $data, $regexes, $team )
   	{
   		
       	if ( $data != "" ){
       		if( $team === Default_Model_Team::ATTACKERS ){
       			$this->_report->getAttackers()->setHarvestReports( Kokx_Reader_HarvestReport::parse($data, $regexes) );
       		}elseif( $team === Default_Model_Team::DEFENDERS ){
       			$this->_report->getDefenders()->setHarvestReports( Kokx_Reader_HarvestReport::parse($data, $regexes) );
       		}
       	}
       	
	}

	/**
	 * @param string $data
	 * @param array $regexes
	 * @param int $team
	 */
	public function readDeuteriumCosts( $data, $regexes, $team )
    {
    	
    	if ( $data != "" ){
       		if( $team === Default_Model_Team::ATTACKERS ){
       			$this->_report->getAttackers()->setDeuteriumCosts( Kokx_Reader_deuteriumCosts::parse($data, $regexes) );
       		}elseif( $team === Default_Model_Team::DEFENDERS ){
       			$this->_report->getDefenders()->setDeuteriumCosts( Kokx_Reader_deuteriumCosts::parse($data, $regexes) );
       		}
    	}
        
	}

    /**
     * Get the renderer.
     *
     * @param array $settings
     *
     * @return Default_Renderer_Renderer
     */
    public function getRenderer(array $settings, $report)
    {
        
    	return new Default_Renderer_Renderer($settings, $report, $this->_main->getDict());

	}

    /**
     * Get the default settings
     *
     * @return array
     */
    public function getDefaultSettings()
    {
        return array(
            'theme'    			=> 'kokx',
            'middle_text'		=> $this->_main->getDict()->getVal('After the battle...'),
            'hide_time'  		=> true,
            'merge_fleets' 		=> true,
            'advanced_summary'  => false,
            'harvest_quotes' 	=> false,
			'lang'				=> 'nl'
        );
    }

    /**
     * Get the data.
     *
     * @return array.
     */
    public function getData()
    {
        return $this->_data;
    }

    /**
     * @return array
     */
    public function getSettings()
    {
        $vl = $this->_main->getValidator();
		
        $this->_settings = $this->getDefaultSettings();

		$theme 		= $vl->getVariable('theme','value');
		$middletext = $vl->getVariable('middletext','value');
		$hidetime 	= $vl->getVariable('hidetime','value');
		$merge 		= $vl->getVariable('merge','value');
		$advanced 	= $vl->getVariable('advanced','value');
		$quotes 	= $vl->getVariable('quotes','value');
		
        if ( $theme != "" && isset($this->_themes[$theme])) {
            $this->_settings['theme'] = $theme;
        }
        if ( $middletext != "" ) {
            $this->_settings['middle_text'] = $middletext;
        }
        if ( $hidetime != '1' ) {
            $this->_settings['hide_time'] = false;
        }
        if ( $merge != '1') {
            $this->_settings['merge_fleets'] = false;
        }
        if ( $advanced == '1' ) {
        	$this->_settings['advanced_summary'] = true;
        }
        if ( $quotes == '1') {
        	$this->_settings['harvest_quotes'] = true;
        }
		
		$this->_settings['lang'] = $this->_main->getLang();

        return $this->_settings;
    }
}
