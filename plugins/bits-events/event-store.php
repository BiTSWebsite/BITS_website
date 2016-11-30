<?php

function retrieveAllEvents() {
    $wp_events = get_posts(['post_type' => 'bits_event']);
    return array_map('to_event', $wp_events);
}
