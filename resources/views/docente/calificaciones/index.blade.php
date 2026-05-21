@extends('layouts.docente')

@section('title', 'Panel del Docente')

@section('content')

<div class="relative overflow-hidden">

    <!-- ================= FONDO ================= -->
    <div class="absolute inset-0 -z-10">

        <div class="absolute top-0 left-0 w-80 h-80 bg-pink-200 rounded-full blur-3xl opacity-40"></div>

        <div class="absolute bottom-0 right-0 w-80 h-80 bg-sky-200 rounded-full blur-3xl opacity-40"></div>

        <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-yellow-100 rounded-full blur-3xl opacity-20"></div>

    </div>

    <!-- ================= CONTENEDOR ================= -->
    <div class="max-w-7xl mx-auto">

        <!-- ================= HEADER ================= -->
        <div class="bg-gradient-to-r from-pink-400 via-purple-400 to-sky-400
                    rounded-[35px] p-8 lg:p-10 shadow-2xl relative overflow-hidden mb-10">

            <!-- DECORACIONES -->
            <div class="absolute -top-10 -right-10 w-44 h-44 bg-white/20 rounded-full"></div>

            <div class="absolute bottom-0 left-0 w-32 h-32 bg-white/10 rounded-full"></div>

            <div class="relative flex flex-col lg:flex-row items-center justify-between gap-8">

                <!-- TEXTO -->
                <div>

                    <h1 class="text-5xl font-black text-black flex items-center gap-4">

                        👩‍🏫 Mis Materias

                    </h1>

                    <p class="mt-4 text-black/70 text-xl font-bold max-w-2xl leading-relaxed">

                        Selecciona una materia para registrar
                        calificaciones de tus estudiantes ✨

                    </p>

                </div>

                <!-- ICONO -->
                <div class="text-8xl animate-bounce">
                    📚
                </div>

            </div>

        </div>

        <!-- ================= TABLA ================= -->
        @if($asignaciones->count())

            <div class="bg-white/80 backdrop-blur-lg rounded-[35px]
                        shadow-2xl border border-white overflow-hidden">

                <!-- TOP -->
                <div class="bg-gradient-to-r from-pink-100 via-sky-100 to-yellow-100
                            px-8 py-6 border-b border-white">

                    <h2 class="text-3xl font-black text-sky-600 flex items-center gap-3">
                        🎒 Materias asignadas
                    </h2>

                    <p class="text-slate-600 font-bold mt-2">
                        Administra las calificaciones de cada curso
                    </p>

                </div>

                <!-- TABLA -->
                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <!-- HEAD -->
                        <thead class="bg-pink-50 border-b border-pink-100">

                            <tr>

                                <th class="px-8 py-5 text-left text-sm font-black text-pink-600 uppercase tracking-wider">
                                    📚 Materia
                                </th>

                                <th class="px-8 py-5 text-left text-sm font-black text-pink-600 uppercase tracking-wider">
                                    🏫 Curso
                                </th>

                                <th class="px-8 py-5 text-center text-sm font-black text-pink-600 uppercase tracking-wider">
                                    ✨ Acción
                                </th>

                            </tr>

                        </thead>

                        <!-- BODY -->
                        <tbody class="divide-y divide-pink-100">

                            @foreach($asignaciones as $a)

                                <tr class="hover:bg-pink-50/50 transition duration-300">

                                    <!-- MATERIA -->
                                    <td class="px-8 py-6">

                                        <div class="flex items-center gap-4">

                                            <div class="w-14 h-14 rounded-2xl
                                                        bg-gradient-to-br from-pink-400 to-purple-400
                                                        flex items-center justify-center
                                                        text-2xl shadow-lg">

                                                📖

                                            </div>

                                            <div>

                                                <h3 class="text-lg font-black text-black">
                                                    {{ $a->materia->nombre_materia }}
                                                </h3>

                                                <p class="text-slate-500 font-semibold text-sm mt-1">
                                                    Materia asignada
                                                </p>

                                            </div>

                                        </div>

                                    </td>

                                    <!-- CURSO -->
                                    <td class="px-8 py-6">

                                        <div class="flex items-center gap-4">

                                            <div class="w-14 h-14 rounded-2xl
                                                        bg-gradient-to-br from-sky-400 to-blue-500
                                                        flex items-center justify-center
                                                        text-2xl shadow-lg">

                                                🏫

                                            </div>

                                            <div>

                                                <h3 class="text-lg font-black text-black">
                                                    {{ $a->curso->nombre_curso }}
                                                </h3>

                                                <p class="text-slate-500 font-semibold text-sm mt-1">
                                                    Curso académico
                                                </p>

                                            </div>

                                        </div>

                                    </td>

                                    <!-- ACCIÓN -->
                                    <td class="px-8 py-6 text-center">

                                        <a href="{{ route('docente.calificaciones.create.asignacion', $a->id_asignacion) }}"
                                           class="inline-flex items-center gap-3
                                                  bg-gradient-to-r from-pink-500 to-purple-500
                                                  hover:from-pink-600 hover:to-purple-600
                                                  text-black font-black
                                                  px-6 py-4 rounded-2xl
                                                  shadow-xl transition duration-300
                                                  hover:scale-105">

                                            ✏️ Registrar

                                        </a>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        @else

            <!-- VACÍO -->
            <div class="bg-white/80 backdrop-blur-lg rounded-[35px]
                        shadow-2xl border border-white
                        py-20 px-10 text-center">

                <div class="flex flex-col items-center">

                    <div class="text-8xl mb-6">
                        📭
                    </div>

                    <h2 class="text-4xl font-black text-slate-700">
                        No tienes materias asignadas
                    </h2>

                    <p class="text-slate-500 font-bold text-lg mt-4 max-w-xl">
                        Cuando el administrador te asigne materias,
                        aparecerán aquí para gestionar calificaciones ✨
                    </p>

                </div>

            </div>

        @endif

    </div>

</div>

@endsection