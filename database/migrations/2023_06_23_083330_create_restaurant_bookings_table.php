<?php

use App\Models\Restaurant;
use App\Models\TableType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('restaurant_bookings', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('table_number')->nullable();

            $table->unsignedSmallInteger('escorts_number')->default(0);
            $table->text('description')->nullable();

            $table->dateTime('booking_datetime');
            $table->string('status');


            ######## Foreign keys  ########

            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Restaurant::class)->constrained('restaurant_table_type');
            $table->foreignIdFor(TableType::class)->constrained('restaurant_table_type');


            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('restaurant_bookings');
    }
};
