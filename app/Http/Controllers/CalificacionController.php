<?php

namespace App\Http\Controllers;

use App\Models\Calificacion;
use App\Models\AsignacionDocente;
use App\Models\Matricula;
use Illuminate\Http\Request;

class CalificacionController extends Controller
{
    /**
     * Dashboard del docente: materias asignadas
     */
    public function index()
    {
        $docenteId = auth()->user()->id_usuario;

        $asignaciones = AsignacionDocente::whereHas('docente', function ($q) use ($docenteId) {
            $q->where('id_usuario', $docenteId);
        })
        ->with(['materia', 'curso'])
        ->get();

        return view('docente.calificaciones.index', compact('asignaciones'));
    }

    /**
     * Formulario para registrar / editar calificaciones
     */
    public function create($idAsignacion)
    {
        $asignacion = AsignacionDocente::with(['materia','curso'])
            ->findOrFail($idAsignacion);

        // Estudiantes matriculados en el curso
        $matriculas = Matricula::where('id_curso', $asignacion->id_curso)
            ->with('estudiante')
            ->get();

        /**
         * NOTAS YA REGISTRADAS
         * Se guardan como:
         * [ id_matricula => nota ]
         */
        $notasAnteriores = Calificacion::where('id_materia', $asignacion->id_materia)
            ->pluck('nota', 'id_matricula');

        return view(
            'docente.calificaciones.create',
            compact('asignacion', 'matriculas', 'notasAnteriores')
        );
    }

    /**
     * Guardar o actualizar calificaciones
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_matricula' => 'required|array',
            'nota'         => 'required|array',
            'id_materia'   => 'required',
            'periodo'      => 'required|in:1,2,3,4',
        ]);

        foreach ($request->id_matricula as $i => $idMatricula) {

            Calificacion::updateOrCreate(
                [
                    'id_matricula' => $idMatricula,
                    'id_materia'   => $request->id_materia,
                    'periodo'      => $request->periodo,
                ],
                [
                    'nota' => $request->nota[$i],
                ]
            );
        }

        return redirect()
            ->back()
            ->with('success', '✔ Calificaciones guardadas correctamente');
    }
}
