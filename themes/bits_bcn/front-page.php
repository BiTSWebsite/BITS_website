<?php get_header('front-page'); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main front-page" role="main">
        <div class="row">
            <div class="columns small-12">
                <h3 style="text-align:center">Barcelona Initiative for Technological Sovereignty</h3>
                <hr>
                <p>
                    The Barcelona Initiative for Technological Sovereignty (BITS) aims to stimulate a global debate on changes
                    in the meanings of sovereignty, and to explore the ways in which the various types of sovereignty -of citizens,
                    cities, nations and regions- match with global technologies. With a strong focus on the political effects of
                    technological change. BITS will explore how the emergence of technology platforms and data extractivism is transforming
                    governments, labor, ownership and access to basic concepts of life such as water, food, housing and energy.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="columns small-12">
                <h1>Join our events</h1>
            </div>
        </div>
        <div class="row">
            <?php
            $upcoming_events = upcoming_events(retrieveAllEvents(), date_create());
            if (count($upcoming_events) > 0) {
                foreach ($upcoming_events as $event) {
                    ?>
                    <div class="columns small-12">
                        <div class="event-date">
                            <span class="event-day"><?php echo $event->getDay(); ?></span>
                            <span class="event-month"><?php echo $event->getMonth(); ?></span>
                        </div>
                        <div class="event">
                            <a class="event-title" href="<?php echo $event->getPermalink(); ?>">
                                <?php echo $event->getTitle(); ?></a>
                            <p><?php echo $event->getExcerpt(); ?></p>
                        </div>
                    </div>
                    <?php
                }
            } else { ?>
                <div class="columns small-12">
                    <p>There are currently no upcoming events.</p>
                </div>
            <?php }; ?>
        </div>
        <div class="row">
            <div class="columns small-12">
                <p class="closing-paragraph">
                    <a href="<?php echo get_post_type_archive_link('bits_event') ?>">See all upcoming and past
                        events</a>
                </p>
            </div>
        </div>
        <hr class="full-width">
        <div class="row">
            <div class="columns small-12">
                <h1>Top articles</h1>
            </div>
        </div>
        <div class="row">

            <?php foreach (retrieve_featured_articles() as $featured_article): ?>
                <div class="columns small-12">
                    <div class="featured-article">

                        <a href="<?php echo get_permalink($featured_article->get_id()); ?>">
                            <?php echo $featured_article->get_title(); ?>
                        </a>
                        <p>
                            Posted
                            on <?php echo date('jS F Y', strtotime($featured_article->get_publish_date())); ?>
                            <?php if ($featured_article->has_author()): ?>
                                , by <?php echo $featured_article->get_author(); ?>
                            <?php endif ?>
                        </p>
                        <?php echo wp_trim_words($featured_article->content, $num_words = 55, $more = null); ?>
                        <a href="<?php echo get_permalink($featured_article->get_id()); ?>">Read more</a>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="columns small-12">
                <p class="closing-paragraph">
                    <a href="<?php echo get_post_type_archive_link('bits_article') ?>">See all</a>
                </p>
            </div>
        </div>
</div>

</main>
</div>
<?php get_footer(); ?>
