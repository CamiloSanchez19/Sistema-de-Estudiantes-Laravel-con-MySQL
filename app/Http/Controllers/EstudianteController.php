<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('admin.estudiantes.index', compact('estudiantes'));
    }

    public function create()
    {
        return view('admin.estudiantes.create');
    }

public function store(Request $request)
{
    $request->validate([
        'correo' => 'required|email|unique:usuarios,correo',
        'password' => 'required|min:6',

        'documento' => 'required|unique:estudiantes,documento',
        'nombres' => 'required',
        'apellidos' => 'required',
        'fecha_nacimiento' => 'required|date',
        'tipo_sangre' => 'required',
        'sexo' => 'required',
        'direccion' => 'required',
        'barrio' => 'required',
        'telefono' => 'required',
    ]);

    DB::transaction(function () use ($request) {

        $usuario = Usuario::create([
            'correo' => $request->correo,
            'contraseña' => Hash::make($request->password),
            'rol' => 'estudiante',
            'activo' => true,
        ]);

        Estudiante::create([
            'documento' => $request->documento,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'tipo_sangre' => $request->tipo_sangre,
            'sexo' => $request->sexo,
            'direccion' => $request->direccion,
            'barrio' => $request->barrio,
            'telefono' => $request->telefono,
            'id_usuario' => $usuario->id_usuario,
        ]);
    });

    return redirect()->route('admin.estudiantes.index')
        ->with('success', 'Estudiante registrado correctamente');
}
    public function edit(Estudiante $estudiante)
    {
        return view('admin.estudiantes.edit', compact('estudiante'));
    }

    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'documento' => 'required|unique:estudiantes,documento,' . $estudiante->id_estudiante . ',id_estudiante',
            'nombres' => 'required',
            'apellidos' => 'required',
            'fecha_nacimiento' => 'required|date',
            'tipo_sangre' => 'required',
            'sexo' => 'required',
            'direccion' => 'required',
            'barrio' => 'required',
            'telefono' => 'required',
        ]);

        $estudiante->update([
            'documento' => $request->documento,
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'tipo_sangre' => $request->tipo_sangre,
            'sexo' => $request->sexo,
            'direccion' => $request->direccion,
            'barrio' => $request->barrio,
            'telefono' => $request->telefono,
        ]);

        return redirect()->route('admin.estudiantes.index')
            ->with('success', 'Estudiante actualizado');
    }

    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('admin.estudiantes.index')
            ->with('success', 'Estudiante eliminado');
    }
}
