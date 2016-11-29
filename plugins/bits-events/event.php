<?php

class Event {
    var $title;
    var $date;

    function __construct($title, $date)
    {
        $this->title = $title;
        $this->date = $date;
    }

    function getTitle() {
        return $this->title;
    }

    function getDate() {
        return $this->date;
    }
}