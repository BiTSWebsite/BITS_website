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
        <?php foreach (group_events_by_year(retrieveAllEvents()) as $year => $events) {?>
            <h4 class="event-year"><?php echo $year;?></h4>
            <?php
            foreach ($events as $event) {
                ?>
                <div class="row">
                    <div class="columns small-12">
                        <div class="event-date">
                            <span class="event-day"><?php echo $event->getDay();?></span>
                            <span class="event-month"><?php echo $event->getMonth();?></span>
                        </div>
                        <div class="event">
                            <a class="event-title" href="<?php echo $event->getPermalink();?>">
                                <?php echo $event->getTitle();?></a>
                            <p><?php echo $event->getExcerpt(); ?></p>
                        </div>
                    </div>
                </div>
                <?php
            }
        }; ?>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
