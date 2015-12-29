<?php
script('pilotlogbook', 'script');
script('pilotlogbook', 'datatables');
style('pilotlogbook', 'style');
?>

<div id="app">
	<div id="app-navigation">
		<?php print_unescaped($this->inc('part.navigation')); ?>
		<?php print_unescaped($this->inc('part.settings')); ?>
	</div>

	<div id="app-content">
		<h1><?php p($_['user']) ?>'s Pilot Logbook</h1>
		<div id="app-content-wrapper">
			<?php print_unescaped($this->inc('part.log')); ?>
		</div>
	</div>
</div>
