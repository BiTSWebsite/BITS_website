<?php

class EventTest extends PHPUnit_Framework_TestCase {

    function testThatDayGetsDisplayedInTheCorrectFormat() {
        $event = new Event("shiny", date_create("2001-09-02"), "Excerpt");

        $day = $event->getDay();

        $this->assertEquals($day, "02");
    }

    function testThatCorrectMonthGetsDisplayed() {
        $event = new Event("shiny", date_create("2001-09-02"), "Excerpt");

        $month = $event->getMonth();

        $this->assertEquals($month, "Sep");
    }

}