@extends('layouts.dashboard')

@section('title', 'Panel Administrador')

@section('content')

<div class="relative overflow-hidden">

    <!-- Fondo decorativo -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 left-0 w-72 h-72 bg-pink-200 rounded-full blur-3xl opacity-40"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-sky-200 rounded-full blur-3xl opacity-40"></div>
    </div>

    <!-- ENCABEZADO -->
    <div class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between">

        <div>
            <h1 class="text-4xl font-extrabold text-sky-700 flex items-center gap-3">
                🎓 Panel Educativo Infantil
            </h1>

            <p class="text-slate-500 mt-2 text-lg">
                Gestiona estudiantes, docentes y cursos de forma divertida ✨
            </p>
        </div>

        <div class="mt-5 md:mt-0">
            <div class="bg-white/70 backdrop-blur-lg shadow-md px-5 py-3 rounded-2xl border border-white">
                <p class="text-sm text-slate-500">Bienvenido al sistema</p>
                <p class="font-bold text-sky-700 text-lg">
                    Administrador 👋
                </p>
            </div>
        </div>

    </div>

    <!-- TARJETAS -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">

        <!-- ESTUDIANTES -->
        <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-pink-400 to-pink-500 p-6 shadow-xl hover:scale-105 transition duration-300">

            <div class="absolute -right-5 -top-5 w-28 h-28 bg-white/20 rounded-full"></div>

            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-white/90 uppercase tracking-wider text-sm font-semibold">
                        Estudiantes
                    </p>

                    <h2 class="text-5xl font-extrabold text-black mt-3">
                        {{ $totalEstudiantes }}
                    </h2>

                    <p class="text-white/80 mt-2 text-sm">
                        Niños registrados
                    </p>
                </div>

                <div class="text-6xl">
                    🧒
                </div>
            </div>

        </div>

        <!-- DOCENTES -->
        <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-emerald-400 to-green-500 p-6 shadow-xl hover:scale-105 transition duration-300">

            <div class="absolute -right-5 -top-5 w-28 h-28 bg-white/20 rounded-full"></div>

            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-white/90 uppercase tracking-wider text-sm font-semibold">
                        Docentes
                    </p>

                    <h2 class="text-5xl font-extrabold text-black mt-3">
                        {{ $totalDocentes }}
                    </h2>

                    <p class="text-white/80 mt-2 text-sm">
                        Profesores activos
                    </p>
                </div>

                <div class="text-6xl">
                    👩‍🏫
                </div>
            </div>

        </div>

        <!-- MATERIAS -->
        <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-yellow-400 to-orange-500 p-6 shadow-xl hover:scale-105 transition duration-300">

            <div class="absolute -right-5 -top-5 w-28 h-28 bg-white/20 rounded-full"></div>

            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-white/90 uppercase tracking-wider text-sm font-semibold">
                        Materias
                    </p>

                    <h2 class="text-5xl font-extrabold text-black mt-3">
                        {{ $totalMaterias }}
                    </h2>

                    <p class="text-white/80 mt-2 text-sm">
                        Áreas educativas
                    </p>
                </div>

                <div class="text-6xl">
                    📚
                </div>
            </div>

        </div>

        <!-- CURSOS -->
        <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-sky-400 to-indigo-500 p-6 shadow-xl hover:scale-105 transition duration-300">

            <div class="absolute -right-5 -top-5 w-28 h-28 bg-white/20 rounded-full"></div>

            <div class="relative flex items-center justify-between">
                <div>
                    <p class="text-black/90 uppercase tracking-wider text-sm font-semibold">
                        Cursos
                    </p>

                    <h2 class="text-5xl font-extrabold text-black mt-3">
                        {{ $totalCursos }}
                    </h2>

                    <p class="text-black/80 mt-2 text-sm">
                        Cursos disponibles
                    </p>
                </div>

                <div class="text-6xl">
                    🏫
                </div>
            </div>

        </div>

    </div>

    <!-- SECCIÓN EXTRA -->
    <div class="mt-12 bg-white/70 backdrop-blur-lg rounded-3xl shadow-xl p-8 border border-white">


    </div>

</div>

@endsection