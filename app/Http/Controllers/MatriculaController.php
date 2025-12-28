<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Estudiante;
use App\Models\Curso;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    public function index()
    {
        $matriculas = Matricula::with(['estudiante', 'curso'])->get();
        return view('admin.matriculas.index', compact('matriculas'));
    }

    public function create()
    {
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();

        return view('admin.matriculas.create', compact('estudiantes', 'cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_estudiante' => 'required',
            'id_curso' => 'required',
        ]);

        Matricula::create($request->all());

        return redirect()->route('admin.matriculas.index')
            ->with('success', 'Matrícula creada correctamente');
    }

    public function destroy(Matricula $matricula)
    {
        $matricula->delete();

        return redirect()->route('admin.matriculas.index')
            ->with('success', 'Matrícula eliminada');
    }
}
