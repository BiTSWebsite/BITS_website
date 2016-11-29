<?php
require_once  __DIR__ . '/class-lib.php';

if ( ! function_exists( 'is_featured_article' ) ) :

  function is_featured_article($article) {
    return get_post_meta($article->ID, '_publication_info_featured_article');
  }

endif;

if ( ! function_exists( 'compare_articles' ) ) :

  function compare_articles($article1, $article2) {
    if ($article1->post_date == $article2->post_date) {
      return 0;
    }

    return $article1->post_date < $article2->post_date ? -1 : 1;
  }

endif;

if ( ! function_exists( 'sort_articles' ) ) :

  function sort_articles($articles) {
    uasort($articles, "compare_articles");
    return $articles;
  }

endif;

if ( ! function_exists( 'get_featured_articles' ) ) :

  function get_featured_articles() {
    $articles = get_posts( array( 'post_type' => 'bits_article' ) );

    return sort_articles(array_filter($articles, 'is_featured_article'));
  }

endif;
?>
