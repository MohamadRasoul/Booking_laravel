<?php

namespace App\Models;

use App\Traits\PlaceContactRelationTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class CarOffice extends Model //implements HasMedia
{
    use HasFactory;
    use PlaceContactRelationTrait;

    //use InteractsWithMedia;

    protected $fillable = [
        'name',
        'admin_id',
        'city_id'
    ];

    protected $casts = [];
    
    ########## Relations ##########
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function carTypes(): BelongsToMany
    {
        return $this->belongsToMany(CarType::class, 'office_car_type');
    }
    ########## Libraries ##########


    // public function registerMediaCollections(): void
    // {
    //     $this
    //         ->addMediaCollection('CarOffice')
    //         ->useFallbackUrl(config('app.url') . '/images/default.jpg')
    //         ->singleFile();
    // }

}
