<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorReading extends Model
{
    protected $fillable = [
        'device_id',
        'moisture',
        'light',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
