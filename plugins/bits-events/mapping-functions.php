<?php
require_once __DIR__ . '/event.php';

if ( ! function_exists( 'to_event' ) ) :

  function to_event($post) {
    return new Event(
      $post->post_title,
      date_create($post->__get(BITS_EVENT_LOGISTICS_PREFIX . BITS_EVENT_DATE)),
      $post->post_excerpt,
      get_permalink($post),
      $post->__get(BITS_EVENT_LOGISTICS_PREFIX . BITS_EVENT_AUDIENCE),
      $post->__get(BITS_EVENT_FEATURED_CONTENT_PREFIX . BITS_EVENT_FEATURED_VIDEO),
      $post->__get(BITS_EVENT_FEATURED_CONTENT_PREFIX . BITS_EVENT_FEATURED_IMAGE),
      $post->post_content
    );
  }

endif;
?>
