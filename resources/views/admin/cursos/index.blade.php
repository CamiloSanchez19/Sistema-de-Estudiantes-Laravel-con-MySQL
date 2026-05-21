@extends('layouts.dashboard')

@section('title', 'Cursos')

@section('content')

<div class="relative overflow-hidden">

    <!-- ================= FONDO ================= -->
    <div class="absolute inset-0 -z-10">

        <div class="absolute top-0 left-0 w-80 h-80 bg-pink-200 rounded-full blur-3xl opacity-40"></div>

        <div class="absolute bottom-0 right-0 w-80 h-80 bg-sky-200 rounded-full blur-3xl opacity-40"></div>

        <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-yellow-100 rounded-full blur-3xl opacity-20"></div>

    </div>

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

                        📚 Cursos

                    </h1>

                    <p class="mt-4 text-black/70 text-xl font-bold max-w-2xl leading-relaxed">

                        Administra todos los cursos
                        académicos desde una plataforma
                        divertida y moderna ✨

                    </p>

                </div>

                <!-- ICONO -->
                <div class="text-8xl animate-bounce">
                    🏫
                </div>

            </div>

        </div>

        <!-- ================= ALERTA ================= -->
        @if(session('success'))

            <div class="mb-8 bg-green-100 border border-green-200
                        text-black px-6 py-4 rounded-3xl
                        shadow-lg flex items-center gap-4">

                <div class="text-3xl">
                    ✅
                </div>

                <div>

                    <h3 class="font-black text-lg">
                        ¡Proceso completado!
                    </h3>

                    <p class="font-semibold text-black/70">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif

        <!-- ================= TABLA ================= -->
        <div class="bg-white/80 backdrop-blur-lg rounded-[35px]
                    shadow-2xl border border-white overflow-hidden">

            <!-- TOP -->
            <div class="bg-gradient-to-r from-pink-100 via-sky-100 to-yellow-100
                        px-8 py-6 border-b border-white
                        flex flex-col md:flex-row items-center justify-between gap-5">

                <div>

                    <h2 class="text-3xl font-black text-sky-600 flex items-center gap-3">
                        📖 Lista de cursos
                    </h2>

                    <p class="text-slate-600 font-bold mt-2">
                        Visualiza y administra los cursos registrados
                    </p>

                </div>

                <!-- BOTÓN -->
                <a href="{{ route('admin.cursos.create') }}"
                   class="bg-gradient-to-r from-pink-500 to-purple-500
                          hover:from-pink-600 hover:to-purple-600
                          text-black font-black text-lg
                          px-8 py-4 rounded-3xl shadow-xl
                          transition duration-300 hover:scale-105">

                    ➕ Nuevo Curso

                </a>

            </div>

            <!-- TABLA -->
            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <!-- HEAD -->
                    <thead class="bg-pink-50">

                        <tr>

                            <th class="px-8 py-5 text-left
                                       text-sm font-black text-pink-600
                                       uppercase tracking-wider">

                                📚 Nombre del curso

                            </th>

                            <th class="px-8 py-5 text-center
                                       text-sm font-black text-pink-600
                                       uppercase tracking-wider">

                                ⚙️ Acciones

                            </th>

                        </tr>

                    </thead>

                    <!-- BODY -->
                    <tbody class="divide-y divide-pink-100">

                        @forelse($cursos as $curso)

                            <tr class="hover:bg-pink-50/50 transition duration-300">

                                <!-- NOMBRE -->
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
                                                {{ $curso->nombre_curso }}
                                            </h3>

                                            <p class="text-slate-500 font-semibold mt-1">
                                                Curso académico registrado
                                            </p>

                                        </div>

                                    </div>

                                </td>

                                <!-- ACCIONES -->
                                <td class="px-8 py-6">

                                    <div class="flex flex-col md:flex-row
                                                items-center justify-center
                                                gap-3">

                                        <!-- EDITAR -->
                                        <a href="{{ route('admin.cursos.edit', $curso) }}"
                                           class="bg-yellow-300 hover:bg-yellow-400
                                                  text-black font-black
                                                  px-5 py-3 rounded-2xl
                                                  shadow-lg transition duration-300
                                                  hover:scale-105">

                                            ✏️ Editar

                                        </a>

                                        <!-- ELIMINAR -->
                                        <form method="POST"
                                              action="{{ route('admin.cursos.destroy', $curso) }}"
                                              onsubmit="return confirm('¿Desea eliminar este curso?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="bg-red-400 hover:bg-red-500
                                                           text-black font-black
                                                           px-5 py-3 rounded-2xl
                                                           shadow-lg transition duration-300
                                                           hover:scale-105">

                                                🗑️ Eliminar

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <!-- VACÍO -->
                            <tr>

                                <td colspan="2" class="px-8 py-16 text-center">

                                    <div class="flex flex-col items-center">

                                        <div class="text-7xl mb-4">
                                            📚
                                        </div>

                                        <h3 class="text-3xl font-black text-black">
                                            No hay cursos registrados
                                        </h3>

                                        <p class="text-slate-500 font-bold mt-3 text-lg">
                                            Agrega un nuevo curso para comenzar ✨
                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection