<?php

function retrieveAllEvents() {
    $wp_events = get_posts(['post_type' => 'bits_event']);

    return array_map(convertToEvent(), $wp_events);
}

function get_future_events() {
    $WP_Query = new WP_Query(['post_type' => 'bits_event',
        'meta_key' => '_logistics_date',
        'meta_value' => date_create()->format('Y-m-d'),
        'meta_compare' => '<']);

    $wp_events = $WP_Query->get_posts();
    return array_map(convertToEvent(), $wp_events);
}

function convertToEvent()
{
    return function ($wp_event) {
        return new Event(get_the_title($wp_event),
            date_create(get_post_meta($wp_event->ID, "_logistics_date", true)),
            get_the_excerpt($wp_event),
            get_permalink($wp_event));
    };
}
