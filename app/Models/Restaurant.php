<?php

namespace App\Models;

use App\Traits\PlaceContactRelationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class Restaurant extends Model //implements HasMedia
{
    use HasFactory;
    use PlaceContactRelationTrait;

    //use InteractsWithMedia;

    protected $fillable = [
        'name',
        'about',
        'admin_id',
        'city_id'
    ];

    protected $casts = [];


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
            ->useFallbackUrl(config('app.url') . '/images/default.jpg')
            ->singleFile();
    }

}
