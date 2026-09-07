<?php

namespace Biigle\Modules\Metrics\Http\Controllers;

use Biigle\Http\Controllers\Views\Controller;
use Biigle\Modules\Metrics\Enums\EventType;
use Biigle\Modules\Metrics\Event;
use Illuminate\Support\Collection;

class AdminController extends Controller
{
    /**
     * Show the metrics admin page.
     */
    public function index()
    {
        $types = array_merge(EventType::labelBotCases(), EventType::askBiigleCases());

        $counts = Event::query()
            ->selectRaw('type, COUNT(*) as aggregate')
            ->whereIn('type', array_map(fn ($type) => $type->value, $types))
            ->groupBy('type')
            ->pluck('aggregate', 'type');

        $labelBotEventData = $this->eventData(EventType::labelBotCases(), $counts);
        $askBiigleEventData = $this->eventData(EventType::askBiigleCases(), $counts);

        return view('metrics::admin', [
            'labelBotEventData' => $labelBotEventData,
            'labelBotEventTotal' => array_sum(array_column($labelBotEventData, 'value')),
            'askBiigleEventData' => $askBiigleEventData,
            'askBiigleEventTotal' => array_sum(array_column($askBiigleEventData, 'value')),
        ]);
    }

    /**
     * Get the counts of the given event types in the order of the types.
     *
     * @param array<int, EventType> $types
     * @param Collection $counts
     * @return array<int, array{name: string, value: int}>
     */
    protected function eventData(array $types, Collection $counts)
    {
        return array_map(fn ($type) => [
            'name' => $type->label(),
            'value' => intval($counts->get($type->value, 0)),
        ], $types);
    }
}
