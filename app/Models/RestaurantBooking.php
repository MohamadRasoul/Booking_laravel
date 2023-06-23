<?php

namespace App\Models;

use App\Enums\BookingStatusEnum;
use F9Web\LaravelDeletable\Traits\RestrictsDeletion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class RestaurantBooking extends Model //implements HasMedia
{
    use HasFactory;
    use RestrictsDeletion;

    //use InteractsWithMedia;

    protected $fillable = [
        'table_number',
        'description',
        'booking_datetime',
        'user_id',
        'restaurant_table_type_id'
    ];

    protected $attributes = [
        'status' => BookingStatusEnum::PENDING,
    ];

    protected $casts = [];


    ########## Relations ##########
    public function restaurantTableType(): BelongsTo
    {
        return $this->belongsTo(RestaurantTableType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    ########## Libraries ##########

    public function isDeletable(): bool
    {
        if ((int)$this->status !== BookingStatusEnum::PENDING->value) {
            return $this->denyDeletionReason('this booking is finish... you can\'t deleted');
        }

        return true;
    }

}
