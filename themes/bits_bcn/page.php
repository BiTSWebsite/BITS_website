<?php
/**
 * Template Name: page
 *
 * @package Bits
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="row">
			<div class="small-12 columns">
				<h1><?php echo get_post_field('post_title', $post->ID); ?></h1>
				<?php echo apply_filters('the_content', get_post_field('post_content', $post->ID)); ?>
			</div>
		</div>

	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
