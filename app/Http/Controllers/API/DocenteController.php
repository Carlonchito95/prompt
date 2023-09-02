<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    
    public function index()
    {
        //para obtener los docentes
        $docentes = Docente::all();
        //retornar los docentes
        return response()->json($docentes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //aca van las validaciones del request
        $data=$request->validate([
            'nombre' =>'required|string',
            'apellido_paterno' =>'required|string',
            'apellido_materno' =>'required|string',
            'email' =>'required|email|unique:docentes',
            'password' =>'required|string|min:8'
        ]);
        $docente = Docente::create($data);
        return response()->json($docente);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $docente)
    {
        return response()->json($docente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Docente $docente)
    {
        $data=$request->validate([
            'nombre' =>'required|string',
            'apellido_paterno' =>'required|string',
            'apellido_materno' =>'required|string',
            'email' =>'required|email|unique:docentes',
            'password' =>'required|string|min:8'
        ]);

        $docente->update($data);
        return response()->json($docente);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Docente $docente)
    {
        $docente->delete();
        return response()->json(['message' => 'Docente eliminado'],200);
    }   
}
