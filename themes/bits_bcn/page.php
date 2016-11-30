<?php
/**
 * Template Name: page template
 *
 * @package Bits
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<a class="navigation-link" href="<?php echo get_site_url() ?>">Go to Home</a>
		<div class="titles">
			<h1><?php echo get_post_field('post_title', $post->ID); ?></h1>
		</div>
		<div class="page-content">
			<?php echo apply_filters('the_content', get_post_field('post_content', $post->ID)); ?>
		</div>
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
