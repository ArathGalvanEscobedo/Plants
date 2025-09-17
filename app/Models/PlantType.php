<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantType extends Model
{
    use HasFactory;
    
    protected $table = 'plant_types';
    protected $fillable = [
        'name',
        'recommended_moisture_min',
        'recommended_moisture_max',
    ];
}
