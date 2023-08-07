<?php

namespace App\Models;

use App\Library\Markable\HasFavorites;
use App\Services\MediaService;
use App\Traits\PlaceContactRelationTrait;
use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Maize\Markable\Markable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Clinic extends Model implements HasMedia, CanVisit
{
    use HasFactory;
    use PlaceContactRelationTrait;
    use InteractsWithMedia;
    use Markable;
    use HasVisits;
    use HasFavorites;

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
        'media',
    ];


    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope('withTotalVisitCount', function (Builder $builder) {
            $builder->withTotalVisitCount();
        });
    }

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

    public function clinicSessions(): HasMany
    {
        return $this->hasMany(ClinicSession::class);
    }


    ########## Relations ##########

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('Clinic')
            ->useFallbackUrl(env('APP_URL') . '/images/default.png')
            ->singleFile();
    }


    ########## Libraries ##########

    public function registerMediaConversions(Media $media = null): void
    {
        $media->setCustomProperty('hash', MediaService::hashImage($media->getPath()));

        $media->save();
    }


}
