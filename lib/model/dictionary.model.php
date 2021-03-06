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
 *   This program is based on the Kokx's CR Converter � 2009 kokx: https://github.com/kokx/kokx-converter
 *   
 *   This file is not part of the original program and therefore it only inherits this copyright: Copyright (C) 2014 Klaas Van Parys
 */

class Dictionary extends Connector {
	
	/**
	 * @var array
	 */
	private $_dict = array();

	/**
	 * @param string $i
	 * @param string $val
	 */
	public function setVal( $i, $val ) {
	
			$this->_dict[ $i ] = $val;
	
	}
	
	/**
	 * @param string $value
	 * @return string
	 */
	public function getVal() {
	
			$noTrans = 'No translation present';
		
			$n = func_num_args();
				
			if( $n > 0 ) {
			
				$s = func_get_arg( 0 );
				$s = ( isset( $this->_dict[ $s ] ) ? $this->_dict[ $s ] : 'No translation present' );
					
				if( $n > 1 ) {
			
					$args = func_get_args();
					$args[0] = $s; //Replace original value with translated one
			
					return call_user_func_array( 'sprintf', $args );
			
				}
			
				return $s;
					
			}
				
			return $noTrans;
	
	}
	
	/**
	 * @param array $lang
	 */
	public function addValues( $lang ) {
	
			$temp = array_merge( $this->_dict, $lang );
	
			$this->_dict = $temp;
	
	}

}