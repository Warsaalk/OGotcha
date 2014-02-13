<?php
/*
Er is een totaal van [color=#FC850C][b]1.234.567[/b][/color] eenheden Deuterium gebruikt als brandstof voor de aanvallende vloten.
De aanvallende vloten hebben een totaal van [color=#FC850C][b]-1.234.567[/b][/color] eenheden Deuterium winst gemaakt.
 */

if ($self->data->totalFuel > 0) {
$WinLostDeut = ($self->_report->getDeuterium() + $self->data->raidDeutRes) - $self->data->totalFuel;

	if ($WinLostDeut > 0){ 
?>
Er is een totaal van <?= $self->colorNumber(abs($self->data->totalFuel), '#FC850C') ?> eenheden Deuterium gebruikt als brandstof voor de aanvallende vloten.
De aanvallende vloten hebben een totaal van <?= $self->colorNumber(abs($WinLostDeut), '#FC850C') ?> eenheden Deuterium winst gemaakt.
<?php
	}else{
?>
Er is een totaal van <?= $self->colorNumber(abs($self->data->totalFuel), '#FC850C') ?> eenheden Deuterium gebruikt als brandstof voor de aanvallende vloten.
De aanvallende vloten hebben een totaal van <?= $self->colorNumber(abs($WinLostDeut), '#FC850C') ?> eenheden Deuterium verlies gemaakt.
<?php
	}
?>

[size=10][url=<?= __BASE_URL ?>]Converted by Kokx's CR Converter <?= __VERSION ?> (skin: vii)[/url][/size][/align]

<?php
}
?>
