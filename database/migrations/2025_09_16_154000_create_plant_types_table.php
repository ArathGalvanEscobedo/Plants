<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('plant_types', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->float('recommended_moisture_min')->default(40);
            $table->float('recommended_moisture_max')->default(70);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plant_types');
    }
};
