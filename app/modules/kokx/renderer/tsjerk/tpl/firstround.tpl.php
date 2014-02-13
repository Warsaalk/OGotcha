<?php
$rounds = $self->_report->getRounds();


foreach ($rounds[0]->getAttackers() as $fleet){ 
	?>
	
    [color=red][b]<?= $self->translate("Attacker") ?>[/b][/color] [b][size=12][color=#ff00ff]<?= $fleet->getPlayer() . "[/color][/size][/b]\n" ?>
    (6) [color=#ff99ff]________________________________________________[/color] (6)
	
    <?php 
	foreach ($fleet->getShips() as $ship){ 
		print $self->formatShip(true, $ship); 
    } 
	?>
    (6)[color=#ff99ff]_________________________________________ [/color](6)
	
	<?php 
} 

foreach ($rounds[0]->getDefenders() as $fleet){ 
	?>
    [color=green][b]<?= $self->translate("Defender") ?>[/b][/color] [size=12][b][color=#00ff00]<?= $fleet->getPlayer() . "[/color][/size][/b]\n" ?>
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