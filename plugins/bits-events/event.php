<?php
define('BITS_EVENT_LOGISTICS_PREFIX', '_logistics');
define('BITS_EVENT_LOCATION', '_location');
define('BITS_EVENT_DATE', '_date');
define('BITS_EVENT_TIME', '_time');
define('BITS_EVENT_AUDIENCE', '_audience');
define('BITS_EVENT_FEATURED_CONTENT_PREFIX', '_featured');
define('BITS_EVENT_FEATURED_VIDEO', '_video_id');
define('BITS_EVENT_FEATURED_IMAGE', '_image');

class Event
{
    var $title;
    var $date;
    var $excerpt;
    var $permalink;
    var $audience;
    var $featured_video_id;
    var $featured_image;
    var $additional_information;

    function __construct($title, $date, $excerpt, $permalink, $audience, $video_id, $image, $event_additional_information)
    {
        $this->title = $title;
        $this->date = $date;
        $this->excerpt = $excerpt;
        $this->permalink = $permalink;
        $this->audience = $audience;
        $this->featured_video_id = $video_id;
        $this->featured_image = $image;
        $this->additional_information = $event_additional_information;
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

    function getAudience()
    {
        return $this->audience;
    }

    function hasAudience()
    {
        return !empty(trim($this->getAudience()));
    }

    function getFeaturedVideoId()
    {
        return $this->featured_video_id;
    }

    function hasFeaturedVideo()
    {
        return !empty(trim($this->getFeaturedVideoId()));
    }

    function getFeaturedImage()
    {
        return $this->featured_image;
    }

    function hasFeaturedImage()
    {
        return !empty(trim($this->getFeaturedImage()));
    }

    function getAdditionalInformation()
    {
        return $this->additional_information;
    }
}
