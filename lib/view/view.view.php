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
 *   
 *   This file is not part of the original program and therefore it only inherits this copyright: Copyright (C) 2014 Klaas Van Parys
 */

class View{
	
	/**
	 * @var array
	 */
	private $_vars = array();
	
	/**
	 * @var Main
	 */
	private	$main;
	
	/**
	 * @var stdClass
	 */
	public	$tpl;
	
	/**
	 * @param Main $main
	 */
	public function __construct( Main $main ){
		
		$this->tpl = new stdClass;
		$this->main= $main;
		
		$this->_vars['scripts_top']	= '';
		$this->_vars['scripts_bottom']	= '';
				
	}
	
	/**
	 * @param string $key
	 * @param string $value
	 */
	public function set_value( $key, $value ){
		$this->_vars[$key] = $value;
	}
	
	/**
	 * @param string $key
	 * @return string
	 */
	public function get_value( $key ){
		return $this->_vars[$key];
	}
	
	/**
	 * @param array $array
	 */
	public function merge( $array ){
		$this->_vars = array_merge( $this->_vars, $array );	
	}	
	
	/**
	 * @param string $name
	 * @return string
	 */
	public function makeAnchor( $name ){
		return $_SERVER['REQUEST_URI'] . '#' . $name;
	}
	
	/**
	 * @param string $lang
	 * @return string
	 */
	public function getLanguageLink( $lang ){
		$lang = "/l-" . $lang;
		$link = $_SERVER['REQUEST_URI'];
		if( preg_match("/\/l-([a-z]+)$/i", $link) ){
			$link = preg_replace("/\/l-([a-z]+)$/i", $lang, $link);
		}else{
			$link .= $lang;
		}
		return $link;
	}
	
	/**
	 * @param string $script
	 * @param string $place
	 */
	public function addScript( $script, $place='top' ){
		if( isset($this->_vars['scripts_'.$place]) )
			$this->_vars['scripts_'.$place] .= "\n\t";
		else
			$this->_vars['scripts_'.$place] = "";
			
		$this->_vars['scripts_'.$place] .= '<script type="text/javascript" src="'. __JAVASCRIPT . $script .'"></script>';
	}
	
	/**
	 * @param string $css
	 * @param string $cond
	 */
	public function addCSS( $css, $cond=false ){
		if( isset($this->_vars['css']) )
			$this->_vars['css'] .= "\n\t";
		else
			$this->_vars['css'] = "";
		
		if( $cond !== false )	$this->_vars['css'] .= '<!--[if '. $cond .']>';
								$this->_vars['css'] .= '<link rel="stylesheet" type="text/css" href="'. __CSS . $css .'" media="screen" />';
		if( $cond !== false ) 	$this->_vars['css'] .= '<![endif]-->';
	}
	
	/**
	 * @return Info[]
	 */
	public function getInfo(){
		return $this->main->getInfo();
	}
	
	/**
	 * @return boolean
	 */
	public function hasInfo(){
		if( count( $this->main->getInfo() ) > 0 ) return true;
		return false;
	}
	
	/**
	 * @return array
	 */
	public function getGoogleAnalytics(){
		return $this->main->getGoogleAnalytics();
	}
	
	/**
	 * @return boolean
	 */
	public function hasGoogleAnalytics(){
		if( count( $this->main->getGoogleAnalytics() ) > 0 ) return true;
		return false;		
	}
	
	/**
	 * @return Dictionary
	 */
	public function getDict(){
		return $this->main->getDict();
	}
	
	/**
	 * @return Main
	 */
	public function getMain(){
		return $this->main;
	}
	
	/**
	 * @return string
	 */
	public function render(){
				
		$this->tpl->info 		= Parser::parse( $this, 'info' );
		$this->tpl->googleAnalytics 	= Parser::parse( $this, 'googleanalytics' );
		$this->tpl->head 		= Parser::parse( $this, 'head' );
		$this->tpl->footer 		= Parser::parse( $this, 'footer' );	
		$this->tpl->page 		= Parser::parse( $this, $this->main->getPage(), __PAGE_TEMPLATE );

			
		return Parser::parse( $this, 'base' );
	
	}
}