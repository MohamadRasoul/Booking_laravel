<?php

namespace App\Models;

use App\Services\MediaService;
use App\Traits\PlaceContactRelationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Clinic extends Model implements HasMedia
{
    use HasFactory;
    use PlaceContactRelationTrait;
    use InteractsWithMedia;


    protected $fillable = [
        'name',
        'about',
        'experience_years',
        'session_duration',
        'clinic_specialization_id',
        'user_id',
        'city_id'
    ];

    protected $casts = [
        'open_days' => 'array'
    ];


    protected $with = [
        'media'
    ];


    public function clinicBookings(): HasManyThrough
    {
        return $this->hasManyThrough(ClinicBooking::class, ClinicSession::class);
    }

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


    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('Clinic')
            ->useFallbackUrl(env('APP_URL') . '/images/default.png')
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $media->setCustomProperty('hash', MediaService::hashImage($media->getPath()));

        $media->save();
    }

}
