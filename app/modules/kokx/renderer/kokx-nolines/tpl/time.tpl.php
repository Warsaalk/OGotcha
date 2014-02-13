[align=center]
<?php
print $self->translate("On ");
$time = $self->_report->getTime();
if ($self->data->hideTime) {
    print $time->format('d-m-Y --:--:--');
} else {
    print $time->format('d-m-Y H:i:s');
}

$rounds = $self->_report->getRounds();
print $self->translate(" , the following fleets met in battle:");
?>

