<?php get_header('single-bits_event'); ?>

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
      <div class="videoWrapper">
				<iframe src="https://player.vimeo.com/video/<?php echo $event->getFeaturedVideoId() ?>?badge=0"
								width="560" height="315" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>
    <?php endif ?>
		<?php if ($event->hasFeaturedImage() and !$event->hasFeaturedVideo()): ?>
			<div class="teaser-image show-for-small-only" style="background-image:url(<?php echo $event->getFeaturedImage(); ?>)">
			</div>
		<?php endif ?>
		<?php echo apply_filters('the_content', $event->getAdditionalInformation()); ?>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
