<?php

namespace Biigle\Modules\Metrics\Http\Controllers;

use Biigle\Http\Controllers\Views\Controller;
use Biigle\Modules\Metrics\Enums\EventType;
use Biigle\Modules\Metrics\Event;

class AdminController extends Controller
{
    /**
     * Show the metrics admin page.
     */
    public function index()
    {
        $counts = Event::query()
            ->selectRaw('type, COUNT(*) as aggregate')
            ->whereIn('type', array_map(fn ($type) => $type->value, EventType::labelBotCases()))
            ->groupBy('type')
            ->pluck('aggregate', 'type');

        $labelBotEventData = array_map(fn ($type) => [
            'name' => $type->label(),
            'value' => intval($counts->get($type->value, 0)),
        ], EventType::labelBotCases());

        return view('metrics::admin', [
            'labelBotEventData' => $labelBotEventData,
            'labelBotEventTotal' => array_sum(array_column($labelBotEventData, 'value')),
        ]);
    }
}
