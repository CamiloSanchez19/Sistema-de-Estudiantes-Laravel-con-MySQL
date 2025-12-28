@extends('layouts.dashboard')

@section('title', 'Panel Administrador')

@section('content')

<!-- ENCABEZADO -->
<div class="mb-10">
    <p class="text-slate-500 mt-1">
        Resumen general del sistema académico
    </p>
</div>

<!-- TARJETAS -->
<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-12">

    <!-- ESTUDIANTES -->
    <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 text-black rounded-2xl shadow-lg p-6">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm uppercase tracking-wide opacity-90">Estudiantes</p>
                <p class="text-4xl font-extrabold mt-2">{{ $totalEstudiantes }}</p>
            </div>
        </div>
    </div>

    <!-- DOCENTES -->
    <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 text-black rounded-2xl shadow-lg p-6">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm uppercase tracking-wide opacity-90">Docentes</p>
                <p class="text-4xl font-extrabold mt-2">{{ $totalDocentes }}</p>
            </div>
        </div>
    </div>

    <!-- MATERIAS -->
    <div class="bg-gradient-to-br from-orange-500 to-orange-600 text-black rounded-2xl shadow-lg p-6">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm uppercase tracking-wide opacity-90">Materias</p>
                <p class="text-4xl font-extrabold mt-2">{{ $totalMaterias }}</p>
            </div>
        </div>
    </div>

    <!-- CURSOS -->
    <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-black rounded-2xl shadow-lg p-6">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm uppercase tracking-wide opacity-90">Cursos</p>
                <p class="text-4xl font-extrabold mt-2">{{ $totalCursos }}</p>
            </div>
        </div>
    </div>

</div>


@endsection
