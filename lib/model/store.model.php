<?php
class Store extends Connector {

		private $_data;
				
		public function set( $key, $value ) { $this->_data[ $key ] = $value; }
		public function get( $key ) 		{ return ( isset( $this->_data[ $key ] ) ? $this->_data[ $key ] : '' ); }

}