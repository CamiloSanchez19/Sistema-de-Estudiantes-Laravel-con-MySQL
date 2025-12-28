<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Curso;
use App\Models\Materia;

class DocenteDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.docente', [
            'totalEstudiantes' => Estudiante::count(),
            'totalCursos'      => Curso::count(),
            'totalMaterias'    => Materia::count(),
            
        ]);
    }
}