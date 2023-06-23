<?php

use App\Models\Hotel;
use App\Models\RoomType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('hotel_room_type', function (Blueprint $table) {
            $table->id();
            
            ######## Foreign keys  ########
            $table->foreignIdFor(Hotel::class)->constrained();
            $table->foreignIdFor(RoomType::class)->constrained();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hotel_room_type');
    }
};
