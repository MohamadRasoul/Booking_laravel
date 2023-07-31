<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class PlaceContact extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'facebook_url',
        'instagram_url',
        'about',
        'address',
        'phone_number',
        'latitude',
        'longitude',
        'open_at',
        'close_at',
        'open_days',
        'placeContactable_id',
        'placeContactable_type'
    ];

    protected $casts = [
        'open_at' => 'datetime',
        'close_at' => 'datetime',
        'open_days' => 'array',
    ];

    public function isOpen(): Attribute
    {

        return Attribute::make(
            get: function ($value, array $attributes) {
                $now_day = now()->dayOfWeek;
                $open_days = $this->open_days;
                $open_at = $this->open_at;
                $close_at = $this->close_at;

                return in_array($now_day, $open_days) &&
                    $open_at->isBefore(now()->format('H:i:s')) &&
                    $close_at->isAfter(now()->format('H:i:s'));
            },
        );
    }

    public function placeContactable(): MorphTo
    {
        return $this->morphTo();
    }
}
