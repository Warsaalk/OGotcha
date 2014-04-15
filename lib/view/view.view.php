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

class View{
	
	private $_vars = array(),
			$main;
			
	public	$tpl;
	
	public function __construct( $main ){
		
		$this->tpl = new stdClass;
		$this->main= $main;
		
		$this->_vars['scripts_top']	= '';
		$this->_vars['scripts_bottom']	= '';
				
	}
		
	public function set_value( $key, $value ){
		$this->_vars[$key] = $value;
	}
	
	public function get_value( $key ){
		return $this->_vars[$key];
	}
	
	public function merge( $array ){
		$this->_vars = array_merge( $this->_vars, $array );	
	}	
	
	public function makeAnchor( $name ){
		return $_SERVER['REQUEST_URI'] . '#' . $name;
	}
	
	public function addScript( $script, $place='top' ){
		if( isset($this->_vars['scripts_'.$place]) )
			$this->_vars['scripts_'.$place] .= "\n\t";
		else
			$this->_vars['scripts_'.$place] = "";
			
		$this->_vars['scripts_'.$place] .= '<script type="text/javascript" src="'. __JAVASCRIPT . $script .'"></script>';
	}
	
	public function addCSS( $css, $cond=false ){
		if( isset($this->_vars['css']) )
			$this->_vars['css'] .= "\n\t";
		else
			$this->_vars['css'] = "";
		
		if( $cond !== false )	$this->_vars['css'] .= '<!--[if '. $cond .']>';
								$this->_vars['css'] .= '<link rel="stylesheet" type="text/css" href="'. __CSS . $css .'" media="screen" />';
		if( $cond !== false ) 	$this->_vars['css'] .= '<![endif]-->';
	}
	
	public function getInfo(){
		return $this->main->getInfo();
	}
	
	public function hasInfo(){
		if( count( $this->main->getInfo() ) > 0 ) return true;
		return false;
	}
	
	public function getGoogleAnalytics(){
		return $this->main->getGoogleAnalytics();
	}
	
	public function hasGoogleAnalytics(){
		if( count( $this->main->getGoogleAnalytics() ) > 0 ) return true;
		return false;		
	}
	
	public function getDict(){
		return $this->main->getDict();
	}
	
	public function getMain(){
		return $this->main;
	}
	
	public function render(){
				
		$this->tpl->info 		= Parser::parse( $this, 'info' );
		$this->tpl->googleAnalytics 	= Parser::parse( $this, 'googleanalytics' );
		$this->tpl->head 		= Parser::parse( $this, 'head' );
		$this->tpl->footer 		= Parser::parse( $this, 'footer' );	
		$this->tpl->page 		= Parser::parse( $this, $this->main->getPage() );

			
		return Parser::parse( $this, 'base' );
	
	}
}