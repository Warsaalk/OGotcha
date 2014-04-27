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

/*
Er is een totaal van [color=#FC850C][b]1.234.567[/b][/color] eenheden Deuterium gebruikt als brandstof voor de aanvallende vloten.
De aanvallende vloten hebben een totaal van [color=#FC850C][b]-1.234.567[/b][/color] eenheden Deuterium winst gemaakt.
 */

if ($self->data->totalFuel > 0) {
$WinLostDeut = ($self->_report->getDeuterium() + $self->data->raidDeutRes) - $self->data->totalFuel;

	if ($WinLostDeut > 0){ 
?>
Er is een totaal van <?= $self->colorNumber(abs($self->data->totalFuel), '#ff00ff') ?> eenheden Deuterium gebruikt als brandstof voor de aanvallende vloten.
De aanvallende vloten hebben een totaal van <?= $self->colorNumber(abs($WinLostDeut), '#ff00ff') ?> eenheden Deuterium winst gemaakt.
<?php
	}else{
?>
Er is een totaal van <?= $self->colorNumber(abs($self->data->totalFuel), '#ff00ff') ?> eenheden Deuterium gebruikt als brandstof voor de aanvallende vloten.
De aanvallende vloten hebben een totaal van <?= $self->colorNumber(abs($WinLostDeut), '#ff00ff') ?> eenheden Deuterium verlies gemaakt.
<?php
	}
?>

[size=10][url=<?= __BASE_URL ?>]Converted by OGotcha CR Converter <?= __VERSION ?> (skin: Albert Fish)[/url][/size][/align]

<?php
}
?>
