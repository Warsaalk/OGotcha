<!doctype html>
<html>
	<?= $self->tpl->head; ?>
	<body>
		<div id="main-container">
			<div id="lang">
				<div id="lang-nl" class="lang<?= ($self->getMain()->getLang() == 'nl') ? ' lang-selected' : ''; ?>">
					<a href="nl">
						<div><img src="<?= __IMAGES ?>flags/Netherlands-Flag.png" alt="Netherlands" /></div>
						<div><?= $self->getDict()->getVal("Dutch") ?></div>
					</a>
				</div>
				<div id="lang-en" class="lang<?= ($self->getMain()->getLang() == 'en') ? ' lang-selected' : ''; ?>">
					<a href="en">
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
