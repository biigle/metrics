<?php

namespace Biigle\Modules\Metrics\Database\Factories;

use Biigle\Modules\Metrics\Enums\EventType;
use Biigle\Modules\Metrics\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => EventType::LabelBotChoseLabel1,
        ];
    }
}
