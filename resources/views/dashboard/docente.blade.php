@extends('layouts.docente')

@section('title', 'Panel de Docente')

@section('content')

<div class="relative overflow-hidden">

    <!-- FONDO DECORATIVO -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 left-0 w-72 h-72 bg-purple-200 rounded-full blur-3xl opacity-40"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-sky-200 rounded-full blur-3xl opacity-40"></div>
    </div>

    <!-- ENCABEZADO -->
    <div class="mb-10 flex flex-col md:flex-row md:items-center md:justify-between">

        <div>
            <h1 class="text-4xl font-extrabold text-purple-700 flex items-center gap-3">
                👩‍🏫 Panel del Docente
            </h1>

            <p class="text-slate-500 mt-2 text-lg">
                Administra estudiantes y cursos de manera divertida ✨
            </p>
        </div>

        <!-- BIENVENIDA -->
        <div class="mt-5 md:mt-0">

            <div class="bg-white/70 backdrop-blur-lg shadow-md px-5 py-3 rounded-2xl border border-white">

                <p class="text-sm text-slate-500">
                    Bienvenido al sistema
                </p>

                <p class="font-bold text-purple-700 text-lg">
                    Docente 👋
                </p>

            </div>

        </div>

    </div>

    <!-- TARJETAS -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-2 gap-8 mb-12">

        <!-- ESTUDIANTES -->
        <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-pink-400 to-pink-500 p-6 shadow-xl hover:scale-105 transition duration-300">

            <!-- DECORACIÓN -->
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
                        Estudiantes asignados
                    </p>
                </div>

                <div class="text-6xl">
                    🧒
                </div>

            </div>

        </div>

        <!-- CURSOS -->
        <div class="group relative overflow-hidden rounded-3xl bg-gradient-to-br from-sky-400 to-indigo-500 p-6 shadow-xl hover:scale-105 transition duration-300">

            <!-- DECORACIÓN -->
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
                        Cursos activos
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

        <div class="flex flex-col lg:flex-row items-center justify-between gap-8">

            <!-- TEXTO -->
            <div>

                <h2 class="text-3xl font-extrabold text-purple-700 flex items-center gap-2">
                    ✨ Zona del Docente
                </h2>

                <p class="text-slate-500 mt-3 text-lg max-w-2xl">
                    Gestiona tus cursos, revisa tus estudiantes y organiza
                    las actividades académicas desde una plataforma moderna
                    y amigable.
                </p>

            </div>

            <!-- BOTONES -->
            <div class="flex flex-wrap gap-4">

                <button
                    class="bg-gradient-to-r from-pink-500 to-orange-400 hover:from-pink-600 hover:to-orange-500 text-black font-bold px-8 py-4 rounded-2xl shadow-lg transition duration-300 hover:scale-105">

                    Ver Estudiantes 👦

                </button>

                <button
                    class="bg-gradient-to-r from-sky-500 to-indigo-500 hover:from-sky-600 hover:to-indigo-600 text-black font-bold px-8 py-4 rounded-2xl shadow-lg transition duration-300 hover:scale-105">

                    Ver Cursos 📚

                </button>

            </div>

        </div>

    </div>

</div>

@endsection