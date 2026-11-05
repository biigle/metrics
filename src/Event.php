<?php

namespace Biigle\Modules\Metrics;

use Biigle\Modules\Metrics\Database\Factories\EventFactory;
use Biigle\Modules\Metrics\Enums\EventType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
#[Fillable(['type',])]
class Event extends Model
{
    use HasFactory;

  
    /**
     * Indicates if the model uses unique ids.
     *
     * @var bool
     */
    public $usesUniqueIds = false;

    /**
    * Get the attributes that should be cast.
    *
    * @return array<string, string>
    */
    protected function casts(): array
    {
        return [
            'type' => EventType::class,
        ];
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return EventFactory::new();
    }

    /**
     * Get the name of the "updated at" column.
     *
     * @return string|null
     */
    public function getUpdatedAtColumn()
    {
        // This model has no updated_at column.
        return null;
    }
}
