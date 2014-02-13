<?php
if ($self->_report->getWinner() == Default_Model_CombatReport::DRAW){
    print $self->translate("The battle ends in a draw.") . "\n";
}elseif ($self->_report->getWinner() == Default_Model_CombatReport::ATTACKER){
    print $self->translate("The attacker has won the battle!") . "\n";
}else{
    print $self->translate("The defender has won the battle!") . "\n";
}
print $self->translate("The attacker captured:") . "\n";
if ($self->_report->getWinner() == Default_Model_CombatReport::ATTACKER){ ?>
<?= $self->colorNumber($self->_report->getMetal()) ?> <?= $self->translate("metal") ?>, <?= $self->colorNumber($self->_report->getCrystal()) ?> <?= $self->translate("crystal") ?> <?= $self->translate("and") ?> <?= $self->colorNumber($self->_report->getDeuterium()) ?> <?= $self->translate("deuterium") . "\n" ?>
<?php
	foreach ($self->_report->getRaids() as $raid){ 
?>
    <?= $self->colorNumber($raid->getMetal()) ?> <?= $self->translate("metal") ?>, <?= $self->colorNumber($raid->getCrystal()) ?> <?= $self->translate("crystal") ?> <?= $self->translate("and") ?> <?= $self->colorNumber($raid->getDeuterium()) ?> <?= $self->translate("deuterium") . "\n" ?>
<?php
	}
}else{ ?>
- <?= $self->translate("metal") ?>, - <?= $self->translate("crystal") ?> <?= $self->translate("and") ?> - <?= $self->translate("deuterium") ?>
<?php
}
?>

