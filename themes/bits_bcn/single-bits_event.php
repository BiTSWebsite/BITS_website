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

	<h2><?php the_title(); ?></h2>
	<h3><?php the_excerpt() ?><h3>

	Where (new) <?php echo get_post_meta($post->ID, "_logistics_location", true); ?>
	When (new) <?php echo  date('F j, Y', strtotime(get_post_meta($post->ID, "_logistics_date", true))) ; ?>

  <iframe src="https://player.vimeo.com/video/<?php echo get_post_meta($post->ID, "_video_id", true) ?>?badge=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>

	<?php get_footer(); ?>
