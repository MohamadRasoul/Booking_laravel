<?php

namespace App\Models;

use App\Enums\BookingStatusEnum;
use F9Web\LaravelDeletable\Traits\RestrictsDeletion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class HotelBooking extends Model //implements HasMedia
{
    use HasFactory;
    use RestrictsDeletion;

    //use InteractsWithMedia;


    protected $casts = [];

    protected $fillable = [
        'room_number',
        'escorts_number',
        'description',
        'booking_datetime',
        'user_id',
        'hotel_room_type_id'
    ];

    protected $attributes = [
        'status' => BookingStatusEnum::PENDING,
    ];

    ########## Relations ##########
    public function hotelRoomType(): BelongsTo
    {
        return $this->belongsTo(HotelRoomType::class);
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