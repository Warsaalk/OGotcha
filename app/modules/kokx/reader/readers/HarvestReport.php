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
 * @subpackage Readers
 */

/**
 * HR parser
 *
 * @category   Kokx
 * @package    Default
 * @subpackage Readers_Dutch
 */
class Kokx_Reader_HarvestReport
{

    /**
     * Parse a harvest report
     *
     * @param string $source
     *
     * @return array  of {@link Default_Model_HarvestReport}'s
     */
    public static function parse($source, $regexes)
    {
        
        /**
         * Fix for non printable characters
         * Edited on: 1/1/2013
         */
        
        $source = preg_replace( '/'.$regexes["print"].'/', '', $source);
        $reports = array();

        /**
         Example report:
		 
		 Je (1200) recycler(s) hebben een totale opslagcapaciteit van 24.000.000. 
		 In het bestemmingsveld [2:188:7] zweven 0 metaal en 5.000 kristal in de ruimte. 
		 Je hebt 0 metaal en 5.000 kristal opgehaald.
         */
        
        /*$regex  = 'Je \(([0-9.]*?)\) recycler\(s\) hebben een totale opslagcapaciteit van ([0-9.]*?).';
		$regex .= 'In het bestemmingsveld \[([0-9.]*?:[0-9.]*?:[0-9.]*?)\] zweven ([0-9.]*?) metaal en ([0-9.]*?) kristal in de ruimte.';
        $regex .= 'Je hebt ([0-9.]*?) metaal en ([0-9.]*?) kristal opgehaald.';*/
		
		$regex = $regexes['harvest'];

        $matches = array();

        preg_match_all('/' . $regex . '/i', $source, $matches, PREG_SET_ORDER);
		
        foreach ($matches as $match) {
            $reports[] = new Default_Model_HarvestReport(
                (float) str_replace('.', '', $match[1]),
                (float) str_replace('.', '', $match[2]),
                (float) str_replace('.', '', $match[3]),
                (float) str_replace('.', '', $match[4]),
                (float) str_replace('.', '', $match[5]),
                (float) str_replace('.', '', $match[6]),
		(float) str_replace('.', '', $match[7])
            );
        }

        return $reports;
    }
}
