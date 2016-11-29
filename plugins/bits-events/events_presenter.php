<?php

function group_events_by_year($events) {

    $events_grouped_by_year = [];

    foreach ($events as $event) {
        $events_grouped_by_year[date_format($event->getDate(), "Y")] = [$event];
    }
    return $events_grouped_by_year;
}