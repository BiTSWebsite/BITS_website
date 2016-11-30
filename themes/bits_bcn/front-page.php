<?php get_header('front-page'); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main front-page" role="main">
        <h1>Top articles</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tempor purus lacus, eu pulvinar lectus rutrum
            sit amet. Nulla fermentum magna vel ipsum venenatis, vitae sodales purus maximus. Phasellus condimentum
            lacus sed ipsum pulvinar finibus. Fusce euismod dapibus massa, vel aliquam purus consectetur ut. Morbi non
            tellus ac leo mattis elementum at eget ligula. Nullam pretium mi nec aliquam semper. Donec porttitor enim
            sit amet tellus elementum, nec condimentum turpis ultricies. Integer at quam augue. Maecenas arcu urna,
            iaculis quis molestie a, accumsan ac purus.
        </p>
        </p>
        Nulla facilisi. Duis eget quam libero. Sed egestas purus eget vulputate euismod. Lorem ipsum dolor sit amet,
        consectetur adipiscing elit. Nunc lobortis leo sit amet urna euismod, at faucibus sapien laoreet. Cras
        consectetur sem velit, ut convallis neque vestibulum sit amet. Sed efficitur hendrerit cursus. Vivamus lobortis
        urna nec nibh consectetur, ut tempor nisi elementum. Ut eget ante quis nisl dictum cursus blandit at dui. Donec
        lectus diam, facilisis vitae cursus et, laoreet ut sem. Nulla sapien diam, placerat at nibh eget, rhoncus
        vulputate ante. Curabitur ultricies et magna eu varius.
        </p>
        <p class="closing-paragraph">
            <a href="<?php echo get_post_type_archive_link('bits_article') ?>">See all</a>
        </p>

        <h1>Join our events</h1>
        <?php foreach (upcoming_events(get_future_events()) as $event) { ?>
            <div class="row">
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
            </div>
            <?php
        }; ?>
        <p class="closing-paragraph">
            <a href="<?php echo get_post_type_archive_link('bits_event') ?>">See all</a>
        </p>

    </main>
</div>
<?php get_footer(); ?>
