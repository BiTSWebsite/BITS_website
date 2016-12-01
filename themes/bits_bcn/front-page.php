<?php get_header('front-page'); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main front-page" role="main">

        <h1>Join our events</h1>
        <?php
        $upcoming_events = upcoming_events(retrieveAllEvents(), date_create());
        if (count($upcoming_events) > 0) {
            foreach ($upcoming_events as $event) {
                ?>
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
            }
        } else { ?>
            <div class="row">
                <div class="columns small-12">
                    <p>There are currently no upcoming events.</p>
                </div>
            </div>
        <?php }; ?>
        <p class="closing-paragraph">
            <a href="<?php echo get_post_type_archive_link('bits_event') ?>">See all upcoming and past events</a>
        </p>
        <div class="highlighted-text">
            <p>
                BITS estimulará un debate global sobre el significado cambiante de la soberanía tecnológica y explorará
                las maneras en que diversas formas de soberanía – de la ciudadanía, de las ciudades, de los estados y de
                las regiones – pueden subsistir dentro de las condiciones globales hoy en día. BITS se centrará en los
                efectos políticos del cambio tecnológico y explorará de qué manera el crecimiento de las plataformas
                tecnológicas y la extracción de datos que estas posibilitan ejercen transformaciones sobre gobiernos, la
                organización del trabajo, la propiedad y el acceso a las necesidades básicas como el agua, la comida, la
                vivienda y la energía. Esta tarea es especialmente importante teniendo en cuenta la actual reformulación
                socio-económica en torno al núcleo teórico y práctico de la tecnología digital, con una nueva y poderosa
                alianza entre las empresas tecnológicas, las finanzas globales y el complejo militar e industrial.
            </p>
        </div>
      <h1>Top articles</h1>
      <?php foreach (retrieve_featured_articles() as $featured_article): ?>
        <div class="featured-article">
          <div class="row">
            <div class="columns small-12">
              <a href="<?php echo get_permalink($featured_article->get_id()); ?>">
                <?php echo $featured_article->get_title(); ?>
              </a>
              <p>
                Posted on <?php echo date('jS F Y', strtotime($featured_article->get_publish_date())); ?>
                <?php if ($featured_article->has_author()): ?>
        					, by <?php echo $featured_article->get_author(); ?>
        		    <?php endif ?>
              </p>
              <?php echo wp_trim_words($featured_article->content, $num_words = 55, $more = null); ?>
              <a href="<?php echo get_permalink($featured_article->get_id()); ?>">Read more</a>
            </div>
          </div>
      </div>
      <?php endforeach; ?>
        <p class="closing-paragraph">
            <a href="<?php echo get_post_type_archive_link('bits_article') ?>">See all</a>
        </p>
    </main>
</div>
<?php get_footer(); ?>
