<?php

function group_events_by_year($events) {

    $events_grouped_by_year = [];

    foreach ($events as $event) {
        $event_year = date_format($event->getDate(), "Y");

        if(!array_key_exists($event_year, $events_grouped_by_year)) {
            $events_grouped_by_year[$event_year] = [];
        }

        array_push($events_grouped_by_year[$event_year], $event);
    }

    return $events_grouped_by_year;
}