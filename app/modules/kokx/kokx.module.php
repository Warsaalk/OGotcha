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

/**
 * Index controller
 *
 * @category   KokxConverter
 * @package    Default
 * @subpackage Controllers
 */
class KokxModule
{

    public function execute( $main )
    {
	
			$crService = new Default_Service_CombatReport( $main );
			
			if( $main->getValidator()->isValid() && $main->getValidator()->isValidated() ) {
			
					try {
					
							$settings 	= $crService->getSettings();
							$report		= $crService->getReport();
							
							$renderer = $crService->getRenderer($settings, $report);

							$renderedReport = $renderer->renderReport();
							$renderedTitle  = $renderer->renderTitle();
							$renderedPreview= Default_Renderer_Helper::parseBBCode( $renderedReport );
							
							$main->getStore()->set('result-content', $renderedReport );
							$main->getStore()->set('result-title', $renderedTitle );
							$main->getStore()->set('result-preview', $renderedPreview );
						
					} catch (Exception $e) {
						
							Debug::arr( $e );
						
							$main->addInfo( new Info( $main->getDict()->getVal('Bad Cr'), Info::ERROR ) );
							$main->getStore()->set('error', true);
							
					}
			
			}

    }
}
