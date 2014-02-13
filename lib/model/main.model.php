<?php
/**
* General file information
*
* @package root\php_model
*/
/**
* This is the main class which handles and provides all the data
*
*/
class Main{

		private $_page,
				$_lang,
				$_get, //Store for get variables
				$_info = array(),
				$_validator,
				$_formmanager,
				$_dictionary,
				$_store;
				
		public $settings;
				
		public function __construct() 			{ $this->settings = new stdClass; }
		
		public function initDictionaries( $dicts, $default=false )	{ Language::init( $dicts, $default ); }
		public function initPages( $pages, $default=false ) 		{ Page::init( $pages, $default ); }
		
		public function setValidator( $va )		{ $va->connectMain( $this );	$this->_validator = $va;		}
		public function getValidator()			{ return $this->_validator;										}
		
		public function setFormManager( $fm )	{ $fm->connectMain( $this );	$this->_formmanager = $fm;		}
		public function getFormManager()		{ return $this->_formmanager;									}
		
		public function setDict( $dc )			{ $dc->connectMain( $this );	$this->_dictionary = $dc;		}
		public function getDict()				{ return $this->_dictionary;									}
		
		public function setStore( $st )			{ $st->connectMain( $this );	$this->_store = $st;			}
		public function getStore()				{ return $this->_store;											}
		
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
		
		public function handleModule( $class ){
		
				$instance = new $class();
				$instance->execute( $this );
		
		}
		
		public function addInfo( $info ){	array_push( $this->_info, $info ); }
		public function getInfo() {			return $this->_info; }
		public function get( $var ) {		return ( isset( $this->_gets[ $var ] ) ? $this->_gets[ $var ] : null ); }
		public function getPage() {			return $this->_page; }
		public function getLang() {			return $this->_lang; }
		
		public function saveCookie( $name, $value, $time=NULL ){
		
				global $_COOKIE;
				
				if( $time != NULL )
					setcookie( $name, $value, time() + $time );
				else
					setcookie( $name, $value );
				$_COOKIE[$name] = $value;
		
		}
		
}