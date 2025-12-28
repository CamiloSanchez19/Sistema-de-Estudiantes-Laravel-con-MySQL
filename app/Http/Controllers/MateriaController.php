<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::all();
        return view('admin.materias.index', compact('materias'));
    }

    public function create()
    {
        return view('admin.materias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_materia' => 'required|unique:materias,nombre_materia'
        ]);

        Materia::create($request->all());

        return redirect()->route('admin.materias.index')
            ->with('success', 'Materia creada correctamente');
    }

    public function edit(Materia $materia)
    {
        return view('admin.materias.edit', compact('materia'));
    }

    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre_materia' => 'required|unique:materias,nombre_materia,' . $materia->id_materia . ',id_materia'
        ]);

        $materia->update($request->all());

        return redirect()->route('admin.materias.index')
            ->with('success', 'Materia actualizada');
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();

        return redirect()->route('admin.materias.index')
            ->with('success', 'Materia eliminada');
    }
}
