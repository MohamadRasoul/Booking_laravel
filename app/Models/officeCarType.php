<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OfficeCarType extends Model
{
    protected $table = 'office_car_type';


    protected $casts = [];

    ########## Relations ##########
    public function carOffice(): BelongsTo
    {
        return $this->belongsTo(CarOffice::class);
    }

}
