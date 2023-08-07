<?php

namespace App\Models;

use App\Enums\ModelEnum;
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
use Maize\Markable\Markable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class Restaurant extends Model implements HasMedia, CanVisit
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    ########## Relations ##########

    public function restaurantBookings(): HasMany
    {
        return $this->hasMany(RestaurantBooking::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function tableTypes(): BelongsToMany
    {
        return $this->belongsToMany(TableType::class, 'restaurant_table_type');
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('Restaurant')
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
