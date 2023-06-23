<?php

namespace App\Models;

use App\Enums\BookingStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class RestaurantBooking extends Model //implements HasMedia
{
    use HasFactory;

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

    ########## Libraries ##########

    public function isDeletable(): bool
    {
        if ((int)$this->status !== BookingStatusEnum::PENDING->value) {
            return $this->denyDeletionReason('this booking is finish... you can\'t deleted');
        }

        return true;
    }

}
