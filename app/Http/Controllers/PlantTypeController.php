<?php
namespace App\Http\Controllers;

use App\Models\PlantType;
use Illuminate\Http\Request;

class PlantTypeController extends Controller
{
    public function index()
    {
        return PlantType::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:plant_types,name',
            'recommended_moisture_min' => 'numeric',
            'recommended_moisture_max' => 'numeric',
        ]);
        return PlantType::create($validated);
    }

    public function show($id)
    {
        return PlantType::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $plantType = PlantType::findOrFail($id);
        $validated = $request->validate([
            'name' => 'string|unique:plant_types,name,' . $id,
            'recommended_moisture_min' => 'numeric',
            'recommended_moisture_max' => 'numeric',
        ]);
        $plantType->update($validated);
        return $plantType;
    }

    public function destroy($id)
    {
        $plantType = PlantType::findOrFail($id);
        $plantType->delete();
        return response()->noContent();
    }
}
