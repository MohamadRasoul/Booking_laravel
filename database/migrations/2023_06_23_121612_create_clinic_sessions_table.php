<?php

use App\Models\Clinic;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('clinic_sessions', function (Blueprint $table) {
            $table->id();

            $table->unsignedSmallInteger('slot_of_day');
            $table->time('start_time');
            $table->time('end_time');


            ######## Foreign keys  ########

            $table->foreignIdFor(Clinic::class)->constrained('cities');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clinic_sessions');
    }
};
