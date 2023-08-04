<?php

namespace App\Models;

use App\Enums\BookingStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class HotelBooking extends Model //implements HasMedia
{
    use HasFactory;

    //use InteractsWithMedia;


    protected $fillable = [
        'room_number',
        'escorts_number',
        'description',
        'booking_datetime',
        'status',
        'user_id',
        'hotel_id',
        'room_type_id'
    ];

    protected $attributes = [
        'status' => BookingStatusEnum::PENDING,
    ];

    protected $casts = [
        'status' => BookingStatusEnum::class,
    ];

    ########## Relations ##########

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    public function roomType(): BelongsTo
    {
        return $this->belongsTo(RoomType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    ########## Libraries ##########


}
