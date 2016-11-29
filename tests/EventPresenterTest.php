<?php
require_once __DIR__ . '/../plugins/bits-events/events_presenter.php';

class EventPresenterTest extends PHPUnit_Framework_TestCase
{
    public function testCanBeNegated()
    {
        $group_events_by_year = group_events_by_year();
        $this->assertNotEmpty($group_events_by_year);
    }

}