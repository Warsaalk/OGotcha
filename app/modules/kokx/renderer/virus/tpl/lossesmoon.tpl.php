<?php
print $self->translate("The attacker lost a total of %s units.", $self->colorNumber($self->_report->getLossesAttacker())) . "\n";
print $self->translate("The defender lost a total of %s units.", $self->colorNumber($self->_report->getLossesDefender()), 'white') . "\n";
print $self->translate("At these space coordinates now float ") . $self->colorNumber($self->_report->getDebrisMetal(), 'blue') . " " . $self->translate("metal") . " " . $self->translate("and") . " " . $self->colorNumber($self->_report->getDebrisCrystal(), 'blue') . " " . $self->translate("crystal.") . "\n";
if ($self->_report->getMoonChance() > 0){
    print $self->translate("The chance for a moon to be created is: ") . $self->colorNumber($self->_report->getMoonChance()) . " %\n";
}
if ($self->_report->getMoonGiven()){
	print $self->translate("The enormous amounts of free metal and crystal draw together and form a moon around the planet: ") . "[color=white][b]" . $self->translate("Moon given!") . "[/b][/color]\n";
}