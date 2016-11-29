<?php

class Event {
    var $title;

    function __construct($title)
    {
        $this->title = $title;
    }

    function getTitle() {
        return $this->title;
    }
}