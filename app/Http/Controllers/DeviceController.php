<?php

namespace App\Http\Controllers;


use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
    {
        return Device::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'plant_type_id' => 'nullable|exists:plant_types,id',
            'moisture_threshold' => 'numeric',
            'watering_mode' => 'in:auto,manual',
            'water_amount_ml' => 'integer',
            'watering_schedule_start' => 'nullable|string',
            'watering_schedule_end' => 'nullable|string',
        ]);
        return Device::create($validated);
    }

    public function show($id)
    {
        return Device::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $validated = $request->validate([
            'name' => 'string',
            'plant_type_id' => 'nullable|exists:plant_types,id',
            'moisture_threshold' => 'numeric',
            'watering_mode' => 'in:auto,manual',
            'water_amount_ml' => 'integer',
            'watering_schedule_start' => 'nullable|string',
            'watering_schedule_end' => 'nullable|string',
        ]);
        $device->update($validated);
        return $device;
    }

    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $device->delete();
        return response()->noContent();
    }
    // POST /devices/{device}/readings
    public function storeReading(Request $request, Device $device)
    {
        $validated = $request->validate([
            'moisture' => 'required|numeric',
            'light' => 'required|numeric',
        ]);
        $reading = $device->sensorReadings()->create($validated);
        return response()->json($reading, 201);
    }

    // GET /devices/{device}/status
    public function getStatus(Device $device)
    {
        $latestReading = $device->sensorReadings()->latest()->first();
        return response()->json([
            'device' => $device,
            'latest_reading' => $latestReading,
        ]);
    }

    // POST /devices/{device}/water
    public function triggerWatering(Device $device)
    {
        // Aquí iría la lógica real de riego, por ahora solo simula la acción
        // Puedes agregar eventos, jobs, etc. según tu necesidad
        return response()->json([
            'message' => 'Watering triggered for device ' . $device->id,
            'water_amount_ml' => $device->water_amount_ml,
        ]);
    }
}
