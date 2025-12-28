<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\AsignacionDocenteController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DocenteDashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\EstudianteDashboardController;
use App\Http\Controllers\NotasController;


Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Dashboard general según el rol del usuario autenticado
|--------------------------------------------------------------------------
| Redirige automáticamente al panel correspondiente:
| - admin → dashboard de administrador
| - docente → dashboard de docente
| - estudiante → dashboard de estudiante
*/
Route::middleware(['auth'])->get('/dashboard', function () {
    $rol = auth()->user()->rol;

    return match ($rol) {
        'admin'      => redirect()->route('admin.dashboard'),
        'docente'    => redirect()->route('docente.dashboard'),
        'estudiante' => redirect()->route('estudiante.dashboard'),
        default      => abort(403),
    };
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Rutas de perfil de usuario
|--------------------------------------------------------------------------
| Permite editar, actualizar y eliminar el perfil del usuario autenticado
*/
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

/*
|--------------------------------------------------------------------------
| Dashboard del administrador
|--------------------------------------------------------------------------
| Acceso exclusivo para usuarios con rol "admin"
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');
});

/*
|--------------------------------------------------------------------------
| Dashboard del docente
|--------------------------------------------------------------------------
| Acceso exclusivo para usuarios con rol "docente"
*/
Route::middleware(['auth', 'role:docente'])->prefix('docente')->name('docente.')->group(function () {
    Route::get('/dashboard', [DocenteDashboardController::class, 'index'])->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Dashboard del estudiante
|--------------------------------------------------------------------------
| Acceso exclusivo para usuarios con rol "estudiante"
*/
Route::middleware(['auth', 'role:estudiante'])->prefix('estudiante')->name('estudiante.')->group(function () {
    Route::get('/dashboard', [EstudianteDashboardController::class, 'index'])->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Registro de calificaciones (Docente)
|--------------------------------------------------------------------------
| El docente puede:
| - Ver el formulario para registrar calificaciones
| - Guardar las calificaciones de una asignación específica
*/
Route::middleware(['auth', 'role:docente'])->prefix('docente')->name('docente.')->group(function () {
    Route::get('calificaciones/create/{idAsignacion}', [CalificacionController::class, 'create'])
        ->name('calificaciones.create');

    Route::post('calificaciones', [CalificacionController::class, 'store'])
        ->name('calificaciones.store');
});

/*
|--------------------------------------------------------------------------
| Rutas de notas del estudiante
|--------------------------------------------------------------------------
| Permite al estudiante:
| - Ver sus notas por materia y periodo
| - Consultar su promedio general
*/
Route::middleware(['auth'])->group(function () {

    // Panel principal de notas del estudiante
    Route::get('estudiante/notas', [NotasController::class, 'index'])
        ->name('estudiante.notas.index');

    // Promedio general del estudiante
    Route::get('estudiante/promedio', [NotasController::class, 'promedioGeneral'])
        ->name('estudiante.promedio');
});

/*
|--------------------------------------------------------------------------
| Autenticación personalizada
|--------------------------------------------------------------------------
| Login y logout del sistema
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

// Cierre de sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| CRUD Administrador
|--------------------------------------------------------------------------
| Gestión completa de entidades del sistema (solo admin)
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('estudiantes', EstudianteController::class);
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('materias', MateriaController::class);
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('matriculas', MatriculaController::class);
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('cursos', CursoController::class);
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('asignaciones', AsignacionDocenteController::class);
});

/*
|--------------------------------------------------------------------------
| CRUD de calificaciones (Docente)
|--------------------------------------------------------------------------
| Gestión completa de calificaciones por parte del docente
*/
Route::middleware(['auth', 'role:docente'])->prefix('docente')->name('docente.')->group(function () {
    Route::resource('calificaciones', CalificacionController::class);
});

/*
|--------------------------------------------------------------------------
| Rutas de autenticación por defecto (Laravel Breeze / Fortify)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Rutas de autenticación adicionales
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
