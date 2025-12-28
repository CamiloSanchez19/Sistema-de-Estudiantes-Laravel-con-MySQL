<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'password' => 'required',
        ]);

        $credenciales = [
            'correo' => $request->correo,
            'password' => $request->password,
            'activo' => 1,
        ];

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            // 👉 REDIRECCIÓN POR ROL
            if (auth()->user()->rol === 'estudiante') {
                return redirect()->route('estudiante.dashboard');
            }

            if (auth()->user()->rol === 'docente') {
                return redirect()->route('docente.dashboard');
            }

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'correo' => 'Credenciales incorrectas o usuario inactivo',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
