<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

//use Spatie\MediaLibrary\HasMedia;
//use Spatie\MediaLibrary\InteractsWithMedia;

class ClinicSession extends Model //implements HasMedia
{
    use HasFactory;

    //use InteractsWithMedia;


    public $timestamps = false;

    protected $fillable = [
        'slot_of_day',
        'start_time',
        'end_time',
        'clinic_id'
    ];


    protected $casts = [];


    ########## Relations ##########
    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }

    ########## Libraries ##########


    // public function registerMediaCollections(): void
    // {
    //     $this
    //         ->addMediaCollection('ClinicSession')
    //         ->useFallbackUrl(config('app.url') . '/images/default.jpg')
    //         ->singleFile();
    // }

}
