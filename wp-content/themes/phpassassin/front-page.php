<?php get_header(); $pageMeta = get_post_meta(get_the_ID()); ?>
	<div class="content container-fluid mtop20">
		<div class="row">
			<div class="col-md-8 no-padding-left content-left" data-section="about">
				<?php while(have_posts()): the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			</div>
			<div class="col-md-4 no-padding-right content-right" data-section="contact">
				<?= $pageMeta['additional_content_left_content'][0]; ?>
				<?= do_shortcode('[contact-form-7 id="59" title="Contact form"]'); ?>
			</div>
		</div>
	</div>

	<div class="team container-fluid mtop80 ptop80" data-section="team">
		<h2 class="text-center">
			Our Killer Team
		</h2>

		<div class="row mtop80">
			<?php
				$teams = new WP_Query([
					'post_type'   => 'team',
					'post_status' => 'publish'
				]);
			?>

			<?php while($teams->have_posts()): $teams->the_post(); ?>
				<?php $teamData = get_post_meta(get_the_ID()); ?>
				<div class="team-wrapper col-md-4 col-sm-6 col-xs-12 text-center">
					<?php the_post_thumbnail('full'); ?>
					<br>
					<strong><?php the_title(); ?></strong>
					<br>
					<em><?= $teamData['team_position'][0]; ?></em>

					<div class="mtop10">
						<?= $teamData['team_location'][0]; ?>
					</div>

					<div class="mtop10">
						<a href="<?= $teamData['team_facebook'][0]; ?>">
							<img src="<?= get_template_directory_uri(); ?>/assets/images/social-red-facebook.png" alt="facebook"> &nbsp;
						</a>
						<a href="<?= $teamData['team_twitter'][0]; ?>">
							<img src="<?= get_template_directory_uri(); ?>/assets/images/social-red-twitter.png" alt="twitter"> &nbsp;
						</a>
						<a href="<?= $teamData['team_linkedin'][0]; ?>">
							<img src="<?= get_template_directory_uri(); ?>/assets/images/social-red-linkedin.png" alt="linkedin">
						</a>
					</div>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>



	<div class="project container-fluid mtop80 ptop80" data-section="project">
		<h2 class="text-center">
			Our Projects
		</h2>

		<div class="row mtop30">
			<?php
				$projects = new WP_Query([
					'post_type'   => 'project',
					'post_status' => 'publish',
					'orderby'     => 'menu_order',
					'order'       => 'ASC'
				]);
			?>

			<?php while($projects->have_posts()): $projects->the_post(); ?>
				<?php $projectData = get_post_meta(get_the_ID()); ?>
				<div class="project-wrapper mtop50 col-md-3 col-sm-6 col-xs-12 text-center">
					<h3><?php the_title(); ?></h3>
					<br>
					<img src="<?= $projectData['project_screenshot'][0]; ?>" alt="<?= get_the_title(); ?>" width="100%">

				</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
	</div>
<?php get_footer(); ?>