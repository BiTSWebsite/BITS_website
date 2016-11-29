<?php

class Event {
    var $title;
    var $date;
    var $excerpt;

    function __construct($title, $date, $excerpt)
    {
        $this->title = $title;
        $this->date = $date;
        $this->excerpt = $excerpt;
    }

    function getTitle() {
        return $this->title;
    }

    function getDate() {
        return $this->date;
    }

    function getExcerpt()
    {
        return $this->excerpt;
    }
}