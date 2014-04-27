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

$dfAttackers = count($self->_report->getAttackers()->getHarvestReports());
$dfDefenders = count($self->_report->getDefenders()->getHarvestReports());

if ( $dfAttackers > 0){
?>
	_____________________________________
	
	[b]<?= $self->translate("Harvested by the attackers") ?>[/b]
	
<?php
	foreach ($self->_report->getAttackers()->getHarvestReports() as $hr){ 
?>
        <?= $self->translate("Your ") . $self->colorNumber($hr->getRecyclers(), '#FC850C') . $self->translate(" recycler(s) have a total cargo capacity of ") . $self->colorNumber($hr->getCapacity(), '#FC850C') ?>.
        <?= $self->translate("At the target, ") . $self->colorNumber($hr->getFieldMetal(), '#FC850C') . $self->translate(" metal and ") . $self->colorNumber($hr->getFieldCrystal(), '#FC850C') . $self->translate(" crystal are floating in space.") . "\n" ?>
        <?= $self->translate("You have harvested %s metal and %s crystal.", $self->colorNumber($hr->getMetal(), '#FC850C'), $self->colorNumber($hr->getCrystal(), '#FC850C')) ?>

		<?php $percent = (($hr->getFieldMetal() + $hr->getFieldCrystal()) > 0) ? ($hr->getMetal() + $hr->getCrystal()) / ($hr->getFieldMetal() + $hr->getFieldCrystal()) * 100 : 0 ?>
<?= $self->translate("Recycled: ") . $self->colorNumber($percent, '#FC850C') ?>%
	__________________________
	
<?php 
	} 
} 
if ( $dfDefenders > 0){
	if ( $dfAttackers == 0){
?>
	_____________________________________
	
<?php } ?>
	[b]<?= $self->translate("Harvested by the defenders") ?>[/b]
	
<?php
	foreach ($self->_report->getDefenders()->getHarvestReports() as $hr){ 
?>
        <?= $self->translate("Your ") . $self->colorNumber($hr->getRecyclers(), '#FC850C') . $self->translate(" recycler(s) have a total cargo capacity of ") . $self->colorNumber($hr->getCapacity(), '#FC850C') ?>.
        <?= $self->translate("At the target, ") . $self->colorNumber($hr->getFieldMetal(), '#FC850C') . $self->translate(" metal and ") . $self->colorNumber($hr->getFieldCrystal(), '#FC850C') . $self->translate(" crystal are floating in space.") . "\n" ?>
        <?= $self->translate("You have harvested %s metal and %s crystal.", $self->colorNumber($hr->getMetal(), '#FC850C'), $self->colorNumber($hr->getCrystal(), '#FC850C')) ?>

		<?php $percent = (($hr->getFieldMetal() + $hr->getFieldCrystal()) > 0) ? ($hr->getMetal() + $hr->getCrystal()) / ($hr->getFieldMetal() + $hr->getFieldCrystal()) * 100 : 0 ?>
<?= $self->translate("Recycled: ") . $self->colorNumber($percent, '#FC850C') ?>%
	__________________________

<?php 
	} 
} 

if ( $dfAttackers > 0){
?>
	<?= $self->translate("A total of ") . $self->colorNumber($self->data->totalDebrisAttackers, '#FC850C') . $self->translate(" units debris has been recycled by the attackers.") ?>
	
<?php 
}
if ( $dfDefenders > 0){
?>
	<?= $self->translate("A total of ") . $self->colorNumber($self->data->totalDebrisDefenders, '#FC850C') . $self->translate(" units debris has been recycled by the defenders.") ?>
	
<?php 
} 
?>