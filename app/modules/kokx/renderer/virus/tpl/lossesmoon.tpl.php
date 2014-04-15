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

print $self->translate("The attacker lost a total of %s units.", $self->colorNumber($self->_report->getLossesAttacker())) . "\n";
print $self->translate("The defender lost a total of %s units.", $self->colorNumber($self->_report->getLossesDefender()), 'white') . "\n";
print $self->translate("At these space coordinates now float ") . $self->colorNumber($self->_report->getDebrisMetal(), 'blue') . " " . $self->translate("metal") . " " . $self->translate("and") . " " . $self->colorNumber($self->_report->getDebrisCrystal(), 'blue') . " " . $self->translate("crystal.") . "\n";
if ($self->_report->getMoonChance() > 0){
    print $self->translate("The chance for a moon to be created is: ") . $self->colorNumber($self->_report->getMoonChance()) . " %\n";
}
if ($self->_report->getMoonGiven()){
	print $self->translate("The enormous amounts of free metal and crystal draw together and form a moon around the planet: ") . "[color=white][b]" . $self->translate("Moon given!") . "[/b][/color]\n";
}