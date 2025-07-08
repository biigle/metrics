<?php

namespace Biigle\Tests\Modules\Metrics\Http\Controllers;

use ApiTestCase;
use Biigle\Modules\Metrics\Enums\EventType;
use Biigle\Modules\Metrics\Event;

class EventsControllerTest extends ApiTestCase
{
    public function testStore()
    {
        $this->doTestApiRoute('POST', '/api/v1/events');
        $this->beGuest();

        $this
            ->json('POST', '/api/v1/events', [
                'type' => 'unknown event',
            ])
            ->assertStatus(422);

        $this
            ->json('POST', '/api/v1/events', [
                'type' => 'labelbot_chose_label_1',
            ])
            ->assertStatus(201);

        $event = Event::first();
        $this->assertEquals(EventType::LabelBotChoseLabel1, $event->type);
    }

    public function testStoreWithToken()
    {
        $this->callToken('POST', '/api/v1/events', $this->guest())
            ->assertStatus(401);
    }
}
