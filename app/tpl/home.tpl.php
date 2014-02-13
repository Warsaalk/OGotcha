<?php
	$vl = $self->getMain()->getValidator();
	$st = $self->getMain()->getStore();
?>		
		<form method="post" action="">
			<input type="hidden" name="cmd" value="cr" />
			<div id="cr-container">
				<?= $self->tpl->info; ?>
				<div id="cr-left" class="cr-textareas">
					<textarea name="report" id="cr-input" rows="24" cols="80"><?= $vl->getVariable('report','value') ?></textarea>
				</div>
				<div id="cr-right" class="cr-textareas">
					<div id="cr-title"><span><?= $self->getDict()->getVal("Title:"); ?></span><input type="text" name="title" id="title" value="<?= $st->get('result-title') ?>" style="width: 350px;"></div>
					<div class="clear"></div>
					<textarea name="output" id="cr-output" rows="24" cols="80"><?= $st->get('result-content') ?></textarea>
				</div>
				<div class="clear"></div>
			</div>
			<div id="submit-container">
				<input type="submit" name="submit" id="submit" value="<?= $self->getDict()->getVal("Convert") ?>">
				<?php if($st->get('result-preview')!=''){ ?>
					<div id="goto-preview"><a href="#preview-container"><?= $self->getDict()->getVal("Preview") ?></a></div>
					<div class="clear"></div>
				<?php } ?>
			</div>
			<div id="options-container">
				<div class="option">
					<h2><?= $self->getDict()->getVal("Generic options") ?></h2>
					<table id="option-table" border="0">
						<tr>
							<td><label for="theme"><?= $self->getDict()->getVal("Skin") ?>:</label></td>
							<td>
								<select name="theme" id="theme">
								<?php
								foreach( $st->get('themes') as $key => $label ){
									
										$option = '<option value="'.$key.'" label="'.$label.'"' ;
										if( $vl->getVariable('theme','value') == $key )
											$option .=  ' selected="selected" ' ;
										$option .= '>'.$label.'</option>' ;
										print $option;
								
								}
								?>
								</select>
							</td>
							<td><label for="hidetime"><?= $self->getDict()->getVal("Hide the time") ?>:</label></td>
							<td><input type="checkbox" name="hidetime" id="hidetime" value="1" <?php if( $vl->getVariable('hidetime','value') == '1' || $vl->getVariable('hidetime','value') == null ) print 'checked="checked"'; ?>></td>
						</tr>
						<tr>
							<td><label for="middletext"><?= $self->getDict()->getVal("Text in the middle of the CR") ?>:</label></td>
							<td><input type="text" name="middletext" id="middletext" value="<?php if( $vl->getVariable('middletext','value') == null  ){ print $self->getDict()->getVal("After the battle"); }else{ print $vl->getVariable('middletext','value'); } ?>"></td>
							<td><label for="merge"><?= $self->getDict()->getVal("Merge fleets of the same player") ?>:</label></td>
							<td><input type="checkbox" name="merge" id="merge_fleets" value="1" <?php if( $vl->getVariable('merge','value') == '1' || $vl->getVariable('merge','value') == null ) print 'checked="checked"'; ?>></td>
						</tr>
					</table>
				</div>
				<div class="option">
					<h2><?= $self->getDict()->getVal("Raids") ?></h2>
					<textarea name="raids" id="raids" rows="5" cols="100"><?= $vl->getVariable('raids','value') ?></textarea>
				</div>
				<div class="option">
					<h2><?= $self->getDict()->getVal("Harvest Reports") ?></h2>
					<textarea name="harvest" id="harvest_reports" rows="5" cols="100"><?= $vl->getVariable('harvest','value') ?></textarea>
				</div>
				<div class="option">
					<h2><?= $self->getDict()->getVal("Deuterium Costs") ?></h2>
					<textarea name="deuterium" id="deuterium" rows="5" cols="100"><?= $vl->getVariable('deuterium','value') ?></textarea>
				</div>
			</div>
			<?php if($st->get('result-preview')!=''){ ?>
			<div id="preview-container">
				<h1><?= $self->getDict()->getVal("Preview") ?></h1>
				<div id="preview">
					<?=  $st->get('result-preview') ?>
				</div>
			</div>
			<?php } ?>
		</form>
