<?php

namespace App\Models;

use App\Services\MediaService;
use App\Traits\PlaceContactRelationTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Maize\Markable\Markable;
use Maize\Markable\Models\Favorite;




class Restaurant extends Model implements HasMedia
{
    use HasFactory;
    use PlaceContactRelationTrait;
    use InteractsWithMedia;
    use Markable;

    protected $fillable = [
        'name',
        'about',
        'user_id',
        'city_id'
    ];

    protected $casts = [];


    protected $with = [
        'media',
        'favorites'
    ];



    protected function favoriteCount(): Attribute
    {
        return Attribute::make(
            get: fn () => Favorite::count($this),
        );
    }


    protected static $marks = [
        Favorite::class,
    ];

    ########## Relations ##########
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function tableTypes(): BelongsToMany
    {
        return $this->belongsToMany(TableType::class, 'restaurant_table_type');
    }

    ########## Libraries ##########


    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('Restaurant')
            ->useFallbackUrl(env('APP_URL') . '/images/default.png')
            ->singleFile();
    }


    public function registerMediaConversions(Media $media = null): void
    {
        $media->setCustomProperty('hash', MediaService::hashImage($media->getPath()));

        $media->save();
    }
}
