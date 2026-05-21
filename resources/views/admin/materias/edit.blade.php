@extends('layouts.dashboard')

@section('title', 'Editar Materia')

@section('content')

<div class="relative overflow-hidden">

    <!-- ================= FONDO ================= -->
    <div class="absolute inset-0 -z-10">

        <div class="absolute top-0 left-0 w-80 h-80 bg-pink-200 rounded-full blur-3xl opacity-40"></div>

        <div class="absolute bottom-0 right-0 w-80 h-80 bg-sky-200 rounded-full blur-3xl opacity-40"></div>

        <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-yellow-100 rounded-full blur-3xl opacity-20"></div>

    </div>

    <!-- ================= CONTENEDOR ================= -->
    <div class="max-w-4xl mx-auto">

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

                        ✏️ Editar Materia

                    </h1>

                    <p class="mt-4 text-black/70 text-xl font-bold max-w-2xl leading-relaxed">

                        Actualiza la información de la materia
                        de forma moderna, divertida
                        y organizada ✨

                    </p>

                </div>

                <!-- ICONO -->
                <div class="text-8xl animate-bounce">
                    📘
                </div>

            </div>

        </div>

        <!-- ================= FORMULARIO ================= -->
        <div class="bg-white/80 backdrop-blur-lg rounded-[35px]
                    shadow-2xl border border-white overflow-hidden">

            <!-- HEADER FORM -->
            <div class="bg-gradient-to-r from-pink-100 via-sky-100 to-yellow-100
                        px-8 py-6 border-b border-white">

                <h2 class="text-3xl font-black text-sky-600 flex items-center gap-3">
                    📚 Información de la materia
                </h2>

                <p class="text-slate-600 font-bold mt-2">
                    Modifica los datos de la materia académica
                </p>

            </div>

            <!-- FORM -->
            <form method="POST"
                  action="{{ route('admin.materias.update', $materia) }}"
                  class="p-8 space-y-8">

                @csrf
                @method('PUT')

                <!-- NOMBRE -->
                <div>

                    <label class="block text-black font-black mb-3">

                        📝 Nombre de la Materia

                    </label>

                    <input type="text"
                           name="nombre_materia"
                           value="{{ old('nombre_materia', $materia->nombre_materia) }}"
                           placeholder="Ejemplo: Matemáticas"
                           class="w-full rounded-2xl border-2
                                  @error('nombre_materia')
                                      border-red-400
                                  @else
                                      border-pink-100
                                  @enderror
                                  bg-white px-5 py-4 text-black font-semibold
                                  outline-none focus:border-pink-300
                                  shadow-sm transition duration-300">

                    @error('nombre_materia')

                        <p class="text-red-500 font-bold mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

                <!-- BOTONES -->
                <div class="flex flex-col md:flex-row gap-5">

                    <!-- ACTUALIZAR -->
                    <button type="submit"
                            class="flex-1 bg-gradient-to-r from-pink-500 to-purple-500
                                   hover:from-pink-600 hover:to-purple-600
                                   text-black font-black text-lg
                                   px-8 py-5 rounded-3xl shadow-2xl
                                   transition duration-300 hover:scale-105">

                        💾 Actualizar materia

                    </button>

                    <!-- VOLVER -->
                    <a href="{{ route('admin.materias.index') }}"
                       class="flex items-center justify-center
                              bg-white hover:bg-slate-100
                              text-black font-black text-lg
                              px-8 py-5 rounded-3xl shadow-xl
                              transition duration-300 hover:scale-105">

                        🔙 Volver

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection