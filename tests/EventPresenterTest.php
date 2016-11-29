<?php
require_once __DIR__ . '/../plugins/bits-events/events_presenter.php';
require_once __DIR__ . '/../plugins/bits-events/event.php';

class EventPresenterTest extends PHPUnit_Framework_TestCase
{
    public function testCanGroupEventsByYear()
    {
        $firstEvent = new Event("Fancy", date_create("1994-03-01"));
        $events_grouped_by_year = group_events_by_year([$firstEvent]);

        $this->assertNotEmpty($events_grouped_by_year);
        $this->assertArrayHasKey("1994", $events_grouped_by_year);
        $this->assertEquals($events_grouped_by_year['1994'][0], $firstEvent);
    }

}