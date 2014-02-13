<?php
if (count($self->_report->getHarvestReports()) > 0){
	foreach ($self->_report->getHarvestReports() as $hr){ 
?>
		_____________________________________

        <?= $self->translate("Your ") . $self->colorNumber($hr->getRecyclers(), '#ff00ff') . $self->translate(" recycler(s) have a total cargo capacity of ") . $self->colorNumber($hr->getCapacity(), '#ff00ff') ?>.
        <?= $self->translate("At the target, ") . $self->colorNumber($hr->getFieldMetal(), '#ff00ff') . $self->translate(" metal and ") . $self->colorNumber($hr->getFieldCrystal(), '#ff00ff') . $self->translate(" crystal are floating in space.") . "\n" ?>
        <?= $self->translate("You have harvested %s metal and %s crystal.", $self->colorNumber($hr->getMetal(), '#ff00ff'), $self->colorNumber($hr->getCrystal(), '#ff00ff')) ?>

		<?php $percent = (($hr->getFieldMetal() + $hr->getFieldCrystal()) > 0) ? ($hr->getMetal() + $hr->getCrystal()) / ($hr->getFieldMetal() + $hr->getFieldCrystal()) * 100 : 0 ?>
		<?= $self->translate("Recycled: ") . $self->colorNumber($percent, '#009900') ?>%
<?php 
	} 
?>
    __________________________

	<?= $self->translate("A total of ") . $self->colorNumber($self->data->totalDebris, '#ff00ff') . $self->translate(" units debris has been recycled.") ?>

<?php 
} 
?>
