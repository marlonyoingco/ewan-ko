<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="initial-scale=1.0" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<!--[if IE]><link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/images/logo.png"><![endif]-->
	<link rel="icon" href="<?php echo get_template_directory_uri() ?>/assets/images/logo.png">
	<?php wp_head(); ?>
</head>

<?php
$pageMeta     = get_post_meta(get_the_ID());
$globalFields = (object) get_option('theme_settings');
?>

<body>
	<div class="red-strip"></div>

	<header data-section="home">
		<div id="menu-icon">
			<i class="fa fa-bars"></i>
		</div>
		<div id="floating-menu">
			<?php
				wp_nav_menu([
					'container'      => false,
					'menu_class'     => 'header-nav no-margin',
					'theme_location' => 'header',
				]);
			?>
		</div>

		<div class="row">
			<div class="col-md-10 col-sm-6 col-xs-6 col-xxs-12 no-padding">
				<div id="logo" class="pull-left">
					<img src="<?= $globalFields->logo; ?>" alt="logo">
				</div>

				<div class="pull-left">
					<nav>
						<?php
							wp_nav_menu([
								'container'      => false,
								'menu_class'     => 'header-nav no-margin',
								'theme_location' => 'header',
							]);
						?>
					</nav>
				</div>

				<div class="clearfix"></div>
			</div>
			<div class="col-md-2 col-sm-6 col-xs-6 col-xxs-12 no-padding">
				<div id="social-media-icons" class="text-right">
					<a href="<?= $globalFields->facebook; ?>">
						<img src="<?= get_template_directory_uri(); ?>/assets/images/social-fb.png" alt="fb">
					</a>
					&nbsp; &nbsp;
					<a href="<?= $globalFields->linkedin; ?>">
						<img src="<?= get_template_directory_uri(); ?>/assets/images/social-linkedin.png" alt="linkedin">
					</a>
				</div>
			</div>
		</div>

	</header>

	<div id="banner">
		<div>
            <h1><?= $pageMeta['banner_title'][0]; ?></h1>
            <p><?= $pageMeta['banner_content'][0]; ?></p>
			<br>
			<?php if($pageMeta['banner_link'][0]): ?>
                <a href="<?= $pageMeta['banner_link'][0]; ?>" class="button red">MORE</a>
			<?php endif; ?>
        </div>
	</div>