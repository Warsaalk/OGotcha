<?php
$rounds = $self->_report->getRounds();

foreach ($rounds[0]->getAttackers() as $fleet){ 
	?>
	
    [color=red][b]<?= $self->translate("Attacker") ?>[/b][/color] <?= $fleet->getPlayer() . "\n" ?>
	
    <?php 
	foreach ($fleet->getShips() as $ship){ 
		print $self->formatShip(true, $ship); 
    } 
} 

foreach ($rounds[0]->getDefenders() as $fleet){ 
	?>
	
    [color=green][b]<?= $self->translate("Defender") ?>[/b][/color] <?= $fleet->getPlayer() . "\n" ?>
	
    <?php 
	foreach ($fleet->getShips() as $ship){
		print $self->formatShip(false, $ship);
    } 
} 
?>