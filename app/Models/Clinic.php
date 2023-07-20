<?php

namespace App\Models;

use App\Traits\PlaceContactRelationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class Clinic extends Model //implements HasMedia
{
    use HasFactory;
    use PlaceContactRelationTrait;

    //use InteractsWithMedia;


    protected $fillable = [
        'name',
        'about',
        'experience_years',
        'session_duration',
        'clinic_specialization_id',
        'admin_id',
        'city_id'
    ];

    protected $casts = [
        'open_days' => 'array'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function clinicSpecialization(): BelongsTo
    {
        return $this->belongsTo(ClinicSpecialization::class);
    }


    ########## Relations ##########

    public function clinicSessions(): HasMany
    {
        return $this->hasMany(ClinicSession::class);
    }



    ########## Libraries ##########


    // public function registerMediaCollections(): void
    // {
    //     $this
    //         ->addMediaCollection('Clinic')
    //         ->useFallbackUrl(config('app.url') . '/images/default.jpg')
    //         ->singleFile();
    // }

}
