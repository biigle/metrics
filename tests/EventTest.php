<?php

namespace Biigle\Tests\Modules\Metrics;

use Biigle\Modules\Metrics\Event;
use TestCase;

class EventTest extends TestCase
{
    public function testAttributes()
    {
        $event = Event::factory()->create();
        $this->assertNotNull($event->type);
        $this->assertNotNull($event->created_at);
        $this->assertNull($event->updated_at);
    }
}
