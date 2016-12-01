<?php get_header(); ?>

<?php $article = to_article($post); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<a class="navigation-link" href="<?php echo get_post_type_archive_link('bits_article') ?>">Go to Articles</a>
    <div class="titles">
      <h1><?php echo $article->get_title(); ?></h1>
      <p>
				Posted on <?php echo date('jS F Y', strtotime($article->get_publish_date())); ?>
				<?php if ($article->has_author()): ?>
					, by <?php echo $article->get_author(); ?>
		    <?php endif ?>
      </p>
    </div>
		<div class="article-content">
			<?php echo apply_filters('the_content', $article->content); ?>
		</div>
	</main><!-- .site-main -->
</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
