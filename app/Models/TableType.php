<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class TableType extends Model //implements HasMedia
{
    use HasFactory;

    //use InteractsWithMedia;


    public $timestamps = false;

    protected $casts = [];

    protected $fillable = ['name'];


    ########## Relations ##########

    public function restaurants(): BelongsToMany
    {
        return $this->belongsToMany(Restaurant::class, 'restaurant_table_type');
    }

    ########## Libraries ##########


}
