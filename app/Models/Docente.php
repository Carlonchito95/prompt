<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
    public function cursos(){
        return $this->hasMany(Curso::class);
    }

    public function asistencias(){
        return $this->hasMany(Asistencia::class);
    }
}
