<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'name',
        'plant_type_id',
        'moisture_threshold',
        'watering_mode',
        'water_amount_ml',
        'watering_schedule_start',
        'watering_schedule_end',
    ];
    public function plantType()
    {
        return $this->belongsTo(PlantType::class);
    }

    public function sensorReadings()
    {
        return $this->hasMany(SensorReading::class);
    }
}
