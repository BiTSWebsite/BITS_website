<?php
/**
 * Template Name: page
 *
 * @package Bits
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <a class="navigation-link" href="<?php echo get_site_url() ?>">Go to Home</a>
        <h1 class="page-title screen-reader-text titles">Elsewhere on the Web</h1>
        <div class="article-list">
          <ul>
            <?php foreach (retrieve_articles() as $article):?>
                <li>
                  <p>
                    <a href="<?php echo get_permalink($article->get_id()); ?>"><?php echo $article->get_title(); ?></a>
                  </p>
                  <p class="article-element-info">
                    Published on <?php echo date('jS F Y', strtotime($article->get_publish_date())); ?>
                    <?php if (!empty(trim($article->get_author()))): ?>
            					, by <?php echo $article->get_author(); ?>
            		    <?php endif ?>
                  </p>
                </li>
            <?php endforeach; ?>
          </ul>
        </div>
    </main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
