<?php
/*Plugin Name: Create Article Post Type
Description: This plugin registers the 'article' post type for BITS.
Version: 1.0
License: GPLv2
*/
include 'functions.php';

function bits_article_create_post_type() {
	$labels = array(
 		'name' => 'Articles',
    	'singular_name' => 'Article',
    	'add_new' => 'Add New Article',
    	'add_new_item' => 'Add New Article',
    	'edit_item' => 'Edit Article',
    	'new_item' => 'New Article',
    	'all_items' => 'All Articles',
    	'view_item' => 'View Article',
    	'search_items' => 'Search Events',
    	'not_found' =>  'No Article Found',
    	'not_found_in_trash' => 'No Article found in Trash',
    	'parent_item_colon' => '',
    	'menu_name' => 'Articles',
    );
	register_post_type( 'bits_article', array(
		'labels' => $labels,
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor' ),
		'taxonomies' => array( 'post_tag', 'category' ),
		'exclude_from_search' => false,
		'capability_type' => 'post',
    'rewrite' => array(
        'slug' => 'articles'
      )
		)
	);
}
add_action( 'init', 'bits_article_create_post_type' );

?>
