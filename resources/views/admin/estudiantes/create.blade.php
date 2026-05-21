@extends('layouts.dashboard')

@section('title', 'Nuevo Estudiante')

@section('content')

<div class="relative overflow-hidden">

    <!-- ================= FONDO ================= -->
    <div class="absolute inset-0 -z-10">

        <div class="absolute top-0 left-0 w-80 h-80 bg-pink-200 rounded-full blur-3xl opacity-40"></div>

        <div class="absolute bottom-0 right-0 w-80 h-80 bg-sky-200 rounded-full blur-3xl opacity-40"></div>

        <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-yellow-100 rounded-full blur-3xl opacity-20"></div>

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
                    ¡Estudiante registrado!
                </h3>

                <p class="font-semibold text-black/70">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif

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

                    ➕ Nuevo Estudiante

                </h1>

                <p class="mt-4 text-black/70 text-xl font-bold max-w-2xl leading-relaxed">

                    Registra nuevos estudiantes en una
                    plataforma educativa moderna,
                    divertida e interactiva ✨

                </p>

            </div>

            <!-- ICONO -->
            <div class="text-8xl animate-bounce">
                🎒
            </div>

        </div>

    </div>

    <!-- ================= FORMULARIO ================= -->
    <form method="POST"
          action="{{ route('admin.estudiantes.store') }}"
          class="space-y-10">

        @csrf

        <!-- ================= DATOS DE ACCESO ================= -->
        <div class="bg-white/80 backdrop-blur-lg rounded-[35px]
                    shadow-2xl border border-white overflow-hidden">

            <!-- HEADER -->
            <div class="bg-gradient-to-r from-pink-100 to-purple-100
                        px-8 py-6 border-b border-white">

                <h2 class="text-3xl font-black text-pink-600 flex items-center gap-3">
                    🔐 Datos de acceso
                </h2>

                <p class="text-slate-600 font-bold mt-2">
                    Información para ingresar al sistema
                </p>

            </div>

            <!-- CONTENT -->
            <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- CORREO -->
                <div>

                    <label class="block text-black font-black mb-3">
                        📧 Correo electrónico
                    </label>

                    <input type="email"
                           name="correo"
                           value="{{ old('correo') }}"
                           placeholder="ejemplo@correo.com"
                           class="w-full rounded-2xl border-2 border-pink-100
                                  bg-white px-5 py-4 text-black font-semibold
                                  outline-none focus:border-pink-300
                                  shadow-sm transition duration-300
                                  @error('correo') border-red-400 @enderror">

                    @error('correo')

                        <p class="text-red-500 font-bold mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

                <!-- PASSWORD -->
                <div>

                    <label class="block text-black font-black mb-3">
                        🔑 Contraseña
                    </label>

                    <input type="password"
                           name="password"
                           placeholder="Escribe una contraseña"
                           class="w-full rounded-2xl border-2 border-purple-100
                                  bg-white px-5 py-4 text-black font-semibold
                                  outline-none focus:border-purple-300
                                  shadow-sm transition duration-300
                                  @error('password') border-red-400 @enderror">

                    @error('password')

                        <p class="text-red-500 font-bold mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

            </div>

        </div>

        <!-- ================= DATOS PERSONALES ================= -->
        <div class="bg-white/80 backdrop-blur-lg rounded-[35px]
                    shadow-2xl border border-white overflow-hidden">

            <!-- HEADER -->
            <div class="bg-gradient-to-r from-sky-100 via-pink-100 to-yellow-100
                        px-8 py-6 border-b border-white">

                <h2 class="text-3xl font-black text-sky-600 flex items-center gap-3">
                    👤 Datos personales
                </h2>

                <p class="text-slate-600 font-bold mt-2">
                    Información personal del estudiante
                </p>

            </div>

            <!-- FORM -->
            <div class="p-8 grid grid-cols-1 md:grid-cols-2 gap-8">

                <!-- DOCUMENTO -->
                <div>

                    <label class="block text-black font-black mb-3">
                        🪪 Documento
                    </label>

                    <input type="text"
                           name="documento"
                           value="{{ old('documento') }}"
                           placeholder="Número de documento"
                           class="w-full rounded-2xl border-2 border-sky-100
                                  bg-white px-5 py-4 text-black font-semibold
                                  outline-none focus:border-sky-300
                                  shadow-sm transition duration-300
                                  @error('documento') border-red-400 @enderror">

                    @error('documento')

                        <p class="text-red-500 font-bold mt-2">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

                <!-- NOMBRES -->
                <div>

                    <label class="block text-black font-black mb-3">
                        😀 Nombres
                    </label>

                    <input type="text"
                           name="nombres"
                           value="{{ old('nombres') }}"
                           placeholder="Nombres del estudiante"
                           class="w-full rounded-2xl border-2 border-pink-100
                                  bg-white px-5 py-4 text-black font-semibold
                                  outline-none focus:border-pink-300
                                  shadow-sm transition duration-300">

                </div>

                <!-- APELLIDOS -->
                <div>

                    <label class="block text-black font-black mb-3">
                        👨‍👩‍👧‍👦 Apellidos
                    </label>

                    <input type="text"
                           name="apellidos"
                           value="{{ old('apellidos') }}"
                           placeholder="Apellidos del estudiante"
                           class="w-full rounded-2xl border-2 border-yellow-100
                                  bg-white px-5 py-4 text-black font-semibold
                                  outline-none focus:border-yellow-300
                                  shadow-sm transition duration-300">

                </div>

                <!-- FECHA -->
                <div>

                    <label class="block text-black font-black mb-3">
                        🎂 Fecha de nacimiento
                    </label>

                    <input type="date"
                           name="fecha_nacimiento"
                           value="{{ old('fecha_nacimiento') }}"
                           class="w-full rounded-2xl border-2 border-green-100
                                  bg-white px-5 py-4 text-black font-semibold
                                  outline-none focus:border-green-300
                                  shadow-sm transition duration-300">

                </div>

                <!-- TIPO SANGRE -->
                <div>

                    <label class="block text-black font-black mb-3">
                        🩸 Tipo de sangre
                    </label>

                    <select name="tipo_sangre"
                            class="w-full rounded-2xl border-2 border-red-100
                                   bg-white px-5 py-4 text-black font-semibold
                                   outline-none focus:border-red-300
                                   shadow-sm transition duration-300">

                        @foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $tipo)

                            <option value="{{ $tipo }}"
                                {{ old('tipo_sangre') == $tipo ? 'selected' : '' }}>

                                {{ $tipo }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <!-- SEXO -->
                <div>

                    <label class="block text-black font-black mb-3">
                        🚻 Sexo
                    </label>

                    <select name="sexo"
                            class="w-full rounded-2xl border-2 border-purple-100
                                   bg-white px-5 py-4 text-black font-semibold
                                   outline-none focus:border-purple-300
                                   shadow-sm transition duration-300">

                        <option value="M"
                            {{ old('sexo') == 'M' ? 'selected' : '' }}>

                            Masculino

                        </option>

                        <option value="F"
                            {{ old('sexo') == 'F' ? 'selected' : '' }}>

                            Femenino

                        </option>

                    </select>

                </div>

                <!-- DIRECCIÓN -->
                <div>

                    <label class="block text-black font-black mb-3">
                        🏠 Dirección
                    </label>

                    <input type="text"
                           name="direccion"
                           value="{{ old('direccion') }}"
                           placeholder="Dirección del estudiante"
                           class="w-full rounded-2xl border-2 border-sky-100
                                  bg-white px-5 py-4 text-black font-semibold
                                  outline-none focus:border-sky-300
                                  shadow-sm transition duration-300">

                </div>

                <!-- BARRIO -->
                <div>

                    <label class="block text-black font-black mb-3">
                        🌆 Barrio
                    </label>

                    <input type="text"
                           name="barrio"
                           value="{{ old('barrio') }}"
                           placeholder="Barrio"
                           class="w-full rounded-2xl border-2 border-pink-100
                                  bg-white px-5 py-4 text-black font-semibold
                                  outline-none focus:border-pink-300
                                  shadow-sm transition duration-300">

                </div>

                <!-- TELÉFONO -->
                <div class="md:col-span-2">

                    <label class="block text-black font-black mb-3">
                        📱 Teléfono
                    </label>

                    <input type="text"
                           name="telefono"
                           value="{{ old('telefono') }}"
                           placeholder="Número telefónico"
                           class="w-full rounded-2xl border-2 border-yellow-100
                                  bg-white px-5 py-4 text-black font-semibold
                                  outline-none focus:border-yellow-300
                                  shadow-sm transition duration-300">

                </div>

            </div>

        </div>

        <!-- ================= BOTONES ================= -->
        <div class="flex flex-col md:flex-row gap-5">

            <!-- GUARDAR -->
            <button type="submit"
                    class="flex-1 bg-gradient-to-r from-pink-500 to-purple-500
                           hover:from-pink-600 hover:to-purple-600
                           text-black font-black text-lg
                           px-8 py-5 rounded-3xl shadow-2xl
                           transition duration-300 hover:scale-105">

                💾 Guardar estudiante

            </button>

            <!-- VOLVER -->
            <a href="{{ route('admin.estudiantes.index') }}"
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

@endsection