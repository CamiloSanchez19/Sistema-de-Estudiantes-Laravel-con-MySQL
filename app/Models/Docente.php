<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'docentes';
    protected $primaryKey = 'id_docente';
    public $timestamps = false;

    protected $fillable = [
        'nombres',
        'apellidos',
        'especialidad',
        'telefono',
        'email',
        'id_usuario'
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    public function asignaciones()
    {
        return $this->hasMany(AsignacionDocente::class, 'id_docente');
    }
}
