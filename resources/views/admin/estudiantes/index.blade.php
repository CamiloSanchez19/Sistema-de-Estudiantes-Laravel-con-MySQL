@extends('layouts.dashboard')

@section('title', 'Panel Administrador')

@section('content')

<div class="relative overflow-hidden">

    <!-- ================= FONDO ================= -->
    <div class="absolute inset-0 -z-10">

        <div class="absolute top-0 left-0 w-80 h-80 bg-pink-200 rounded-full blur-3xl opacity-40"></div>

        <div class="absolute bottom-0 right-0 w-80 h-80 bg-sky-200 rounded-full blur-3xl opacity-40"></div>

        <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-yellow-100 rounded-full blur-3xl opacity-20"></div>

    </div>

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

                    🧒 Estudiantes

                </h1>

                <p class="mt-4 text-black/70 text-xl font-bold max-w-2xl leading-relaxed">

                    Gestiona estudiantes, organiza registros
                    y administra toda la información académica
                    desde un entorno moderno y divertido ✨

                </p>

            </div>

            <!-- BOTÓN -->
            <a href="{{ route('admin.estudiantes.create') }}"
               class="bg-white hover:bg-slate-100
                      text-black font-black px-8 py-5
                      rounded-3xl shadow-2xl transition duration-300
                      hover:scale-105 flex items-center gap-3 text-lg">

                ➕ Nuevo Estudiante

            </a>

        </div>

    </div>

    <!-- ================= STATS ================= -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

        <!-- TOTAL -->
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl border border-white p-6 relative overflow-hidden">

            <div class="absolute top-0 right-0 w-24 h-24 bg-pink-100 rounded-full blur-2xl opacity-50"></div>

            <div class="relative flex items-center justify-between">

                <div>

                    <p class="text-pink-500 font-black uppercase tracking-widest text-sm">
                        Total
                    </p>

                    <h2 class="text-5xl font-black text-black mt-3">
                        {{ count($estudiantes) }}
                    </h2>

                </div>

                <div class="text-6xl">
                    🎓
                </div>

            </div>

        </div>

        <!-- ACTIVOS -->
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl border border-white p-6 relative overflow-hidden">

            <div class="absolute top-0 right-0 w-24 h-24 bg-sky-100 rounded-full blur-2xl opacity-50"></div>

            <div class="relative flex items-center justify-between">

                <div>

                    <p class="text-sky-500 font-black uppercase tracking-widest text-sm">
                        Activos
                    </p>

                    <h2 class="text-5xl font-black text-black mt-3">
                        {{ count($estudiantes) }}
                    </h2>

                </div>

                <div class="text-6xl">
                    📚
                </div>

            </div>

        </div>

        <!-- SISTEMA -->
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl border border-white p-6 relative overflow-hidden">

            <div class="absolute top-0 right-0 w-24 h-24 bg-yellow-100 rounded-full blur-2xl opacity-50"></div>

            <div class="relative flex items-center justify-between">

                <div>

                    <p class="text-yellow-500 font-black uppercase tracking-widest text-sm">
                        Plataforma
                    </p>

                    <h2 class="text-2xl font-black text-black mt-3">
                        Infantil ✨
                    </h2>

                </div>

                <div class="text-6xl">
                    🚀
                </div>

            </div>

        </div>

    </div>

    <!-- ================= TABLA ================= -->
    <div class="bg-white/80 backdrop-blur-xl rounded-[35px] shadow-2xl border border-white overflow-hidden">

        <!-- TOP -->
        <div class="bg-gradient-to-r from-pink-100 via-purple-100 to-sky-100
                    px-8 py-6 border-b border-white">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                <div>

                    <h2 class="text-3xl font-black text-purple-600 flex items-center gap-3">
                        📋 Lista de Estudiantes
                    </h2>

                    <p class="text-slate-600 mt-2 font-bold">
                        Consulta y administra todos los estudiantes registrados
                    </p>

                </div>

                <!-- BUSCADOR -->
                <div class="relative">

                    <input type="text"
                           placeholder="Buscar estudiante..."
                           class="bg-white border-2 border-pink-100
                                  rounded-2xl px-5 py-4 pl-14
                                  w-full lg:w-80
                                  outline-none focus:border-pink-300
                                  shadow-sm font-semibold text-black">

                    <div class="absolute left-5 top-1/2 -translate-y-1/2 text-xl">
                        🔍
                    </div>

                </div>

            </div>

        </div>

        <!-- TABLA -->
        <div class="overflow-x-auto">

            <table class="min-w-full">

                <!-- HEAD -->
                <thead class="bg-white">

                    <tr>

                        <th class="px-8 py-5 text-left text-sm font-black text-pink-500 uppercase tracking-widest">
                            Estudiante
                        </th>

                        <th class="px-8 py-5 text-left text-sm font-black text-sky-500 uppercase tracking-widest">
                            Documento
                        </th>

                        <th class="px-8 py-5 text-center text-sm font-black text-purple-500 uppercase tracking-widest">
                            Acciones
                        </th>

                    </tr>

                </thead>

                <!-- BODY -->
                <tbody class="divide-y divide-slate-100">

                    @foreach($estudiantes as $e)

                    <tr class="hover:bg-pink-50/40 transition duration-300">

                        <!-- ESTUDIANTE -->
                        <td class="px-8 py-6">

                            <div class="flex items-center gap-5">

                                <!-- AVATAR -->
                                <div class="w-16 h-16 rounded-3xl
                                            bg-gradient-to-br from-pink-300 via-purple-300 to-sky-300
                                            flex items-center justify-center
                                            text-3xl shadow-lg">

                                    🧒

                                </div>

                                <!-- INFO -->
                                <div>

                                    <h3 class="text-xl font-black text-black">
                                        {{ $e->nombres }} {{ $e->apellidos }}
                                    </h3>

                                    <p class="text-slate-500 font-semibold mt-1">
                                        Estudiante registrado
                                    </p>

                                </div>

                            </div>

                        </td>

                        <!-- DOCUMENTO -->
                        <td class="px-8 py-6">

                            <div class="bg-sky-50 inline-flex px-5 py-3 rounded-2xl">

                                <span class="font-black text-sky-600 text-lg">
                                    {{ $e->documento }}
                                </span>

                            </div>

                        </td>

                        <!-- ACCIONES -->
                        <td class="px-8 py-6">

                            <div class="flex items-center justify-center gap-4">

                                <!-- EDITAR -->
                                <a href="{{ route('admin.estudiantes.edit', $e) }}"
                                   class="bg-yellow-300 hover:bg-yellow-400
                                          text-black font-black
                                          px-6 py-3 rounded-2xl
                                          shadow-lg transition duration-300
                                          hover:scale-105">

                                    ✏️ Editar

                                </a>

                                <!-- ELIMINAR -->
                                <form action="{{ route('admin.estudiantes.destroy', $e) }}"
                                      method="POST"
                                      onsubmit="return confirm('¿Deseas eliminar este estudiante?');">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="bg-red-300 hover:bg-red-400
                                                   text-black font-black
                                                   px-6 py-3 rounded-2xl
                                                   shadow-lg transition duration-300
                                                   hover:scale-105">

                                        🗑️ Eliminar

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection