<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();
        return response()->json($cursos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_curso' => 'required|string',
            'descripcion' => 'required|string',
            'semestre' => 'required|integer',
            'salon_id' => 'required|integer', // 'salon_id' => 'required|exists:salons,id
            'docente_id' => 'required|integer',
            'carrera_id' => 'required|integer',
        ]);

        $curso = Curso::create($data);
        return response()->json($curso, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        return response()->json($curso,200);
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Curso $curso)
    {
        $data = $request->validate([
            'nombre_curso' => 'required|string',
            'descripcion' => 'required|string',
            'semestre' => 'required|integer',
            'salon_id' => 'required|integer', // 'salon_id' => 'required|exists:salons,id
            'docente_id' => 'required|integer',
            'carrera_id' => 'required|integer',
        ]);

        $curso->update($data);
        return response()->json($curso, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();
        return response()->json(["message" => "Curso eliminado"]);
    }
}
