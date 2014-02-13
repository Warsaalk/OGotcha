<?php
class Dictionary extends Connector {
	
	private $_dict = array();
		
	public function setVal( $i, $val ) {
	
			$this->_dict[ $i ] = $val;
	
	}
	
	public function getVal( $i ) {
	
			return ( isset( $this->_dict[ $i ] ) ? $this->_dict[ $i ] : 'No translation present' );
	
	}
	
	public function addValues( $lang ) {
	
			$temp = array_merge( $this->_dict, $lang );
	
			$this->_dict = $temp;
	
	}

}