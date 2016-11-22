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
		'supports' => array( 'title', 'excerpt' ),
		'taxonomies' => array( 'post_tag', 'category' ),
		'exclude_from_search' => false,
		'capability_type' => 'post'
		)
	);
}
add_action( 'init', 'wpmudev_create_post_type' );

function add_events_metaboxes() {
    add_meta_box('bits_events_location', 'Event Location', 'bits_events_location', 'event', 'side', 'high');
}

add_action( 'add_meta_boxes', 'add_events_metaboxes' );

// The Event Location Metabox
function bits_events_location() {
    global $post;

    // Noncename needed to verify where the data originated
    echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' .
    wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
    // Get the location data if its already been entered
    $location = get_post_meta($post->ID, '_location', true);
    // Echo out the field
    echo '<input type="text" name="_location" value="' . $location  . '" class="widefat" />';
}

// Save the Metabox Data
function bits_save_events_meta($post_id, $post) {
    // verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
    return $post->ID;
    }

    // Is the user allowed to edit the post or page?
    if ( !current_user_can( 'edit_post', $post->ID ))
        return $post->ID;

    $events_meta['_location'] = $_POST['_location'];

    foreach ($events_meta as $key => $value) {
        if( $post->post_type == 'revision' ) return; // Don't store custom data twice
        $value = implode(',', (array)$value);
        if(get_post_meta($post->ID, $key, FALSE)) {
            update_post_meta($post->ID, $key, $value);
        } else {
            add_post_meta($post->ID, $key, $value);
        }
        if(!$value) delete_post_meta($post->ID, $key);
    }
}

add_action('save_post', 'bits_save_events_meta', 1, 2);
?>
