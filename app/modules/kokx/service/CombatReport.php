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
 * @subpackage Service
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

    protected	$_themes = array(
					'kokx'         => 'kokx',
					'kokx-nolines' => 'kokx-nolines',
					'tsjerk'       => 'Albert Fish',
					'virus'        => 'ViRuS',
					'nexus'        => 'Nexus',
					'vii'          => 'Vii'
				),
				$_data = array();
				
	private $_main, $_report, $_settings, $_regex;
	
	public function __construct ( $main ) {
	
			$this->_main = $main;
			$this->_main->getStore()->set( 'themes', $this->_themes );
	
	}

    public function getThemes()
    {
        return $this->_themes;
    }
	
	private function getRegexes(){
	
			global $phpExt;
	
			$regexes = array();
			require_once( __KOKX_REGEX . $this->_settings['lang'] . $phpExt );
			return $regexes;
	
	}

	public function getReport(){
		
		$vl = $this->_main->getValidator();		
		$rg = $this->getRegexes();
		
		$this->readCombatReport( $vl->getVariable('report','value'), $rg );
		$this->readHarvests( $vl->getVariable('harvest','value'), $rg );
		$this->readRaids( $vl->getVariable('raids','value'), $rg );
		$this->readDeuteriumCosts( $vl->getVariable('deuterium','value'), $rg );
		
		return $this->_report;
	
	}

    public function readCombatReport( $data, $regexes )
    {
        $this->_report = Kokx_Reader_CombatReport::parse($data, $regexes, $this->_settings);
	}
	public function readHarvests( $data, $regexes )
    {
        if ( $data != "" ) $this->_report->setHarvestReports( Kokx_Reader_HarvestReport::parse($data, $regexes) );
	}
	public function readRaids( $data, $regexes )
    {
        if ( $data != "" ) $this->_report->setRaids( Kokx_Reader_Raid::parse($data, $regexes) );  
	}
	public function readDeuteriumCosts( $data, $regexes )
    {
        if ( $data != "" ) $this->_report->setDeuteriumCosts( Kokx_Reader_deuteriumCosts::parse($data, $regexes) );
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
            'theme'    		=> 'kokx',
            'middle_text'	=> $this->_main->getDict()->getVal('After the battle...'),
            'hide_time'  	=> true,
            'merge_fleets' 	=> true,
			'lang'			=> 'nl'
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

    public function getSettings()
    {
        $vl = $this->_main->getValidator();
		
        $this->_settings = $this->getDefaultSettings();

		$theme 		= $vl->getVariable('theme','value');
		$middletext = $vl->getVariable('middletext','value');
		$hidetime 	= $vl->getVariable('hidetime','value');
		$merge 		= $vl->getVariable('merge','value');
		
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
		
		$this->_settings['lang'] = $this->_main->getLang();

        return $this->_settings;
    }
}
