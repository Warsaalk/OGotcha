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
 * HR parser
 *
 * @category   Kokx
 * @package    Default
 * @subpackage Readers_Dutch
 */
class Kokx_Reader_DeuteriumCosts
{

    /**
     * Parse a deuterium costs
     *
     * @param string $source
     *
     * @return array  of {@link Default_Model_DeuteriumCosts}'s
     */
    public static function parse($source, $regexes)
    {
        $reports = array();

        /**
         Example report:
		 
         213.901 Deuterium
         */
        $regex  = $regexes['fuel'];

        $matches = array();

        preg_match_all('/' . $regex . '/i', $source, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $reports[] = new Default_Model_DeuteriumCosts (
                (float) str_replace('.', '', $match[1])
            );
        }
        
        return $reports;
    }
}
