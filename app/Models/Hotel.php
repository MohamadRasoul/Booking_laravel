<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class Hotel extends Model //implements HasMedia
{
    use HasFactory;

    //use InteractsWithMedia;


    protected $casts = [];

    protected $fillable = [
        'name',
        'about',
        'admin_id',
        'city_id'
    ];


    ########## Relations ##########
    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function roomTypes(): BelongsToMany
    {
        return $this->belongsToMany(RoomType::class, 'hotel_room_type');
    }

    ########## Libraries ##########


    // public function registerMediaCollections(): void
    // {
    //     $this
    //         ->addMediaCollection('Hotel')
    //         ->useFallbackUrl(config('app.url') . '/images/default.jpg')
    //         ->singleFile();
    // }

}
