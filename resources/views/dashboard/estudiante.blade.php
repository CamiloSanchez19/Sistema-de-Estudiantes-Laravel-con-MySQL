@extends('layouts.estudiante')

@section('title', 'Mi Panel')

@section('content')

<div class="relative overflow-hidden">

    <!-- FONDO DECORATIVO -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-0 left-0 w-72 h-72 bg-pink-200 rounded-full blur-3xl opacity-40"></div>
        <div class="absolute bottom-0 right-0 w-72 h-72 bg-sky-200 rounded-full blur-3xl opacity-40"></div>
    </div>

    <!-- ================= HEADER ================= -->
    <div class="bg-gradient-to-r from-pink-400 via-purple-400 to-sky-400
                text-black p-8 rounded-3xl shadow-xl mb-10 relative overflow-hidden">

        <!-- DECORACIONES -->
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/20 rounded-full"></div>
        <div class="absolute bottom-0 left-0 w-28 h-28 bg-white/10 rounded-full"></div>

        <div class="relative flex flex-col lg:flex-row items-center justify-between gap-6">

            <!-- TEXTO -->
            <div>

                <h1 class="text-4xl font-extrabold flex items-center gap-3">
                    👋 Hola, {{ $estudiante->nombres }}
                </h1>

                <p class="mt-3 text-lg font-semibold text-black/70">
                    Bienvenido a tu panel académico ✨
                </p>

            </div>

            <!-- ICONO -->
            <div class="text-7xl animate-bounce">
                🎒
            </div>

        </div>

    </div>

    <!-- ================= GRID PRINCIPAL ================= -->
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">

        <!-- ================= PERFIL ================= -->
        <div class="xl:col-span-2 bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl border border-white p-8 relative overflow-hidden">

            <!-- DECORACIÓN -->
            <div class="absolute top-0 right-0 w-40 h-40 bg-pink-100 rounded-full blur-3xl opacity-40"></div>

            <div class="relative">

                <h2 class="text-2xl font-extrabold text-pink-600 mb-6 flex items-center gap-3">
                    👤 Perfil del estudiante
                </h2>

                <!-- DATOS -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- DOCUMENTO -->
                    <div class="bg-pink-50 rounded-2xl p-5 shadow-sm border border-pink-100 hover:scale-105 transition duration-300">

                        <p class="text-sm font-bold text-pink-500 uppercase tracking-wide">
                            Documento
                        </p>

                        <h3 class="text-lg font-extrabold text-black mt-2">
                            {{ $estudiante->documento }}
                        </h3>

                    </div>

                    <!-- NOMBRE -->
                    <div class="bg-sky-50 rounded-2xl p-5 shadow-sm border border-sky-100 hover:scale-105 transition duration-300">

                        <p class="text-sm font-bold text-sky-500 uppercase tracking-wide">
                            Nombre
                        </p>

                        <h3 class="text-lg font-extrabold text-black mt-2">
                            {{ $estudiante->nombres }} {{ $estudiante->apellidos }}
                        </h3>

                    </div>

                    <!-- DIRECCIÓN -->
                    <div class="bg-yellow-50 rounded-2xl p-5 shadow-sm border border-yellow-100 hover:scale-105 transition duration-300">

                        <p class="text-sm font-bold text-yellow-600 uppercase tracking-wide">
                            Dirección
                        </p>

                        <h3 class="text-lg font-extrabold text-black mt-2">
                            {{ $estudiante->direccion }}
                        </h3>

                    </div>

                    <!-- TELÉFONO -->
                    <div class="bg-green-50 rounded-2xl p-5 shadow-sm border border-green-100 hover:scale-105 transition duration-300">

                        <p class="text-sm font-bold text-green-600 uppercase tracking-wide">
                            Teléfono
                        </p>

                        <h3 class="text-lg font-extrabold text-black mt-2">
                            {{ $estudiante->telefono }}
                        </h3>

                    </div>

                </div>

            </div>

        </div>

        <!-- ================= TARJETA LATERAL ================= -->
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl border border-white p-8 relative overflow-hidden">

            <!-- DECORACIÓN -->
            <div class="absolute top-0 right-0 w-40 h-40 bg-sky-100 rounded-full blur-3xl opacity-40"></div>

            <div class="relative h-full flex flex-col justify-between">

                <!-- ICONO -->
                <div class="flex justify-center">

                    <div class="w-28 h-28 rounded-full bg-gradient-to-br from-pink-300 via-purple-300 to-sky-300
                                flex items-center justify-center shadow-xl text-6xl">

                        🎓

                    </div>

                </div>

                <!-- TEXTO -->
                <div class="text-center mt-8">

                    <h2 class="text-3xl font-extrabold text-purple-600">
                        Panel Estudiantil
                    </h2>

                    <p class="mt-4 text-slate-600 font-semibold leading-relaxed">
                        Consulta tu información académica
                        y disfruta de una experiencia
                        educativa divertida ✨
                    </p>

                </div>

                <!-- MINI CARDS -->
                <div class="grid grid-cols-2 gap-4 mt-8">

                    <div class="bg-pink-100 rounded-2xl p-4 text-center shadow-sm hover:scale-105 transition duration-300">

                        <div class="text-3xl">
                            📚
                        </div>

                        <p class="mt-2 font-black text-black text-sm">
                            Cursos
                        </p>

                    </div>

                    <div class="bg-sky-100 rounded-2xl p-4 text-center shadow-sm hover:scale-105 transition duration-300">

                        <div class="text-3xl">
                            ✏️
                        </div>

                        <p class="mt-2 font-black text-black text-sm">
                            Actividades
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- ================= SECCIÓN EXTRA ================= -->
    <div class="mt-10 bg-white/70 backdrop-blur-lg rounded-3xl shadow-xl p-8 border border-white relative overflow-hidden">

        <div class="absolute top-0 left-0 w-32 h-32 bg-sky-100 rounded-full blur-3xl opacity-40"></div>

        <div class="relative flex flex-col lg:flex-row items-center justify-between gap-8">

            <!-- TEXTO -->
            <div>

                <h2 class="text-3xl font-extrabold text-sky-600 flex items-center gap-3">
                    🎯 Tu espacio académico
                </h2>

                <p class="mt-3 text-slate-600 text-lg max-w-2xl font-semibold">
                    Aquí podrás consultar tu información,
                    mantenerte al día con tus actividades
                    y aprender de forma divertida.
                </p>

            </div>

            <!-- ICONOS -->
            <div class="flex gap-5 text-5xl">

                <div class="bg-pink-100 w-20 h-20 rounded-3xl flex items-center justify-center shadow-lg hover:scale-110 transition duration-300">
                    📖
                </div>

                <div class="bg-yellow-100 w-20 h-20 rounded-3xl flex items-center justify-center shadow-lg hover:scale-110 transition duration-300">
                    ✏️
                </div>

                <div class="bg-sky-100 w-20 h-20 rounded-3xl flex items-center justify-center shadow-lg hover:scale-110 transition duration-300">
                    🧠
                </div>

            </div>

        </div>

    </div>

</div>

@endsection