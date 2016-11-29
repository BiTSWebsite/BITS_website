<?php
require_once __DIR__ . '/class-lib.php';

if ( ! function_exists( 'to_article' ) ) :

  function to_article($post) {
    return new Article(
      $post->post_title,
      $post->post_date,
      $post->__get(BITS_ARTICLE_INFO_PREFIX . BITS_ARTICLE_AUTHOR_FIELD),
      $post->post_content,
      $post->__get(BITS_ARTICLE_INFO_PREFIX . BITS_ARTICLE_IS_FEATURED_ARTICLE_FIELD)
    );
  }

endif;
?>
