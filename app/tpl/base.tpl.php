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
?>
<!doctype html>
<html>
	<?= $self->tpl->head; ?>
	<body>
		<div id="main-container">
			<div id="lang">
				<div id="lang-nl" class="lang<?= ($self->getMain()->getLang() == 'nl') ? ' lang-selected' : ''; ?>">
					<a href="<?= $self->getLanguageLink('nl') ?>">
						<div><img src="<?= __IMAGES ?>flags/Netherlands-Flag.png" alt="Netherlands" /></div>
						<div><?= $self->getDict()->getVal("Dutch") ?></div>
					</a>
				</div>
				<div id="lang-en" class="lang<?= ($self->getMain()->getLang() == 'en') ? ' lang-selected' : ''; ?>">
					<a href="<?= $self->getLanguageLink('en') ?>">
						<div><img src="<?= __IMAGES ?>flags/United-Kingdom-flag.png" /></div>
						<div><?= $self->getDict()->getVal("English") ?></div>
					</a>
				</div>
				<div class="clear"></div>
			</div>
			<div id="header">
				<h1><?= $self->getDict()->getVal("OGotcha") ?> </h1>
				<?php if($self->getMain()->getLang() == 'nl'){?>
				<div id="agslord"><a href="ags_winstverdeler_2013.xlsx">AGS Winstverdeler van Lord</a></div>
				<?php } ?>
				<div class="clear"></div>
			</div>
			
			<div id="container">
				<?= $self->tpl->page; ?>
			</div>

		</div>
		
		<?= $self->tpl->footer; ?>
		<?= $self->tpl->googleAnalytics; ?>
    </body>
</html>
