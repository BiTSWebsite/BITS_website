<?php
require_once  __DIR__ . '/article.php';
require_once  __DIR__ . '/article-presenter.php';

if ( ! function_exists( 'retrieve_articles' ) ) :

  function retrieve_articles() {
    $articles = get_posts( array( 'post_type' => 'bits_article' ) );

    return (new ArticlePresenter())->sort_articles(to_article_list($articles));
  }

endif;

if ( ! function_exists( 'retrieve_featured_articles' ) ) :

  function retrieve_featured_articles() {
    $articles = get_posts( array( 'post_type' => 'bits_article' ) );

    return (new ArticlePresenter())->keep_only_featured_and_sort(to_article_list($articles));
  }

endif;
?>
