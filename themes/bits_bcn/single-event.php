<?php
/**
 * Template for a single event.
 *
 * @package Bits
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<h2><?php printf(get_the_title()) ?></h2>

	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
