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
        'escorts_number',
        'description',
        'booking_datetime',
        'status',
        'user_id',
        'restaurant_id',
        'table_type_id',
    ];

    protected $attributes = [
        'status' => BookingStatusEnum::PENDING,
    ];

    protected $casts = [
        'status' => BookingStatusEnum::class,
    ];


    ########## Relations ##########
    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function tableType(): BelongsTo
    {
        return $this->belongsTo(TableType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    ########## Libraries ##########


}
