<?php
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