<?php
/**
 * Template Name: Standard
 *
 * @package Bits
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div class="row">
			<div class="small-12 columns">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					the_content();
					endwhile; else: ?>
					<p>Sorry, the content of the page is under construction.</p>
				<?php endif; ?>
			</div>
		</div>



	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
