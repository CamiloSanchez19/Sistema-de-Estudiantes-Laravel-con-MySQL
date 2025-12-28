<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Calificacion;

class NotasController extends Controller
{
    /**
     * Constructor
     * Aplica middleware que verifica que el usuario esté autenticado y tenga rol de estudiante
     */
    public function __construct()
    {
        // Aplica tu RoleMiddleware registrado en Kernel.php
        $this->middleware('role:estudiante');
    }

    /**
     * Mostrar calificaciones por materia
     */
    public function index()
    {
        // Obtener el estudiante correspondiente al usuario autenticado
        $estudiante = Estudiante::where('id_usuario', auth()->id())->firstOrFail();

        // Traer calificaciones agrupadas por materia
        $calificaciones = Calificacion::whereHas('matricula', function ($q) use ($estudiante) {
            $q->where('id_estudiante', $estudiante->id_estudiante);
        })
        ->with('materia')
        ->get()
        ->groupBy('id_materia');

        return view('estudiante.notas.index', compact('calificaciones'));
    }

    /**
     * Mostrar promedio general del estudiante
     */
    public function promedioGeneral()
    {
        $estudiante = Estudiante::where('id_usuario', auth()->id())->firstOrFail();

        $promedioAnual = Calificacion::whereHas('matricula', function ($q) use ($estudiante) {
            $q->where('id_estudiante', $estudiante->id_estudiante);
        })->avg('nota');

        return view('estudiante.promedio', compact('promedioAnual'));
    }
}
