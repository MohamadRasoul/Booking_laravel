<?php

use App\Models\CarOffice;
use App\Models\CarType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('office_car_type', function (Blueprint $table) {
            $table->id();

            ######## Foreign keys  ########
            $table->foreignIdFor(CarOffice::class)->constrained();
            $table->foreignIdFor(CarType::class)->constrained();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('office_car_type');
    }
};
