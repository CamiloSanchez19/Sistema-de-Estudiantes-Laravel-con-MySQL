<?php

namespace App\Http\Controllers;

use App\Models\AsignacionDocente;
use App\Models\Docente;
use App\Models\Materia;
use App\Models\Curso;
use Illuminate\Http\Request;
use App\Models\Usuario;

class AsignacionDocenteController extends Controller
{
    public function index()
    {
        $asignaciones = AsignacionDocente::with(['docente','materia','curso'])->get();
        return view('admin.asignaciones.index', compact('asignaciones'));
    }

public function create()
{
    return view('admin.asignaciones.create', [
        'docentes' => Usuario::where('rol', 'docente')->get(),
        'materias' => Materia::all(),
        'cursos' => Curso::all(),
    ]);
}

public function store(Request $request)
{
    $request->validate([
        'id_usuario_docente' => 'required',
        'id_materia' => 'required',
        'id_curso' => 'required',
    ]);

    // Guardar mapeando el input al nombre de columna correcto
    AsignacionDocente::create([
        'id_docente' => $request->id_usuario_docente,
        'id_materia' => $request->id_materia,
        'id_curso' => $request->id_curso,
    ]);

    return redirect()->route('admin.asignaciones.index')
        ->with('success', 'Asignación creada correctamente');
}

 }