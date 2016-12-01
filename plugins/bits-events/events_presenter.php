<?php

function group_events_by_year($events) {

    usort($events, function($eventA, $eventB) {
        return $eventA->getDate() < $eventB->getDate();
    });

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

function upcoming_events($events, $today) {
    return array_filter($events, function($event) use (&$today) {
       return $event->getDate() >= $today;
    });
}