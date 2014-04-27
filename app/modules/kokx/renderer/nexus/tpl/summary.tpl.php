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

if ($self->data->totalFuelAttackers > 0){
	print $self->translate("The attacker(s) used a total of %s units fuel.", $self->colorNumber($self->data->totalFuelAttackers)) . "\n";
}
if ($self->data->totalFuelDefenders > 0){
	print $self->translate("The defender(s) used a total of %s units fuel.", $self->colorNumber($self->data->totalFuelDefenders)) . "\n";
}
if ($self->data->totalRaids > 0){
    print $self->translate("The attacker captured a total of %s units.", $self->colorNumber($self->data->totalRaids)) . "\n";
}
?>
	[color=yellow]__________________[/color]

    [size=16][b]<?= $self->translate("Summary of profit/losses:") ?>[/b][/size]
<?php
/*
The attacker lost a total of [color=#FC850C][b]13.920.000[/b][/color] units.
The defender made a profit of [color=#FC850C][b]2.197.700[/b][/color] units.
 */

	if ($self->data->attackerResult > 0){
        print $self->translate("The attacker made a profit of %s units.", $self->colorNumber(abs($self->data->attackerResult))) . "\n";
    }else{
		print $self->translate("The attacker lost a total of %s units.", $self->colorNumber(abs($self->data->attackerResult))) . "\n";
    }
	if ($self->data->defenderResult > 0){
        print $self->translate("The defender made a profit of %s units.", $self->colorNumber(abs($self->data->defenderResult))) . "\n";
    }else{
        print $self->translate("The defender lost a total of %s units.", $self->colorNumber(abs($self->data->defenderResult))) . "\n";
    }

?>

	[size=10][url=<?= __BASE_URL ?>]Converted by OGotcha CR Converter <?= __VERSION ?> (skin: Nexus)[/url][/size][/align]