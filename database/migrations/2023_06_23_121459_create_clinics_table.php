<?php

use App\Models\City;
use App\Models\ClinicSpecialization;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->unsignedSmallInteger('experience_years');

            $table->unsignedSmallInteger('session_duration');  /// Enum


            ######## Foreign keys  ########

            $table->foreignIdFor(ClinicSpecialization::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(City::class)->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinics');
    }
};
