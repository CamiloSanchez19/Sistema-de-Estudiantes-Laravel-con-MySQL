@extends('layouts.dashboard')

@section('title', 'Matrículas')

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

                        📝 Matrículas

                    </h1>

                    <p class="mt-4 text-black/70 text-xl font-bold max-w-2xl leading-relaxed">

                        Administra las matrículas de los estudiantes
                        de forma divertida y organizada ✨

                    </p>

                </div>

                <!-- BOTÓN -->
                <a href="{{ route('admin.matriculas.create') }}"
                   class="bg-white hover:bg-slate-100
                          text-black font-black text-lg
                          px-8 py-5 rounded-3xl
                          shadow-2xl transition duration-300
                          hover:scale-105">

                    ➕ Nueva Matrícula

                </a>

            </div>

        </div>

        <!-- ================= ALERTA ================= -->
        @if(session('success'))

            <div class="mb-8 bg-green-100 border-2 border-green-200
                        text-green-700 px-6 py-4 rounded-3xl
                        shadow-lg font-bold text-lg">

                ✅ {{ session('success') }}

            </div>

        @endif

        <!-- ================= TABLA ================= -->
        <div class="bg-white/80 backdrop-blur-lg
                    rounded-[35px] shadow-2xl
                    border border-white overflow-hidden">

            <!-- HEADER TABLA -->
            <div class="bg-gradient-to-r from-pink-100 via-sky-100 to-yellow-100
                        px-8 py-6 border-b border-white">

                <h2 class="text-3xl font-black text-sky-600 flex items-center gap-3">

                    🎒 Lista de Matrículas

                </h2>

                <p class="text-slate-600 font-bold mt-2">

                    Consulta todas las matrículas registradas

                </p>

            </div>

            <!-- TABLA -->
            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="bg-white/60">

                        <tr>

                            <th class="px-8 py-5 text-left text-sm font-black text-pink-500 uppercase tracking-wider">
                                👦 Estudiante
                            </th>

                            <th class="px-8 py-5 text-left text-sm font-black text-sky-500 uppercase tracking-wider">
                                🏫 Curso
                            </th>

                            <th class="px-8 py-5 text-center text-sm font-black text-yellow-600 uppercase tracking-wider">
                                ⚙️ Acciones
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-pink-100">

                        @forelse($matriculas as $m)

                            <tr class="hover:bg-pink-50/40 transition duration-300">

                                <!-- ESTUDIANTE -->
                                <td class="px-8 py-6">

                                    <div class="flex items-center gap-4">

                                        <div class="w-14 h-14 rounded-2xl
                                                    bg-gradient-to-r from-pink-400 to-purple-400
                                                    flex items-center justify-center
                                                    text-2xl shadow-lg">

                                            🧒

                                        </div>

                                        <div>

                                            <h3 class="font-black text-black text-lg">

                                                {{ $m->estudiante->nombres }}
                                                {{ $m->estudiante->apellidos }}

                                            </h3>

                                            <p class="text-slate-500 font-semibold text-sm">
                                                Estudiante registrado
                                            </p>

                                        </div>

                                    </div>

                                </td>

                                <!-- CURSO -->
                                <td class="px-8 py-6">

                                    <div class="inline-flex items-center gap-3
                                                bg-sky-100 text-black
                                                px-5 py-3 rounded-2xl
                                                font-black shadow-sm">

                                        📚 {{ $m->curso->nombre_curso }}

                                    </div>

                                </td>

                                <!-- ACCIONES -->
                                <td class="px-8 py-6">

                                    <div class="flex justify-center">

                                        <form method="POST"
                                              action="{{ route('admin.matriculas.destroy', $m) }}"
                                              onsubmit="return confirm('¿Deseas eliminar esta matrícula?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="bg-red-100 hover:bg-red-200
                                                           text-red-600 font-black
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

                            <tr>

                                <td colspan="3" class="px-8 py-16 text-center">

                                    <div class="flex flex-col items-center">

                                        <div class="text-7xl mb-4">
                                            📭
                                        </div>

                                        <h3 class="text-2xl font-black text-slate-700">
                                            No hay matrículas registradas
                                        </h3>

                                        <p class="text-slate-500 font-semibold mt-2">
                                            Agrega una nueva matrícula para comenzar
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