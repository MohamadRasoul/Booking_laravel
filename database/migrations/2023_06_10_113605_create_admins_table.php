<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();

            // $table->string('text');




           
            ######## Foreign keys  ########

            // $table->foreignIdFor(City::class)->constrained('cities')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
