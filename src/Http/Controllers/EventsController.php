<?php

namespace Biigle\Modules\Metrics\Http\Controllers;

use Biigle\Http\Controllers\Views\Controller;
use Biigle\Modules\Metrics\Enums\EventType;
use Biigle\Modules\Metrics\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EventsController extends Controller
{
    /**
     * Report a new event.
     *
     * @api {post} events Report a new event
     * @apiGroup Events
     * @apiName StoreEvents
     * @apiPermission user
     * @apiDescription Events can only be reported using session-based authentication.
     *
     * @apiParam (Required parameters) {String} type The event type.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => ['required', Rule::enum(EventType::class)],
        ]);

        Event::create($data);

        return response(status: 201);
    }
}
