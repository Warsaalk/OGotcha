<?php
$rounds = $self->_report->getRounds();


foreach ($rounds[0]->getAttackers() as $fleet){ 
	?>
	
    [color=red][b]<?= $self->translate("Attacker") ?>[/b][/color] <?= $fleet->getPlayer() . "\n" ?>
    [color=red]________________________________________________[/color]
	
    <?php 
	foreach ($fleet->getShips() as $ship){ 
		print $self->formatShip(true, $ship); 
    } 
	?>
    [color=red]_________________________________________[/color]
	
	<?php 
} 

foreach ($rounds[0]->getDefenders() as $fleet){ 
	?>
    [color=green][b]<?= $self->translate("Defender") ?>[/b][/color] <?= $fleet->getPlayer() . "\n" ?>
    [color=green]________________________________________________[/color]
	
    <?php 
	foreach ($fleet->getShips() as $ship){
		print $self->formatShip(false, $ship);
    } 
	?>
    [color=green]_________________________________________[/color]
	
	<?php 
} 
?>