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

$rounds = $self->_report->getRounds();

$lastRound = $rounds[count($rounds) - 1];
$firstRound = $rounds[0];

$firstFleets = $firstRound->getAttackers();

foreach ($lastRound->getAttackers() as $key => $fleet){ 
	?>
	
	
    [color=red][b]<?= $self->translate("Attacker") ?>[/b][/color] [size=12][b][color=#ff00ff]<?= $fleet->getPlayer() . "[/color][/b][/size]\n" ?>
    (6) [color=#ff99ff]________________________________________________[/color] (6)

    <?php 
	if (count($fleet->getShips()) < 1){ ?>
    [b][size=12][color=#ff0000]<?= $self->translate("Destroyed!") ?>[/color][/size][/b]
    <?php 
	}else{
		if (isset($firstFleets[$key])){
			$oldFleet = $firstFleets[$key];
			foreach ($oldFleet->getShips() as $ship){
				print $self->formatShip(true, $ship, $fleet);
			} 
		}else{ 
			foreach ($fleet->getShips() as $ship){
				print $self->formatShip(true, $ship);
			} 
		}
	} 
	?>
    (6) [color=#ff99ff]_________________________________________[/color] (6)
	
	<?php 
} 

$firstFleets = $firstRound->getDefenders();
foreach ($lastRound->getDefenders() as $key => $fleet){ 
	?>
    [color=green][b]<?= $self->translate("Defender") ?>[/b][/color] [size=12][b][color=#00ff00]<?= $fleet->getPlayer() . "[/color][/b][/size]\n" ?>
    [color=green]________________________________________________[/color]
	
    <?php 
	if (count($fleet->getShips()) < 1){ ?>
    [b][size=12][color=#ff0000]<?= $self->translate("Destroyed!") ?>[/color][/size][/b]
    <?php 
	}else{
		if (isset($firstFleets[$key])){
				$oldFleet = $firstFleets[$key];
				foreach ($oldFleet->getShips() as $ship){ 
					print $self->formatShip(false, $ship, $fleet);
				}
		}else{
			foreach ($fleet->getShips() as $ship){ 
				print $self->formatShip(false, $ship);
			}
		}
	} 
	?>
    [color=green]_________________________________________[/color]
	<?php 
}
?>

