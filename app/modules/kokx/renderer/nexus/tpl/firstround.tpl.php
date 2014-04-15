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


foreach ($rounds[0]->getAttackers() as $fleet){ 
	?>
	
    [color=black][b]<?= $self->translate("Attacker") ?>[/b][/color] [color=#ffff00][b]<?= $fleet->getPlayer() . "[/b][/color]\n" ?>
    [color=yellow]________________________________________________[/color]
	
    <?php 
	foreach ($fleet->getShips() as $ship){ 
		print $self->formatShip(true, $ship); 
    } 
	?>
    [color=yellow]_________________________________________[/color]
	
	<?php 
} 

foreach ($rounds[0]->getDefenders() as $fleet){ 
	?>
    [color=black][b]<?= $self->translate("Defender") ?>[/b][/color] [color=#ffff00][b]<?= $fleet->getPlayer() . "[/b][/color]\n" ?>
    [color=yellow]________________________________________________[/color]
	
    <?php 
	foreach ($fleet->getShips() as $ship){
		print $self->formatShip(false, $ship);
    } 
	?>
    [color=yellow]_________________________________________[/color]
	
	<?php 
} 
?>