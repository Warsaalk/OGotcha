<?php if( $self->hasInfo() ){ 
			foreach( $self->getInfo() as $i => $info ){
?>
				<div class="info">
					<div class="<?php print $info->getType(); ?> clearfix">
						<div><img src="<?php print $info->getImage(); ?>" alt="infoimg" /></div>
						<div><p><?php print $info->getMessage(); ?></p></div>
					</div>
				</div>
<?php } } ?>