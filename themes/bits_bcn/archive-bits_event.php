<?php
/**
 * Template Name: page
 *
 * @package Bits
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <a class="navigation-link" href="/">Go to Home</a>
        <h1 class="page-title screen-reader-text">Events</h1>
        <hr class="full-width">
        <?php foreach (group_events_by_year(retrieveAllEvents()) as $year => $events) {
            echo $year;
            foreach ($events as $event) {
                echo $event->getTitle();
                echo $event->getExcerpt();
            }
        }; ?>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
