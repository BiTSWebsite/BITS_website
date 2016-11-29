<?php

function retrieveAllEvents() {
    $wp_events = get_posts(['post_type' => 'bits_event']);

    return array_map(function ($wp_event) {
        return new Event(get_the_title($wp_event),
            date_create(get_post_meta($wp_event->ID, "_logistics_date", true)),
            get_the_excerpt($wp_event));
    }, $wp_events);
}