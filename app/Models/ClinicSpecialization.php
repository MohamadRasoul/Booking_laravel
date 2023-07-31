<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class ClinicSpecialization extends Model //implements HasMedia
{
    use HasFactory;

    //use InteractsWithMedia;


    public $timestamps = false;

    protected $fillable = ['name'];

    protected $casts = [];


    ########## Relations ##########


    ########## Libraries ##########


}
