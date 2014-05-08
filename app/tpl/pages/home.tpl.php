<?php
/**   OGotcha, a combat report converter for Ogame
 *    Copyright (C) 2014  Klaas Van Parys
 *
 *   This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *   This program is based on the Kokx's CR Converter © 2009 kokx: https://github.com/kokx/kokx-converter
 *   
 *   This file is not part of the original program and therefore it only inherits this copyright: Copyright (C) 2014 Klaas Van Parys
 */

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
					<div id="cr-title"><span><?= $self->getDict()->getVal("Title:"); ?></span><input placeholder="<?= $self->getDict()->getVal("Title Placeholder") ?>" text" name="title" id="title" value="<?= $st->get('result-title') ?>" style="width: 350px;"></div>
					<div class="clear"></div>
					<textarea placeholder="<?= $self->getDict()->getVal("Result Placeholder") ?>" name="output" id="cr-output" rows="24" cols="80"><?= $st->get('result-content') ?></textarea>
				</div>
				<div class="clear"></div>
			</div>
			<div id="submit-container" class="clearfix">
				<input type="submit" name="submit" id="submit" value="<?= $self->getDict()->getVal("Convert") ?>">
				<?php if($st->get('result-preview')!=''){ ?>
					<div id="goto-preview"><a href="<?= $self->makeAnchor("preview-container") ?>"><?= $self->getDict()->getVal("Preview") ?></a></div>
				<?php } ?>
			</div>
			<div id="options-container" class="outer-block">
				<div class="option inner-block">
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
						<tr>
							<td><label for="advanced"><s><?= $self->getDict()->getVal("Show advanced summary") ?>: <?= $self->getDict()->getVal("New") ?></s></label></td>
							<td><input type="checkbox" name="advanced" id="advanced" value="1" <?php if( $vl->getVariable('advanced','value') == '1' ) print 'checked="checked"'; ?>></td>
							<td><label for="spoiler"><?= $self->getDict()->getVal("Use spoilers for harvest reports") ?>:</label> <?= $self->getDict()->getVal("New") ?></td>
							<td><input type="checkbox" name="spoiler" id="quotes" value="1" <?php if( $vl->getVariable('spoiler','value') == '1' ) print 'checked="checked"'; ?>></td>
						</tr>
					</table>
				</div>
				<div class="option inner-block">
					<h2><?= $self->getDict()->getVal("Raids") ?></h2>
					<textarea name="raids" id="raids" rows="5" cols="100"><?= $vl->getVariable('raids','value') ?></textarea>
				</div>
				<div class="players clearfix">
					<div class="player attacker">
						<h1><?= $self->getDict()->getVal("Attackers") ?></h1>
						<div class="option inner-block">
							<h2><?= $self->getDict()->getVal("Harvest Reports") ?></h2>
							<textarea name="attacker_harvest" id="attacker_harvest_reports" rows="5" cols="100"><?= $vl->getVariable('attacker_harvest','value') ?></textarea>
						</div>
						<div class="option inner-block">
							<h2><?= $self->getDict()->getVal("Deuterium Costs") ?></h2>
							<textarea name="attacker_deuterium" id="attacker_deuterium" rows="5" cols="100"><?= $vl->getVariable('attacker_deuterium','value') ?></textarea>
						</div>
					</div>
					<div class="player defender">
						<h1><?= $self->getDict()->getVal("Defenders") ?></h1>
						<div class="option inner-block">
							<h2><?= $self->getDict()->getVal("Harvest Reports") ?></h2>
							<textarea name="defender_harvest" id="defender_harvest_reports" rows="5" cols="100"><?= $vl->getVariable('defender_harvest','value') ?></textarea>
						</div>
						<div class="option inner-block">
							<h2><?= $self->getDict()->getVal("Deuterium Costs") ?></h2>
							<textarea name="defender_deuterium" id="defender_deuterium" rows="5" cols="100"><?= $vl->getVariable('defender_deuterium','value') ?></textarea>
						</div>
					</div>
				</div>
			</div>
			<?php if($st->get('result-preview')!=''){ ?>
			<div id="preview-container" class="outer-block">
				<h1><?= $self->getDict()->getVal("Preview") ?></h1>
				<?php if( $vl->getVariable('spoiler','value') == '1' ) {?>
				<h3 style="margin-top:10px"><?= $self->getDict()->getVal("Preview spoiler") ?></h3>
				<?php } ?>
				<div id="preview">
					<?=  $st->get('result-preview') ?>
				</div>
			</div>
			<?php } ?>
		</form>
