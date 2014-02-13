<?php
$rounds = $self->_report->getRounds();

$lastRound = $rounds[count($rounds) - 1];
$firstRound = $rounds[0];

$firstFleets = $firstRound->getAttackers();

foreach ($lastRound->getAttackers() as $key => $fleet){ 
	?>
	
	
    [color=black][b]<?= $self->translate("Attacker") ?>[/b][/color] [color=#ffff00][b]<?= $fleet->getPlayer() . "[/b][/color]\n" ?>
    [color=yellow]________________________________________________[/color]

    <?php 
	if (count($fleet->getShips()) < 1){ ?>
    [color=#ff0000][b]<?= $self->translate("Destroyed!") ?>[/b][/color]
    <?php 
	}else{
		if (isset($firstFleets[$key])){
			$oldFleet = $firstFleets[$key];
			foreach ($oldFleet->getShips() as $ship){
				print $self->formatShip(true, $ship, $fleet);
			} 
		}else{ 
			foreach ($fleet->getShips() as $ship){
				print $self->formatShip(true, $ship);
			} 
		}
	} 
	?>
    [color=yellow]_________________________________________[/color]
	
	<?php 
} 

$firstFleets = $firstRound->getDefenders();
foreach ($lastRound->getDefenders() as $key => $fleet){ 
	?>
    [color=black][b]<?= $self->translate("Defender") ?>[/b][/color] [color=#ffff00][b]<?= $fleet->getPlayer() . "[/b][/color]\n" ?>
    [color=yellow]________________________________________________[/color]
	
    <?php 
	if (count($fleet->getShips()) < 1){ ?>
    [color=#ff0000][b]<?= $self->translate("Destroyed!") ?>[/b][/color]
    <?php 
	}else{
		if (isset($firstFleets[$key])){
				$oldFleet = $firstFleets[$key];
				foreach ($oldFleet->getShips() as $ship){ 
					print $self->formatShip(false, $ship, $fleet);
				}
		}else{
			foreach ($fleet->getShips() as $ship){ 
				print $self->formatShip(false, $ship);
			}
		}
	} 
	?>
    [color=yellow]_________________________________________[/color]
	<?php 
}
?>

