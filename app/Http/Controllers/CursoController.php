<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('admin.cursos.index', compact('cursos'));
    }

    public function create()
    {
        return view('admin.cursos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_curso' => 'required|unique:cursos,nombre_curso'
        ]);

        Curso::create($request->all());

        return redirect()->route('admin.cursos.index')
            ->with('success', 'Curso creado correctamente');
    }

    public function edit(Curso $curso)
    {
        return view('admin.cursos.edit', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre_curso' => 'required|unique:cursos,nombre_curso,' . $curso->id_curso . ',id_curso'
        ]);

        $curso->update($request->all());

        return redirect()->route('admin.cursos.index')
            ->with('success', 'Curso actualizado');
    }

    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('admin.cursos.index')
            ->with('success', 'Curso eliminado');
    }
}
