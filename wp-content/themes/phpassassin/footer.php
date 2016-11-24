<?php
$globalFields = (object) get_option('theme_settings');
?>

	<footer>
		<a href="#home" class="uparrow"></a>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-8 col-sm-12 content-left">
					<?= $globalFields->footer_content; ?>
				</div>
				<div class="col-md-4 col-sm-12 content-right">
					<h3 class="mbottom10">Contact</h3>
					You can email me via <br>
					<?= $globalFields->email; ?>
					<br><br>
					Telephone: <?= $globalFields->telephone; ?>
					<br><br>
					Mobile: <?= $globalFields->mobile; ?>
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>