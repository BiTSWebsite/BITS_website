<?php get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
    <div class="titles">
      <h1><?php echo get_post_field('post_title', $post->ID); ?></h1>
      <p>
        Posted on <?php echo get_post_field('post_date', $post->ID); ?>
      </p>
    </div>
		<?php echo apply_filters('the_content', get_post_field('post_content', $post->ID)); ?>
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
