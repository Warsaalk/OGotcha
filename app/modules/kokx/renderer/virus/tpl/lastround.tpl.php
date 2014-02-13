<?php
$rounds = $self->_report->getRounds();

$lastRound = $rounds[count($rounds) - 1];
$firstRound = $rounds[0];

$firstFleets = $firstRound->getAttackers();

foreach ($lastRound->getAttackers() as $key => $fleet){ 
	?>
	
	
    [color=red][b]<?= $self->translate("Attacker") ?>[/b][/color] (6) <?= $fleet->getPlayer() . " (6)\n" ?>
    [color=red]________________________________________________[/color]

    <?php 
	if (count($fleet->getShips()) < 1){ ?>
    [b]<?= $self->translate("Destroyed!") ?>[/b]
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
    [color=blue]_________________________________________[/color]
	
	<?php 
} 

$firstFleets = $firstRound->getDefenders();
foreach ($lastRound->getDefenders() as $key => $fleet){ 
	?>
    [color=red][b]<?= $self->translate("Defender") ?>[/b][/color] :| <?= $fleet->getPlayer() . " :|\n" ?>
    [color=red]________________________________________________[/color]
	
    <?php 
	if (count($fleet->getShips()) < 1){ ?>
    [b]<?= $self->translate("Destroyed!") ?>[/b]
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
    [color=blue]_________________________________________[/color]
	<?php 
}
?>


