<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('plant_type_id')->nullable()->constrained('plant_types')->nullOnDelete();
            $table->float('moisture_threshold')->default(50);
            $table->enum('watering_mode', ['auto', 'manual'])->default('auto');
            $table->integer('water_amount_ml')->default(100);
            $table->string('watering_schedule_start')->nullable();
            $table->string('watering_schedule_end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
