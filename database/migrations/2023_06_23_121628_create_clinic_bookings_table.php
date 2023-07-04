<?php

use App\Models\ClinicSession;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('clinic_bookings', function (Blueprint $table) {
            $table->id();

            $table->smallInteger('clinic_visit_type');  ///Enum
            $table->string('case_description');  ///Enum


            $table->date('booking_datetime');
            $table->string('status');


            ######## Foreign keys  ########

            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(ClinicSession::class)->constrained();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinic_bookings');
    }
};
