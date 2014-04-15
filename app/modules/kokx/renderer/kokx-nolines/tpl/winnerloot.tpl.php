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

if ($self->_report->getWinner() == Default_Model_CombatReport::DRAW){
    print $self->translate("The battle ends in a draw.") . "\n";
}elseif ($self->_report->getWinner() == Default_Model_CombatReport::ATTACKER){
    print $self->translate("The attacker has won the battle!") . "\n";
}else{
    print $self->translate("The defender has won the battle!") . "\n";
}
print $self->translate("The attacker captured:") . "\n";
if ($self->_report->getWinner() == Default_Model_CombatReport::ATTACKER){ ?>
<?= $self->colorNumber($self->_report->getMetal()) ?> <?= $self->translate("metal") ?>, <?= $self->colorNumber($self->_report->getCrystal()) ?> <?= $self->translate("crystal") ?> <?= $self->translate("and") ?> <?= $self->colorNumber($self->_report->getDeuterium()) ?> <?= $self->translate("deuterium") . "\n" ?>
<?php
	foreach ($self->_report->getRaids() as $raid){ 
?>
    <?= $self->colorNumber($raid->getMetal()) ?> <?= $self->translate("metal") ?>, <?= $self->colorNumber($raid->getCrystal()) ?> <?= $self->translate("crystal") ?> <?= $self->translate("and") ?> <?= $self->colorNumber($raid->getDeuterium()) ?> <?= $self->translate("deuterium") . "\n" ?>
<?php
	}
}else{ ?>
- <?= $self->translate("metal") ?>, - <?= $self->translate("crystal") ?> <?= $self->translate("and") ?> - <?= $self->translate("deuterium") ?>
<?php
}
?>

