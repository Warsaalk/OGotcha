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

$regexes['print'] = '[^[:print:]]';

//Fuel Regex
$regexes['fuel'] = '([0-9.]*?) Deuterium';

//Raid Regex
$regexes['advanced_raid'] = 'The attacker has won the battle\!';
$regexes['advanced_raid'] .= '\s*He captured ([0-9.]*) metal, ([0-9.]*) crystal and ([0-9.]*) deuterium\.';
$regexes['advanced_raid'] .= '\s*The attacker lost a total of ([0-9.]*) units\.';
$regexes['advanced_raid'] .= '\s*The defender lost a total of ([0-9.]*) units\.';
$regexes['advanced_raid'] .= '\s*At these space coordinates now float ([0-9.]*) metal and ([0-9.]*) crystal\.';
$regexes['simple_raid'] = '([0-9.]*) metal, ([0-9.]*) crystal and ([0-9.]*) deuterium';

//Harvest Regex
$regexes['harvest'] = 'Your\s*recycler\(s\)\s*\(([0-9.]*?)\)\s*have\s*a\s*total\s*cargo\s*capacity\s*of\s*([0-9.]*?).\s*';
$regexes['harvest'] .= 'At\s*the\s*target\s*\[([0-9.]*?:[0-9.]*?:[0-9.]*?)\],\s*([0-9.]*?)\s*metal\s*and\s*([0-9.]*?)\s*crystal\s*are\s*floating\s*in\s*space.\s*';
$regexes['harvest'] .= 'You\s*have\s*harvested\s*([0-9.]*?)\s*metal\s*and\s*([0-9.]*?)\s*crystal.';

//Combat Regex
$regexes['start'] = 'On';
$regexes['time'] = '^On \(([0-9]{2}).([0-9]{2}).([0-9]{4}) ([0-9]{2}):([0-9]{2}):([0-9]{2})\) the following fleets met in battle';
$regexes['round'] = '(Attacker|Defender) (.*?)\s+\[([0-9]:[0-9]{1,3}:[0-9]{1,2})\]';

//Combat Round Regex
$regexes['round_start'] = 'Attacker';
$regexes['round_fleet'] = '.*?(Attacker|Defender) ([^\n\r]*?)(\s*?\[([0-9]:[0-9]{1,3}:[0-9]{1,2})\])?';
$regexes['round_fleet'] .= '(\s*?Weapons: ([0-9]{0,2})0% Shields: ([0-9]{0,2})0% Armour: ([0-9]{0,2})0%)?\s*';
$regexes['round_fleet'] .= '(Type([A-Za-z.\-\s]*)\s*' . 'Total([0-9.\s]*).*?Weapons' . '|destroyed.)\s*';
$regexes['round_fleet'] .= '.*?(?=Attacker|Defender)';
$regexes['battle_end'] = 'destroyed.';
$regexes['attacker'] = 'attacker';

//Combat ships Regex
$regexes['ship_sc'] = 's.cargo';
$regexes['ship_lc'] = 'l.cargo';
$regexes['ship_lf'] = 'l.fighter';
$regexes['ship_hf'] = 'h.fighter';
$regexes['ship_xx'] = 'cruiser';
$regexes['ship_bs'] = 'battleship';
$regexes['ship_col'] = 'col.ship';
$regexes['ship_rec'] = 'recy.';
$regexes['ship_spio'] = 'esp.probe';
$regexes['ship_bb'] = 'bomber';
$regexes['ship_sol'] = 'sol.sat';
$regexes['ship_des'] = 'dest.';
$regexes['ship_rip'] = 'deathstar';
$regexes['ship_bc'] = 'battlecr.';

//Combat defences Regex
$regexes['def_rl'] = 'r.launcher';
$regexes['def_ll'] = 'l.laser';
$regexes['def_hl'] = 'h.laser';
$regexes['def_gauss'] = 'gauss';
$regexes['def_ion'] = 'ionc.';
$regexes['def_plasma'] = 'plasma';
$regexes['def_ssd'] = 's.dome';
$regexes['def_lsd'] = 'l.dome';

//Combat Result Regex
$regexes['won'] = 'has won the battle';
$regexes['won_attacker'] = 'attacker has won the battle';
$regexes['steals'] = 'He captured\s*?([0-9.]*) metal, ([0-9.]*) crystal and ([0-9.]*) deuterium';

$regexes['lost_attacker'] = 'The attacker lost a total of ([0-9.]*) units.';
$regexes['lost_defender'] = 'The defender lost a total of ([0-9.]*) units.';
$regexes['debris'] = 'At these space coordinates now float ([0-9.]*) metal and ([0-9.]*) crystal.';
$regexes['moon_chance'] = 'The chance for a moon to be created is ([0-9]{1,2})';
$regexes['moon'] = 'form a moon around the planet.';
