<?php
/*Plugin Name: Create Event Post Type
Description: This plugin registers the 'event' post type for BITS.
Version: 1.0
License: GPLv2
*/

function wpmudev_create_post_type() {
  // set up labels
	$labels = array(
 		'name' => 'Events',
    	'singular_name' => 'Event',
    	'add_new' => 'Add New Event',
    	'add_new_item' => 'Add New Event',
    	'edit_item' => 'Edit Event',
    	'new_item' => 'New Event',
    	'all_items' => 'All Events',
    	'view_item' => 'View Event',
    	'search_items' => 'Search Events',
    	'not_found' =>  'No Event Found',
    	'not_found_in_trash' => 'No Event found in Trash',
    	'parent_item_colon' => '',
    	'menu_name' => 'Events',
    );
    //register post type
	register_post_type( 'event', array(
		'labels' => $labels,
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title' ),
		'taxonomies' => array( 'post_tag', 'category' ),
		'exclude_from_search' => false,
		'capability_type' => 'post'
		)
	);
}
add_action( 'init', 'wpmudev_create_post_type' );

?>
