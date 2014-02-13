<?php
abstract class Connector {
	
		private $_main;

		public function connectMain( $main ) 	{ $this->_main = $main; }
		public function Main()					{ return $this->_main;	}
		
}