<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class CarType extends Model //implements HasMedia
{
    use HasFactory;

    //use InteractsWithMedia;

    public $timestamps = false;

    protected $fillable = ['name'];

    protected $casts = [];


    ########## Relations ##########

    public function carOffices(): BelongsToMany
    {
        return $this->belongsToMany(CarOffice::class, 'office_car_type');
    }

    ########## Libraries ##########


}
