<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class Admin extends Authenticatable //implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable;

    //use InteractsWithMedia;

    protected $fillable = [
        'name',
        'username',
        'password',
    ];

    protected $casts = [
        'password' => 'hashed'
    ];


    ########## Relations ##########


    ########## Libraries ##########


    // public function registerMediaCollections(): void
    // {
    //     $this
    //         ->addMediaCollection('Admin')
    //         ->useFallbackUrl(env('APP_URL') . '/images/default.jpg')
    //         ->singleFile();
    // }

}
