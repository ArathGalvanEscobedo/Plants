<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\PlantTypeController;

Route::apiResource('plant_types', PlantTypeController::class);
Route::apiResource('devices', DeviceController::class);
Route::post('devices/{device}/readings', [DeviceController::class, 'storeReading']);
Route::get('devices/{device}/status', [DeviceController::class, 'getStatus']);
Route::post('devices/{device}/water', [DeviceController::class, 'triggerWatering']);

// 👇 Ruta de prueba para confirmar que carga el controlador
Route::get('/debug-plant', [PlantTypeController::class, 'index']);
