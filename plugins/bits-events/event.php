<?php

class Event
{
    var $title;
    var $date;
    var $excerpt;
    var $permalink;

    function __construct($title, $date, $excerpt, $permalink)
    {
        $this->title = $title;
        $this->date = $date;
        $this->excerpt = $excerpt;
        $this->permalink = $permalink;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getDate()
    {
        return $this->date;
    }

    function getExcerpt()
    {
        return $this->excerpt;
    }

    function getDay()
    {
        return $this->date->format('d');
    }

    function getMonth()
    {
        return $this->date->format('M');
    }

    function getPermalink()
    {
        return $this->permalink;
    }
}