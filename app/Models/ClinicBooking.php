<?php

namespace App\Models;

use App\Enums\BookingStatusEnum;
use App\Enums\ClinicVisitTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class ClinicBooking extends Model //implements HasMedia
{
    use HasFactory;

    //use InteractsWithMedia;


    protected $fillable = [
        'status',
        'user_id',
        'clinic_visit_type',
        'case_description',
        'booking_datetime',
        'clinic_session_id'
    ];


    protected $attributes = [
        'status' => BookingStatusEnum::PENDING,
    ];

    protected $casts = [
        'status' => BookingStatusEnum::class,
        'clinic_visit_type' => ClinicVisitTypeEnum::class
    ];

    ########## Relations ##########
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function clinicSession(): BelongsTo
    {
        return $this->belongsTo(ClinicSession::class);
    }

    ########## Libraries ##########


}
