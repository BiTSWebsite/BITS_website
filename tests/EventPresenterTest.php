<?php
require_once __DIR__ . '/../plugins/bits-events/events_presenter.php';
require_once __DIR__ . '/../plugins/bits-events/event.php';

class EventPresenterTest extends PHPUnit_Framework_TestCase
{
    var $firstEvent, $secondEvent;

    public function setUp() {
        $this->firstEvent = new Event("Fancy", date_create("1994-03-01"), 'excerpt', 'permalink');
        $this->secondEvent = new Event("Fancy", date_create("1994-04-01"), 'excerpt', 'permalink');
    }

    public function testCanGroupAnEventByYear()
    {
        $events_grouped_by_year = group_events_by_year([$this->firstEvent]);

        $this->assertNotEmpty($events_grouped_by_year);
        $this->assertArrayHasKey("1994", $events_grouped_by_year);
        $this->assertEquals($events_grouped_by_year['1994'][0], $this->firstEvent);
    }

    public function testCanGroupMultipleEventsInTheSameYear()
    {
        $events_grouped_by_year = group_events_by_year([$this->firstEvent, $this->secondEvent]);

        $this->assertArrayHasKey("1994", $events_grouped_by_year);

        $events_from_1994 = $events_grouped_by_year['1994'];
        $this->assertCount(2, $events_from_1994);
    }

    public function testYearsAreSortedInDescendingOrder() {
        $firstEvent = new Event("Fancy", date_create("1998-03-01"), 'excerpt', 'permalink');
        $secondEvent = new Event("Less Fancy", date_create("1994-03-01"), 'excerpt', 'permalink');
        $thirdEvent = new Event("Not Fancy", date_create("1999-03-01"), 'excerpt', 'permalink');

        $events_grouped_by_year = group_events_by_year([$firstEvent, $secondEvent, $thirdEvent]);
        $this->assertEquals($events_grouped_by_year, ["1999" => [$thirdEvent],
            "1998" => [$firstEvent],  "1994" => [$secondEvent]]);
    }

    public function testYearsAreGroupedAndSortedBothInTheSameYearAndDescendingOrder() {
        $thirdEvent = new Event("Not Fancy", date_create("1994-02-02"), 'excerpt', 'permalink');

        $events_grouped_by_year = group_events_by_year([$this->firstEvent, $this->secondEvent, $thirdEvent]);

        $this->assertEquals($events_grouped_by_year, ["1994" => [$this->secondEvent, $this->firstEvent, $thirdEvent]]);
    }
}