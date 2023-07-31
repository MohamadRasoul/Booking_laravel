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
        'status',
        'car_number',
        'color',
        'manufacture_company',
        'address_details',
        'escorts_number',
        'latitude_from',
        'longitude_from',
        'latitude_to',
        'longitude_to',
        'booking_datetime',
        'user_id',
        'car_office_id',
        'car_type_id',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = [];

    protected $attributes = [
        'status' => BookingStatusEnum::PENDING,
    ];

    ########## Relations ##########
    public function carOffice(): BelongsTo
    {
        return $this->belongsTo(CarOffice::class);
    }

    public function carType(): BelongsTo
    {
        return $this->belongsTo(CarType::class);
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
