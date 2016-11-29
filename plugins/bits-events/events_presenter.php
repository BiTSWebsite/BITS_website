<?php

require_once __DIR__ . '/event.php';

function group_events_by_year() {
    return $array = [
        "2017" => [new Event("Title of fancy event")],
        "2016" => [],
    ];
}