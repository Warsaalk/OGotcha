<?php 
	if( $self->hasInfo() ){
		foreach( $self->getInfo() as $i => $info ){
?>
		<div class="info">
			<div class="<?= $info->getType(); ?> clearfix">
				<div><img src="<?= $info->getImage(); ?>" alt="infoimg" /></div>
				<div><p><?= $info->getMessage(); ?></p></div>
			</div>
		</div>
<?php } } ?>