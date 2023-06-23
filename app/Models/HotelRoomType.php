<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HotelRoomType extends Model
{

    protected $table = 'hotel_room_type';


    protected $casts = [];
    protected $fillable = ['hotel_id', 'room_type_id'];

    ########## Relations ##########
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }


}
