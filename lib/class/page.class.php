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

class Page {

	/**
	 * @var string
	 */
	private static $default;
	
	/**
	 * @var string[]
	 */
	private static $pages;
	
	/**
	 * @param array $pages
	 * @param string $default
	 */
	public static function init( array $pages = array(), $default=false ){
	
			self::$pages = $pages;
	
			if( $default !== false ) 			self::$default = $default;
			elseif( $default === false && 
					!empty( self::$pages ) )	self::$default = self::$pages[0];
			else								self::$default = false;
	
	}
	
	/**
	 * @param string $page
	 * @return string
	 */
	public static function validate( $page ){
				
			if( !in_array( $page, self::$pages ) )
					return self::$default;
			return $page;
	
	}
	
	/**
	 * @return string
	 */
	public static function getDefault(){
				
			return self::$default;
	
	}
	
}