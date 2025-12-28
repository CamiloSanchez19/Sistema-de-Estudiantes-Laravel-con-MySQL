<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignacionDocente extends Model
{
    protected $table = 'asignaciones_docente';

    protected $primaryKey = 'id_asignacion';

    public $timestamps = false;

    protected $fillable = ['id_docente', 'id_materia', 'id_curso'];

    public function docente()
    {
        return $this->belongsTo(\App\Models\Usuario::class, 'id_docente');
    }

    public function materia()
    {
        return $this->belongsTo(Materia::class, 'id_materia');
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'id_curso');
    }
}

