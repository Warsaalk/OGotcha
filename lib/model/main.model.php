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

class Main{

		/**
		 * @var string
		 */
		private $_page;
		
		/**
		 * @var string
		 */
		private $_lang;
		
		/**
		 * Store for get variables
		 * 
		 * @var array
		 */
		private $_get;
		
		/**
		 * @var Info[]
		 */
		private $_info = array();
		
		/**
		 * @var array
		 */
		private $_ga = array();
		
		/**
		 * @var Validator
		 */
		private $_validator;
		
		/**
		 * @var FormManager
		 */
		private $_formmanager;
		
		/**
		 * @var Dictionary
		 */
		private $_dictionary;
		
		/**
		 * @var Store
		 */
		private $_store;
		
		/**
		 * @var stdClass
		 */
		public $settings;
				
		public function __construct() { $this->settings = new stdClass; }
		
		/**
		 * @param array $dicts
		 * @param string $default
		 */
		public function initDictionaries( $dicts, $default=false ) { Language::init( $dicts, $default ); }
		
		/**
		 * @param array $pages
		 * @param string $default
		 */
		public function initPages( $pages, $default=false ) { Page::init( $pages, $default ); }
		
		/**
		 * @param Validator $va
		 */
		public function setValidator( $va )	{ $va->connectMain( $this ); $this->_validator = $va; }
		
		/**
		 * @return Validator
		 */
		public function getValidator() { return $this->_validator; }
		
		/**
		 * @param FormManager $fm
		 */
		public function setFormManager( $fm ) { $fm->connectMain( $this ); $this->_formmanager = $fm; }
		
		/**
		 * @return FormManager
		 */
		public function getFormManager() { return $this->_formmanager; }
		
		/**
		 * @param Dictionary $dc
		 */
		public function setDict( $dc ) { $dc->connectMain( $this ); $this->_dictionary = $dc; }
		
		/**
		 * @return Dictionary
		 */
		public function getDict() { return $this->_dictionary; }
		
		/**
		 * @param Store $st
		 */
		public function setStore( $st )	{ $st->connectMain( $this ); $this->_store = $st; }
		
		/**
		 * @return Store
		 */
		public function getStore() { return $this->_store; }
		
		public function handleGet() {

			global $_GET;
			
			$this->_page = Page::getDefault();
			if( isset( $_GET['p'] ) ){
				$this->_page 	= Page::validate( $_GET['p'] );
			}
			
			$this->_lang = Language::getDefault();
			if( isset( $_GET['l'] ) ){
				$this->_lang 	= Language::validate( $_GET['l'] );
				$this->saveCookie( 'language', $this->_lang );	
			}
			
			foreach( $_GET as $id => $val ){
			
				$this->_gets[ $id ] = Validator::cleanInput( $val );
			
			}
		
		}
		
		public function handleDictionary() {
				
			global $_COOKIE, $dictExt;
			
			if( isset( $_COOKIE["language"] ) && Language::validate( $_COOKIE["language"] ) )
				$this->_lang = $_COOKIE["language"];
			
			$lang = array();
			require_once( __DICTIONARY . $this->_lang . $dictExt );
			
			$this->getDict()->addValues( $lang );
				
		}
		
		public function handlePost() {
				
			global $_POST, $_FILES;
			
			if( isset( $_POST['cmd'] ) ){

				switch( $_POST['cmd'] ){
		
					case 'cr': $this->getFormManager()->handleCr( $_POST ); break;
					default;
				
				}
			
			}
				
		}
		
		/**
		 * @param string $class
		 */
		public function handleModule( $class ){
		
			$instance = new $class();
			$instance->execute( $this );
		
		}
		
		/**
		 * @param string $trackId
		 * @param string $domain Name of the domain you want to track, default: "auto"
		 * @param string $name Name of the GA Javascript object, default: "ga" 
		 * @param boolean $send Automaticly send a pageview of not, default: true
		 */
		public function addGoogleAnalytics( $trackId, $domain='auto', $name='ga', $autoSend=true ){
			
			$this->_ga['ID'] 	= $trackId;
			$this->_ga['domain']= $domain;
			$this->_ga['name']	= $name;
			$this->_ga['send'] 	= $autoSend; //Send pageview
			
		}
		
		/**
		 * @return array
		 */
		public function getGoogleAnalytics(){
			
			return $this->_ga;
			
		}
		
		/**
		 * @param Info $info
		 */
		public function addInfo( $info ){ array_push( $this->_info, $info ); }
		
		/**
		 * @return Info[]
		 */
		public function getInfo() {	return $this->_info; }
		
		/**
		 * @param string $var
		 * @return Ambigous <NULL, string>
		 */
		public function get( $var ) { return ( isset( $this->_gets[ $var ] ) ? $this->_gets[ $var ] : null ); }
		
		/**
		 * @return string
		 */
		public function getPage() {	return $this->_page; }
		
		/**
		 * @return string
		 */
		public function getLang() {	return $this->_lang; }
		
		/**
		 * @param string $name
		 * @param string|int|boolean $value
		 * @param int $time
		 */
		public function saveCookie( $name, $value, $time=NULL ){
			
				global $_COOKIE;
				
				if( $time != NULL )
					setcookie( $name, $value, time() + $time, __BASE );
				else
					setcookie( $name, $value, 0, __BASE );
				$_COOKIE[$name] = $value;
		
		}
		
}