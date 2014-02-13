<?php
/**
 * This file is part of Kokx's CR Converter.
 *
 * Kokx's CR Converter is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Kokx's CR Converter is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Kokx's CR Converter.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @category   KokxConverter
 * @license    http://www.gnu.org/licenses/gpl.txt
 * @copyright  Copyright (c) 2009 Kokx
 * @package    Default
 * @subpackage Controllers
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
