<?php get_header(); ?>
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="titles">
			<h1><?php the_title(); ?></h1>
		</div>
		<h3>Date:</h3>
		<p><?php echo date('F j, Y', strtotime(get_post_meta($post->ID, "_logistics_date", true))); ?></p>
	  <h3>Time:</h3>
		<p><?php echo date('h:ia', strtotime(get_post_meta($post->ID, "_logistics_time", true))) ?></p>
    <?php if (!empty(trim(get_post_meta($post->ID, "_logistics_audience", true)))): ?>
      <h3>Audience:</h3>
	  <p><?php echo get_post_meta($post->ID, "_logistics_audience", true); ?></p>
    <?php endif ?>
    <h3>Venue:</h3>
	  <p><?php echo get_post_meta($post->ID, "_logistics_location", true); ?></p>
		<h3>Summary:</h3>
		<?php the_excerpt() ?>
	  <?php if (!empty(trim(get_post_meta($post->ID, "_video_id", true)))): ?>
        <p><iframe src="https://player.vimeo.com/video/<?php echo get_post_meta($post->ID, "_video_id", true) ?>?badge=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></p>
    <?php endif ?>
		<?php echo apply_filters('the_content', get_post_field('post_content', $post->ID)); ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
