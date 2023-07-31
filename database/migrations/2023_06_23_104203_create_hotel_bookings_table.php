<?php

use App\Models\Hotel;
use App\Models\RoomType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('hotel_bookings', function (Blueprint $table) {
            $table->id();

            $table->integer('room_number')->nullable();

            $table->unsignedSmallInteger('escorts_number')->default(0);
            $table->text('description')->nullable();

            $table->dateTime('booking_datetime');
            $table->string('status');


            ######## Foreign keys  ########

            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Hotel::class)->constrained('hotel_room_type');
            $table->foreignIdFor(RoomType::class)->constrained('hotel_room_type');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hotel_bookings');
    }
};
