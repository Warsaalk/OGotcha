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
 * Raid parser
 *
 * @category   Kokx
 * @package    Default
 * @subpackage Readers_Dutch
 */
class Kokx_Reader_Raid
{

    /**
     * Parse a raid report
     *
     * @param string $source
     *
     * @return array  of {@link Default_Reader_Raid}'s
     */
    public static function parse($source, $regexes)
    {
        $raids = array();
        /**
         * The source only has to contain something like:
         *
         * De aanvaller heeft het gevecht gewonnen! De aanvaller steelt 13.962 metaal, 4.463 kristal en 123.168 deuterium.
         *
         * De aanvaller heeft een totaal van 0 eenheden verloren.
         * De verdediger heeft een totaal van 11.056.000 eenheden verloren.
         * Op deze coÃ¶rdinaten in de ruimte zweven nu 2.407.800 metaal en 909.000 kristal.
         *
         *
         * [[ REDESIGN short version: ]]
         * Gevechtsrapport
         *
         * gevecht vond plaats op maan [x:xxx:x] (--.--.---- --:--:--)
         *
         * Wickedmen van Sinasappelsap [x:xx:x]
         * vs
         *
         * MNN van maan [x:xxx:x]
         *
         * schepen/verdediging: 	160 		schepen/verdediging: 	0
         * eenheden verloren: 	0 		eenheden verloren: 	0
         * Wapens: 	100% 		Wapens: 	110%
         * Schilden: 	80% 		Schilden: 	100%
         * Pantser: 	80% 		Pantser: 	120%
         * winnaar: Wickedmen
         * De aanvaller heeft het gevecht gewonnen!
         * buit : 	1.377.538 metaal, 1.074.657 kristal en 544.996 deuterium.
         * puinveld : 	0 metaal en 0 kristal.
         * gerepareerd : 	?
         * Gedetailleerd gevechtsrapport >> 
         */
        
        /**
         * De aanvaller heeft het gevecht gewonnen! De aanvaller steelt
         * 115.320.696 metaal, 29.494.741 kristal en 56.999.602 deuterium.
         * 
         * De aanvaller heeft een totaal van 3.970.546.000 eenheden verloren.
         * De verdediger heeft een totaal van 15.036.674.000 eenheden verloren.
         * Op deze cordinaten in de ruimte zweven nu 3.524.799.000 metaal en
         * 1.827.296.400 kristal.
         */
        
        /**
         * This is for the advanced overview, simple and advanced can be used
         * the system will check this by itself.
         * 
         * Advanced method
         */
        $advancedSource = preg_replace( '/'.$regexes["print"].'/', ' ', $source);
        
        $advancedRegex  = $regexes['advanced_raid'];
        $advancedMatches = array();
        preg_match_all('/' . $advancedRegex . '/i', $advancedSource, $advancedMatches, PREG_SET_ORDER);
        /**
         * Simple method
         */
        
        $regex = $regexes['simple_raid'];
        $matches = array();
        preg_match_all('/' . $regex . '/i', $source, $matches, PREG_SET_ORDER);
        
        if (count($advancedMatches) > 0) {
            foreach ($advancedMatches as $match) {
                $raids[] = new Default_Model_Raid(
                    (float) str_replace('.', '', $match[1]), // Metal
                    (float) str_replace('.', '', $match[2]), // Cristal
                    (float) str_replace('.', '', $match[3]), // Deuterium
                    (float) str_replace('.', '', $match[4]), // Attacker units losts
                    (float) str_replace('.', '', $match[5]), // Defender units losts
                    (float) str_replace('.', '', $match[6]), // Debris metal
                    (float) str_replace('.', '', $match[7])  // Debris kristal
                );
                
            }
        } else {
            foreach ($matches as $match) {
                $raids[] = new Default_Model_Raid(
                    (float) str_replace('.', '', $match[1]), // metal
                    (float) str_replace('.', '', $match[2]), // Cristal
                    (float) str_replace('.', '', $match[3]), // Deuterium
                    0, 0 // temporarily, the attacker and defender losses will be 0
                         // until we implement good support for this
                );
            }
        }

        return $raids;
    }
}
