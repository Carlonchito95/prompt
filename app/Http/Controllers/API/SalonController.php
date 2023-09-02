<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Salon;

class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Salon::all(); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación y creación de un salón
        $data = $request->validate([
            'nombre' => 'required|string',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'radius' => 'required|numeric',
        ]);

        $salon = Salon::create($data);
        return response()->json($salon, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $salon)
    {
        return $salon;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salon $salon)
    {
        // Validación y actualización de un salón
        $data = $request->validate([
            'nombre' => 'required|string',
            'longitude' => 'required|numeric',
            'latitude' => 'required|numeric',
            'radius' => 'required|numeric',
        ]);
        $salon->update($data);
        return response()->json($salon, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salon $salon)
    {
        $salon->delete();
        return response()->json(null, 204);
    }
}
