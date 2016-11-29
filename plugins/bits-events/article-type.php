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
		'menu_icon' => 'dashicons-media-document',
    'rewrite' => array(
        'slug' => 'articles'
      )
		)
	);
}
add_action( 'init', 'bits_article_create_post_type' );
add_action( 'cmb2_admin_init', 'bits_article_metaboxes' );

function bits_article_metaboxes() {
	bits_article_publication_info_metabox();
}

function bits_article_publication_info_metabox() {
	$prefix = '_publication_info_';

	$cmb = new_cmb2_box( array(
		'id' => 'publication_info',
		'title' => 'Article publication information',
		'object_types' => array('bits_article'),
		'context' => 'side'
	) );

	$cmb->add_field( array(
		'name' => __( 'Original author', 'cmb2' ),
		'desc' => __( 'Who wrote this article. This field can be left empty', 'cmb2' ),
		'id'   => $prefix . 'article_author',
		'type' => 'text'
	) );

	$cmb->add_field( array(
		'name' => __( 'Featured article', 'cmb2' ),
		'desc' => __( 'Display this article in the homepage', 'cmb2' ),
		'id'   => $prefix . 'featured_article',
		'type' => 'checkbox'
	) );
}

?>
