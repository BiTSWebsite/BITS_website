<?php get_header(); ?>
	<?php include 'navbar.php'; ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php
			endif;
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );
			endwhile;
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		</main><!-- #main -->
	</div><!-- #primary -->

	<!-- <h3><?php the_excerpt() ?><h3> -->

	<!-- Where (new) <?php echo get_post_meta($post->ID, "_logistics_location", true); ?> -->
	<!-- When (new) <?php echo date('F j, Y', strtotime(get_post_meta($post->ID, "_logistics_date", true))); ?> -->

  <!-- <iframe src="https://player.vimeo.com/video/<?php echo get_post_meta($post->ID, "_video_id", true) ?>?badge=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> -->

		<div class="content-area">
			<h1 class="titles"><?php the_title(); ?></h2>
			<h3>Date:</h3>
				When (new) <?php echo date('F j, Y', strtotime(get_post_meta($post->ID, "_logistics_date", true))); ?>
			<h3>Venue:</h3>
				Where (new) <?php echo get_post_meta($post->ID, "_logistics_location", true); ?>
			<h3>Summary:</h3>
			<p><?php the_excerpt() ?></p>
			<iframe src="https://player.vimeo.com/video/<?php echo get_post_meta($post->ID, "_video_id", true) ?>?badge=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</p>
			<hr>
		</div>
	<?php get_footer(); ?>
