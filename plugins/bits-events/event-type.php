<?php
/*Plugin Name: Create Event Post Type
Description: This plugin registers the 'event' post type for BITS.
Version: 1.0
License: GPLv2
*/
include 'functions.php';

function bits_event_create_post_type() {
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
	register_post_type( 'bits_event', array(
		'labels' => $labels,
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'excerpt' ),
		'taxonomies' => array( 'post_tag', 'category' ),
		'exclude_from_search' => false,
		'capability_type' => 'post'
		)
	);
}
add_action( 'init', 'bits_event_create_post_type' );

add_action( 'cmb2_admin_init', 'bits_event_metaboxes' );

function bits_event_metaboxes() {
    $prefix = '_logistics_';

    /**
     * Initiate the metabox
     */
    $cmb = new_cmb2_box( array(
        'id'            => 'logistics_metabox',
        'title'         => __( 'Logistics', 'cmb2' ),
        'object_types'  => array( 'bits_event', ), // Post type
        'context'       => 'side',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        // 'cmb_styles' => false, // false to disable the CMB stylesheet
        // 'closed'     => true, // Keep the metabox closed by default
    ) );

    // Regular text field
    $cmb->add_field( array(
        'name'       => __( 'Location', 'cmb2' ),
        'desc'       => __( 'Where the event will be', 'cmb2' ),
        'id'         => $prefix . 'location',
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats', // function should return a bool value
        // 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
        // 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
        // 'on_front'        => false, // Optionally designate a field to wp-admin only
        // 'repeatable'      => true,
    ) );

    // URL text field
    $cmb->add_field( array(
        'name' => __( 'Date', 'cmb2' ),
        'desc' => __( 'Date for the event', 'cmb2' ),
        'id'   => $prefix . 'date',
        'type' => 'text_date',
        // 'protocols' => array('http', 'https', 'ftp', 'ftps', 'mailto', 'news', 'irc', 'gopher', 'nntp', 'feed', 'telnet'), // Array of allowed protocols
        // 'repeatable' => true,
    ) );
}

?>
