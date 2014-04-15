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
 */

class Info{
	
	const	INFORMATION = 'information',
			SUCCESS		= 'success',
			WARNING		= 'warning',
			ERROR		= 'error';
	
	private $_message,
			$_type,
			$_types 	= array(
	
					'information'	=> array( 'img' => 'information.png' ),
					'success'		=> array( 'img' => 'success.png' ),
					'warning'		=> array( 'img' => 'warning.png' ),
					'error'			=> array( 'img' => 'error.png' )
			
			);
	
	public function __construct( $mess, $type=self::SUCCESS ){	
	
			$this->_message	= $mess;
			$this->_type	= $type;
			
	}
	
	public function getMessage(){
			return $this->_message;
	}
	
	public function getType(){
			return $this->_type;
	}
	
	public function getImage(){
			return __IMAGES . $this->_types[ $this->_type ]['img'];
	}
	
}