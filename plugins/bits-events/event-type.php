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
		'supports' => array( 'title', 'excerpt', 'editor' ),
		'taxonomies' => array( 'post_tag', 'category' ),
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'menu_icon' => 'dashicons-calendar',
		'rewrite' => array(
        'slug' => 'events'
      )
		)
	);
}
add_action( 'init', 'bits_event_create_post_type' );

add_action( 'cmb2_admin_init', 'bits_event_metaboxes' );

function bits_event_metaboxes() {
	bits_event_featured_video_metabox();
	bits_event_logistics_metabox();
}

function bits_event_featured_video_metabox() {
	$prefix = BITS_EVENT_FEATURED_CONTENT_PREFIX;

	$cmb = new_cmb2_box( array(
		'id' => 'video_on_vimeo',
		'title' => 'Featured content',
		'object_types' => array('bits_event'),
		'context' => 'side'
	) );

	$cmb->add_field( array(
		'name' => __( 'Vimeo video ID', 'cmb2' ),
		'id'   => $prefix . BITS_EVENT_FEATURED_VIDEO,
		'type' => 'text'
	) );

	$cmb->add_field( array(
    'name'    => __( 'Featured image', 'cmb2' ),
    'desc'    => 'Upload an image or choose from the media gallery.',
    'id'      => $prefix . BITS_EVENT_FEATURED_IMAGE,
    'type'    => 'file',
    'options' => array(
        'url' => false,
    ),
    'text'    => array(
        'add_upload_file_text' => 'Add Image'
    ),
) );
}

function bits_event_logistics_metabox() {
    $prefix = BITS_EVENT_LOGISTICS_PREFIX;

    $cmb = new_cmb2_box( array(
        'id'            => 'logistics_metabox',
        'title'         => __( 'Logistics', 'cmb2' ),
        'object_types'  => array( 'bits_event', ),
        'context'       => 'side',
        'priority'      => 'high',
        'show_names'    => true,
    ) );

    $cmb->add_field( array(
        'name'       => __( 'Location', 'cmb2' ),
        'desc'       => __( 'Where the event will be', 'cmb2' ),
        'id'         => $prefix . BITS_EVENT_LOCATION,
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats',
    ) );

    $cmb->add_field( array(
        'name' => __( 'Date', 'cmb2' ),
        'desc' => __( 'Date for the event', 'cmb2' ),
        'id'   => $prefix . BITS_EVENT_DATE,
        'type' => 'text_date',
    ) );

		$cmb->add_field(array(
        'name' => __( 'Time', 'cmb2' ),
        'desc' => __( 'Time for the event', 'cmb2' ),
        'id'   => $prefix . BITS_EVENT_TIME,
        'type' => 'text_time',
    ) );

		$cmb->add_field( array(
        'name'       => __( 'Audience', 'cmb2' ),
        'desc'       => __( 'Whether the event is public, private, etc. This field can be left empty.', 'cmb2' ),
        'id'         => $prefix . BITS_EVENT_AUDIENCE,
        'type'       => 'text',
        'show_on_cb' => 'cmb2_hide_if_no_cats',
    ) );
}

?>
