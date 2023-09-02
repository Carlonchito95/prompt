<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    public function docente(){
        return $this->belongsTo(Docente::class);
    }

public function salon(){
        return $this->belongsTo(Salon::class);
    }

public function asistencias(){
        return $this->hasMany(Asistencia::class);
    }
}
