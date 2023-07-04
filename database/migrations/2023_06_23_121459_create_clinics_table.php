<?php

use App\Models\Admin;
use App\Models\City;
use App\Models\ClinicSpecialization;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('about');
            $table->unsignedSmallInteger('experience_years');

            $table->unsignedSmallInteger('day_slot_number');  /// Enum
            $table->time('open_at');  /// Enum
            $table->time('close_at');  /// Enum
            $table->json('open_days');  /// Enum


            ######## Foreign keys  ########

            $table->foreignIdFor(ClinicSpecialization::class)->constrained();
            $table->foreignIdFor(Admin::class)->constrained();
            $table->foreignIdFor(City::class)->constrained();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinics');
    }
};
