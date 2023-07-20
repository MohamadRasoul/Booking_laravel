<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('place_contacts', function (Blueprint $table) {
            $table->id();
            $table->text('about');
            $table->text('address');
            $table->string('phone_number');
            $table->string('latitude');
            $table->string('longitude');

            $table->time('open_at');
            $table->time('close_at');
            $table->json('open_days');  /// Enum


            $table->morphs('placeContactable');  /// Enum
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('place_contacts');
    }
};
