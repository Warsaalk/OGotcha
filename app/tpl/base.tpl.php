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
				<h1><?= $self->getDict()->getVal("Kokx's OGame CR converter") ?> </h1>
				<div id="agslord"><a href="ags_winstverdeler_2013.xlsx">AGS Winstverdeler van Lord</a></div>
				<div class="clear"></div>
			</div>
			
			<div id="container">
				<?= $self->tpl->page; ?>
			</div>

		</div>
		
		<?= $self->tpl->footer; ?>
		
		<script>
		  /*(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-46271379-4', 'dijkman-winters.nl');
		  ga('send', 'pageview');
*/
		</script>
    </body>
</html>
