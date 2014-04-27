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

class FormManager extends Connector {

		public function __construct() {}
	
		/**
		 * @param array $form
		 */
		public function handleCr( $form ){
						
				$vl = $this->Main()->getValidator();
				
				$vl->addVariable( 'report', array('min=1'), 'string' );
				$vl->addVariable( 'theme', array('select'), 'string' );
				$vl->addVariable( 'middletext', array(), 'string', false );
				$vl->addVariable( 'merge', array(), 'integer', false );
				$vl->addVariable( 'hidetime', array(), 'integer', false ); // Use integer type for this checkbox as it doesn't exits in a group
				$vl->addVariable( 'raids', array(), 'string', false );
				$vl->addVariable( 'harvest', array(), 'string', false );
				$vl->addVariable( 'deuterium', array(), 'string', false );
					
				$vl->validate( $form );	
					
				if( $vl->isValid() ){					
						
						//$this->Main()->addInfo( new Info( 'Valid Cr', Info::SUCCESS ) );
				
				}else{
				
						$this->Main()->addInfo( new Info( $this->Main()->getDict()->getVal('Invalid post'), Info::ERROR ) );
				
				}
		
		}

}