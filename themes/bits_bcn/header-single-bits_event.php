<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?> | <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/wp-content/themes/bits_bcn/css/main.min.css" type="text/css" media="screen" />

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr.js"></script>
    <?php wp_head(); ?>
  </head>
  <body>
  <?php include 'navbar.php'; ?>
  <?php $event = to_event($post); ?>

  <?php if ($event->hasFeaturedImage()): ?>
    <div class="teaser-image show-for-medium" style="background-image:url(<?php echo $event->getFeaturedImage(); ?>)">
    </div>
  <?php endif ?>
  <div class="contents">
