<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class EstudianteDashboardController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        $estudiante = $usuario->estudiante;

        return view('dashboard.estudiante', compact('estudiante'));
    }
}
