<?php
define('BITS_ARTICLE_INFO_PREFIX', '_publication_info');
define('BITS_ARTICLE_AUTHOR_FIELD', '_article_author');
define('BITS_ARTICLE_IS_FEATURED_ARTICLE_FIELD', '_featured_article');

class Article {
  var $title;
  var $publish_date;
  var $author;
  var $content;
  var $is_featured_article;

  function __construct($article_title, $article_publish_date, $article_author, $article_content, $article_is_featured) {
    $this->title = $article_title;
    $this->publish_date = $article_publish_date;
    $this->author = $article_author;
    $this->content = $article_content;
    $this->is_featured_article = $article_is_featured;
  }

  function get_title() {
    return $this->title;
  }

  function get_publish_date() {
    return $this->publish_date;
  }

  function get_author() {
    return $this->author;
  }

  function is_featured() {
    return $this->is_featured_article;
  }
}
?>
