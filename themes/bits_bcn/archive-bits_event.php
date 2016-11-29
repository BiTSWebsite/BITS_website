<?php
/**
 * Template Name: page
 *
 * @package Bits
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <h1>All events</h1>
        <?php foreach (group_events_by_year(retrieveAllEvents()) as $year => $events) {
            echo $year;
            foreach ($events as $event) {
                echo $event->getTitle();
            }
        }; ?>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
