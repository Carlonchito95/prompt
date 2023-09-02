<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asistencia;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asistencias = Asistencia::all();
        return response()->json($asistencias);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'docente_id' =>'required|exists:docentes,id',
            'curso_id' =>'required|exists:cursos,id',
            'hora_registro' =>'required|date',
            'presente' =>'required|boolean',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Asistencia $asistencia)
    {
        return response()->json($asistencia,200);
    }


    public function markAsistencia(Request $request, Curso $curso)
   {
    $docente = auth()->user();  // Asume que el docente ya está autenticado.
    $salon = $curso->salon;

    $distance = $this->calculateHaversineDistance(
        $request->latitude, 
        $request->longitude,
        $salon->latitude,
        $salon->longitude
    );

    if ($distance > $salon->radius) {
        return response()->json(['error' => 'No estás en el salón.'], 400);
    }

    // Aquí registrarías la asistencia y responderías con éxito.
}

private function calculateHaversineDistance($lat1, $lon1, $lat2, $lon2)
{
    $earthRadius = 6371000;  // radio en metros

    $latDelta = deg2rad($lat2 - $lat1);
    $lonDelta = deg2rad($lon2 - $lon1);

    $a = sin($latDelta / 2) * sin($latDelta / 2) +
        cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
        sin($lonDelta / 2) * sin($lonDelta / 2);

    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    $distance = $earthRadius * $c;

    return $distance;
}
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
