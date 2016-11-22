<?php
/**
 * Template for a single event.
 *
 * @package Bits
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<h2><?php the_title() ?></h2>

		<h3><?php the_excerpt() ?><h3>

		<h4>Where? <?php echo get_post_meta($post->ID, "_location", true); ?> </h4>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
