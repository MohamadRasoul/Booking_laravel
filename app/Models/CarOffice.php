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
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class CarOffice extends Model implements HasMedia, CanVisit
{
    use HasFactory;
    use PlaceContactRelationTrait;
    use InteractsWithMedia;
    use HasVisits;
    use HasFavorites;

    protected $fillable = [
        'name',
        'user_id',
        'city_id'
    ];
    protected $casts = [];
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


    public function carBookings(): HasMany
    {
        return $this->hasMany(CarBooking::class);
    }


    ########## Relations ##########

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function carTypes(): BelongsToMany
    {
        return $this->belongsToMany(CarType::class, 'office_car_type');
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('CarOffice')
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
