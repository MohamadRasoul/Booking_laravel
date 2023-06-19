<?php

use App\Models\OfficeCarType;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('car_bookings', function (Blueprint $table) {
            $table->id();

            $table->string('car_number')->nullable();
            $table->string('color')->nullable();
            $table->string('manufacture_company')->nullable();

            $table->text('address_details');
            $table->unsignedSmallInteger('seat_number');

            $table->string('latitude_from');
            $table->string('longitude_from');

            $table->string('latitude_to');
            $table->string('longitude_to');

            $table->dateTime('booking_datetime');
            $table->string('status');


            ######## Foreign keys  ########

            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(OfficeCarType::class)->constrained('office_car_type');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car_bookings');
    }
};
