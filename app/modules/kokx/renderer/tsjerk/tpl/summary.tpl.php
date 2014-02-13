<?php
if ($self->data->totalRaids > 0){
    print $self->translate("The attacker captured a total of %s units.", $self->colorNumber($self->data->totalRaids, '#ff00ff')) . "\n";
}
?>
	__________________

    [color=#ff0000][size=10][b]<?= $self->translate("Summary of profit/losses:") ?>[/b][/size][/color]
<?php
if ($self->_report->getWinner() == Default_Model_CombatReport::ATTACKER){
/*
The attacker lost a total of [color=#FC850C][b]13.920.000[/b][/color] units.
The defender made a profit of [color=#FC850C][b]2.197.700[/b][/color] units.
 */
// calculate the result
$attackerResult = $self->data->totalDebris + $self->data->totalRaids - $self->_report->getLossesAttacker();
$defenderResult = $self->_report->getLossesDefender();

	if ($attackerResult > 0){
        print $self->translate("The attacker made a profit of %s units.", $self->colorNumber(abs($attackerResult), '#ff00ff')) . "\n";
    }else{
		print $self->translate("The attacker lost a total of %s units.", $self->colorNumber(abs($attackerResult), '#ff00ff')) . "\n";
    }
    print $self->translate("The defender lost a total of %s units.", $self->colorNumber($defenderResult, '#ff00ff')) . "\n";
}elseif ($self->_report->getWinner() == Default_Model_CombatReport::DRAW){

// calculate the result
$attackerResult = $self->data->totalDebris + $self->data->totalRaids - $self->_report->getLossesAttacker();
$defenderResult = $self->_report->getLossesDefender();

	if ($attackerResult > 0){
        print $self->translate("The attacker made a profit of %s units.", $self->colorNumber(abs($attackerResult), '#ff00ff')) . "\n";
    }else{
        print $self->translate("The attacker lost a total of %s units.", $self->colorNumber(abs($attackerResult), '#ff00ff')) . "\n";
    }
    print $self->translate("The defender lost a total of %s units.", $self->colorNumber($defenderResult, '#ff00ff')) . "\n";
}else{ /* Defender is the winner */

// calculate the result
$attackerResult = $self->_report->getLossesAttacker();
$defenderResult = $self->data->totalDebris - $self->_report->getLossesDefender();

    print $self->translate("The attacker lost a total of %s units.", $self->colorNumber($attackerResult, '#ff00ff')) . "\n";
    if ($defenderResult > 0){
        print $self->translate("The defender made a profit of %s units.", $self->colorNumber(abs($defenderResult), '#ff00ff')) . "\n";
    }else{
        print $self->translate("The defender lost a total of %s units.", $self->colorNumber(abs($defenderResult), '#ff00ff')) . "\n";
    }
}

/* and a link to the Converter site*/
if ($self->data->totalFuel == 0) { 
?>

	[size=10][url=<?= __BASE_URL ?>]Converted by Kokx's CR Converter <?= __VERSION ?> (skin: Albert Fish)[/url][/size][/align]
<?php
}
?>
