<?php

namespace App\Models;

use App\Enums\BookingStatusEnum;
use F9Web\LaravelDeletable\Traits\RestrictsDeletion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class CarBooking extends Model //implements HasMedia
{
    use HasFactory;
    use RestrictsDeletion;

    //use InteractsWithMedia;

    protected $fillable = [
        'car_number',
        'color',
        'manufacture_company',
        'address_details',
        'seat_number',
        'latitude_from',
        'longitude_from',
        'latitude_to',
        'longitude_to',
        'booking_datetime',
        'status',
        'office_car_type_id'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = [];

    protected $attributes = [
        'status' => BookingStatusEnum::PENDING,
    ];

    ########## Relations ##########
    public function officeCarType(): BelongsTo
    {
        return $this->belongsTo(OfficeCarType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    ########## Libraries ##########
    public function isDeletable(): bool
    {
        if ($this->status != BookingStatusEnum::PENDING->value) {
            return $this->denyDeletionReason('this booking is finish... you can\'t deleted');
        }

        return true;
    }

}
