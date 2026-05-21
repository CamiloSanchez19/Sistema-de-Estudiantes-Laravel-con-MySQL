@extends('layouts.dashboard')

@section('title', 'Materias')

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

                        📚 Materias

                    </h1>

                    <p class="mt-4 text-black/70 text-xl font-bold max-w-2xl leading-relaxed">

                        Gestiona todas las materias académicas
                        de manera divertida y organizada ✨

                    </p>

                </div>

                <!-- ICONO -->
                <div class="text-8xl animate-bounce">
                    📖
                </div>

            </div>

        </div>

        <!-- ================= ALERTA ================= -->
        @if(session('success'))

            <div class="mb-8 bg-gradient-to-r from-green-200 to-emerald-200
                        border-2 border-green-300 text-black
                        px-6 py-5 rounded-3xl shadow-xl
                        flex items-center gap-4 font-bold text-lg">

                ✅ {{ session('success') }}

            </div>

        @endif

        <!-- ================= TABLA ================= -->
        <div class="bg-white/80 backdrop-blur-lg rounded-[35px]
                    shadow-2xl border border-white overflow-hidden">

            <!-- TOP -->
            <div class="bg-gradient-to-r from-pink-100 via-sky-100 to-yellow-100
                        px-8 py-6 border-b border-white
                        flex flex-col lg:flex-row items-center justify-between gap-5">

                <div>

                    <h2 class="text-3xl font-black text-sky-600 flex items-center gap-3">
                        🎒 Lista de materias
                    </h2>

                    <p class="text-slate-600 font-bold mt-2">
                        Administración de materias registradas
                    </p>

                </div>

                <!-- BOTÓN -->
                <a href="{{ route('admin.materias.create') }}"
                   class="bg-gradient-to-r from-pink-500 to-purple-500
                          hover:from-pink-600 hover:to-purple-600
                          text-black font-black text-lg
                          px-7 py-4 rounded-3xl shadow-xl
                          transition duration-300 hover:scale-105">

                    ➕ Nueva Materia

                </a>

            </div>

            <!-- TABLA -->
            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <!-- HEAD -->
                    <thead class="bg-pink-50 border-b border-pink-100">

                        <tr>

                            <th class="px-8 py-5 text-left text-sm font-black text-pink-600 uppercase tracking-wider">
                                📖 Nombre de la materia
                            </th>

                            <th class="px-8 py-5 text-center text-sm font-black text-pink-600 uppercase tracking-wider">
                                ⚙️ Acciones
                            </th>

                        </tr>

                    </thead>

                    <!-- BODY -->
                    <tbody class="divide-y divide-pink-100">

                        @forelse($materias as $materia)

                            <tr class="hover:bg-pink-50/50 transition duration-300">

                                <!-- NOMBRE -->
                                <td class="px-8 py-6">

                                    <div class="flex items-center gap-4">

                                        <div class="w-14 h-14 rounded-2xl
                                                    bg-gradient-to-br from-pink-400 to-purple-400
                                                    flex items-center justify-center
                                                    text-2xl shadow-lg">

                                            📚

                                        </div>

                                        <div>

                                            <h3 class="text-lg font-black text-black">
                                                {{ $materia->nombre_materia }}
                                            </h3>

                                            <p class="text-slate-500 font-semibold text-sm mt-1">
                                                Materia académica registrada
                                            </p>

                                        </div>

                                    </div>

                                </td>

                                <!-- ACCIONES -->
                                <td class="px-8 py-6">

                                    <div class="flex items-center justify-center gap-4">

                                        <!-- EDITAR -->
                                        <a href="{{ route('admin.materias.edit', $materia) }}"
                                           class="bg-gradient-to-r from-sky-400 to-blue-500
                                                  hover:from-sky-500 hover:to-blue-600
                                                  text-black font-black
                                                  px-5 py-3 rounded-2xl
                                                  shadow-lg transition duration-300
                                                  hover:scale-105">

                                            ✏️ Editar

                                        </a>

                                        <!-- ELIMINAR -->
                                        <form method="POST"
                                              action="{{ route('admin.materias.destroy', $materia) }}"
                                              onsubmit="return confirm('¿Deseas eliminar esta materia?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="bg-gradient-to-r from-red-400 to-pink-500
                                                           hover:from-red-500 hover:to-pink-600
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

                                <td colspan="2" class="px-8 py-20 text-center">

                                    <div class="flex flex-col items-center">

                                        <div class="text-8xl mb-5">
                                            📭
                                        </div>

                                        <h3 class="text-3xl font-black text-slate-700">
                                            No hay materias registradas
                                        </h3>

                                        <p class="text-slate-500 font-bold mt-3 text-lg">
                                            Agrega una nueva materia para comenzar ✨
                                        </p>

                                        <a href="{{ route('admin.materias.create') }}"
                                           class="mt-8 bg-gradient-to-r from-pink-500 to-purple-500
                                                  hover:from-pink-600 hover:to-purple-600
                                                  text-black font-black
                                                  px-8 py-4 rounded-3xl
                                                  shadow-2xl transition duration-300
                                                  hover:scale-105">

                                            ➕ Crear materia

                                        </a>

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