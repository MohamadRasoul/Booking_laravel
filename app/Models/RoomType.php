<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class RoomType extends Model //implements HasMedia
{
    use HasFactory;

    //use InteractsWithMedia;

    public $timestamps = false;

    protected $casts = [];

    protected $fillable = ['name'];

    ########## Relations ##########


    ########## Libraries ##########


    // public function registerMediaCollections(): void
    // {
    //     $this
    //         ->addMediaCollection('RoomType')
    //         ->useFallbackUrl(config('app.url') . '/images/default.jpg')
    //         ->singleFile();
    // }

}
