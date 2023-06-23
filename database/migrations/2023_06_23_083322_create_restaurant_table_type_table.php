<?php

use App\Models\Restaurant;
use App\Models\TableType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('restaurant_table_type', function (Blueprint $table) {
            $table->id();

            ######## Foreign keys  ########
            $table->foreignIdFor(Restaurant::class)->constrained();
            $table->foreignIdFor(TableType::class)->constrained();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('restaurant_table_type');
    }
};
