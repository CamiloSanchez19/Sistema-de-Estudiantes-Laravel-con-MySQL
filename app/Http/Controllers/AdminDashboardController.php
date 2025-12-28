<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Docente;
use App\Models\Materia;
use App\Models\Curso;
use App\Models\Usuario;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.admin', [
            'totalEstudiantes' => Estudiante::count(),
            'totalDocentes'    => Usuario::where('rol', 'docente')->count(),
            'totalMaterias'    => Materia::count(),
            'totalCursos'      => Curso::count(),
        ]);
    }
}
