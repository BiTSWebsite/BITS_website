<?php get_header(); ?>

<?php $event = to_event($post); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<a class="navigation-link" href="<?php echo get_post_type_archive_link('bits_event') ?>">Go to Events</a>
		<div class="titles">
			<h1><?php echo $event->getTitle(); ?></h1>
		</div>
		<h3>Date:</h3>
		<p><?php echo $event->getDate()->format('jS F Y'); ?></p>
	  <h3>Time:</h3>
		<p><?php echo date('h:ia', strtotime(get_post_meta($post->ID, "_logistics_time", true))) ?></p>
    <?php if ($event->hasAudience()): ?>
      <h3>Audience:</h3>
	  	<p><?php echo $event->getAudience(); ?></p>
    <?php endif ?>
    <h3>Venue:</h3>
	  <p><?php echo get_post_meta($post->ID, "_logistics_location", true); ?></p>
		<h3>Summary:</h3>
		<?php echo $event->getExcerpt(); ?>
	  <?php if ($event->hasFeaturedVideo()): ?>
        <p><iframe src="https://player.vimeo.com/video/<?php echo $event->getFeaturedVideoId() ?>?badge=0" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></p>
    <?php endif ?>
		<?php if ($event->hasFeaturedImage()): ?>
			<p>
				<img src="<?php echo $event->getFeaturedImage(); ?>" alt="Image" />
			</p>
		<?php endif ?>
		<?php echo apply_filters('the_content', get_post_field('post_content', $post->ID)); ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
