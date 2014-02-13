<?php
if (count($self->_report->getHarvestReports()) > 0){
	foreach ($self->_report->getHarvestReports() as $hr){ 
?>
		[color=yellow]_____________________________________[/color]

        <?= $self->translate("Your ") . $self->colorNumber($hr->getRecyclers()) . $self->translate(" recycler(s) have a total cargo capacity of ") . $self->colorNumber($hr->getCapacity()) ?>.
        <?= $self->translate("At the target, ") . $self->colorNumber($hr->getFieldMetal()) . $self->translate(" metal and ") . $self->colorNumber($hr->getFieldCrystal()) . $self->translate(" crystal are floating in space.") . "\n" ?>
        <?= $self->translate("You have harvested %s metal and %s crystal.", $self->colorNumber($hr->getMetal()), $self->colorNumber($hr->getCrystal())) ?>

		<?php $percent = (($hr->getFieldMetal() + $hr->getFieldCrystal()) > 0) ? ($hr->getMetal() + $hr->getCrystal()) / ($hr->getFieldMetal() + $hr->getFieldCrystal()) * 100 : 0 ?>
		<?= $self->translate("Recycled: ") . $self->colorNumber($percent) ?>%
<?php 
	} 
?>
    [color=yellow]__________________________[/color]

	<?= $self->translate("A total of ") . $self->colorNumber($self->data->totalDebris) . $self->translate(" units debris has been recycled.") ?>

<?php 
} 
?>
