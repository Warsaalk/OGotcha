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
 * @subpackage Renderer
 */

/**
 * CR parser
 *
 * @category   KokxConverter
 * @package    Default
 * @subpackage Renderer
 */
class Default_Renderer_Helper
{

		public static function parseBBCode($bbtext){
		
				$bbtags = array(
						'[heading1]' => '<h1>','[/heading1]' => '</h1>',
						'[heading2]' => '<h2>','[/heading2]' => '</h2>',
						'[heading3]' => '<h3>','[/heading3]' => '</h3>',
						'[h1]' => '<h1>','[/h1]' => '</h1>',
						'[h2]' => '<h2>','[/h2]' => '</h2>',
						'[h3]' => '<h3>','[/h3]' => '</h3>',

						'[paragraph]' => '<p>','[/paragraph]' => '</p>',
						'[para]' => '<p>','[/para]' => '</p>',
						'[p]' => '<p>','[/p]' => '</p>',
						'[left]' => '<p style="text-align:left;">','[/left]' => '</p>',
						'[right]' => '<p style="text-align:right;">','[/right]' => '</p>',
						'[center]' => '<p style="text-align:center;">','[/center]' => '</p>',
						'[justify]' => '<p style="text-align:justify;">','[/justify]' => '</p>',

						'[bold]' => '<span style="font-weight:bold;">','[/bold]' => '</span>',
						'[italic]' => '<span style="font-weight:bold;">','[/italic]' => '</span>',
						'[underline]' => '<span style="text-decoration:underline;">','[/underline]' => '</span>',
						'[b]' => '<span style="font-weight:bold;">','[/b]' => '</span>',
						'[i]' => '<span style="font-weight:bold;">','[/i]' => '</span>',
						'[u]' => '<span style="text-decoration:underline;">','[/u]' => '</span>',
						'[break]' => '<br>',
						'[br]' => '<br>',
						'[newline]' => '<br>',
						'[nl]' => '<br>',
						
						'[unordered_list]' => '<ul>','[/unordered_list]' => '</ul>',
						'[list]' => '<ul>','[/list]' => '</ul>',
						'[ul]' => '<ul>','[/ul]' => '</ul>',

						'[ordered_list]' => '<ol>','[/ordered_list]' => '</ol>',
						'[ol]' => '<ol>','[/ol]' => '</ol>',
						'[list_item]' => '<li>','[/list_item]' => '</li>',
						'[li]' => '<li>','[/li]' => '</li>',
						
						'[*]' => '<li>','[/*]' => '</li>',
						'[code]' => '<code>','[/code]' => '</code>',
						'[preformatted]' => '<pre>','[/preformatted]' => '</pre>',
						'[pre]' => '<pre>','[/pre]' => '</pre>'	     
				);

				$bbtext = str_ireplace(array_keys($bbtags), array_values($bbtags), $bbtext);

				$bbextended = array(
						"/\[url](.*?)\[\/url]/i" => "<a href=\"http://$1\" title=\"$1\">$1</a>",
						"/\[url=(.*?)\](.*?)\[\/url\]/i" => "<a href=\"$1\" title=\"$1\">$2</a>",
						"/\[color=(.*?)\](.*?)\[\/color\]/i" => "<span style=\"color:$1\">$2</span>",
						"/\[size=(.*?)\](.*?)\[\/size\]/i" => "<span style=\"font-size:$1px\">$2</span>",
						"/\[align=(.*?)\](.*?)\[\/align\]/is" => "<div style=\"text-align:$1\">$2</div>",
						"/\[email=(.*?)\](.*?)\[\/email\]/i" => "<a href=\"mailto:$1\">$2</a>",
						"/\[mail=(.*?)\](.*?)\[\/mail\]/i" => "<a href=\"mailto:$1\">$2</a>",
						"/\[img\]([^[]*)\[\/img\]/i" => "<img src=\"$1\" alt=\" \" />",
						"/\[image\]([^[]*)\[\/image\]/i" => "<img src=\"$1\" alt=\" \" />",
						"/\[image_left\]([^[]*)\[\/image_left\]/i" => "<img src=\"$1\" alt=\" \" class=\"img_left\" />",
						"/\[image_right\]([^[]*)\[\/image_right\]/i" => "<img src=\"$1\" alt=\" \" class=\"img_right\" />"
				);

				foreach($bbextended as $match=>$replacement){
					$bbtext = preg_replace($match, $replacement, $bbtext);
				}
				return '<pre>'.$bbtext.'</pre>';
				
		}
	
}
