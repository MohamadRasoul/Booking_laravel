<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RestaurantTableType extends Model
{
    protected $table = 'restaurant_table_type';
    protected $fillable = ['room_number', 'restaurant_id', 'table_type_id'];

    protected $casts = [];


    ########## Relations ##########


    public function restaurant(): BelongsTo
    {
        return $this->belongsTo(Restaurant::class);
    }


}
