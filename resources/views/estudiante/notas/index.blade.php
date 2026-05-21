@extends('layouts.estudiante')

@section('title', 'Mis Calificaciones')

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
                        📊 Mis Calificaciones
                    </h1>

                    <p class="mt-4 text-black/70 text-xl font-bold max-w-2xl leading-relaxed">
                        Consulta tus notas académicas y revisa tu rendimiento por materia ✨
                    </p>

                </div>

                <!-- ICONO -->
                <div class="text-8xl animate-bounce">
                    🎓
                </div>

            </div>

        </div>

        @if($calificaciones->count())

            @php
                $promedioGeneral = round(
                    $calificaciones->flatten()->avg('nota'),
                    2
                );
            @endphp

            <!-- ================= CARDS ================= -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

                <!-- MATERIAS -->
                <div class="bg-white/80 backdrop-blur-xl
                            rounded-[30px] shadow-2xl border border-white
                            p-7 hover:scale-[1.02] transition duration-300">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm uppercase tracking-wider
                                      text-pink-500 font-black">

                                📚 Materias

                            </p>

                            <h2 class="text-5xl font-black text-black mt-3">
                                {{ $calificaciones->count() }}
                            </h2>

                        </div>

                        <div class="w-20 h-20 rounded-3xl
                                    bg-gradient-to-br from-pink-400 to-purple-500
                                    flex items-center justify-center
                                    text-4xl shadow-xl">

                            📘

                        </div>

                    </div>

                </div>

                <!-- PROMEDIO -->
                <div class="bg-white/80 backdrop-blur-xl
                            rounded-[30px] shadow-2xl border border-white
                            p-7 hover:scale-[1.02] transition duration-300">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm uppercase tracking-wider
                                      text-sky-500 font-black">

                                ⭐ Promedio

                            </p>

                            <h2 class="text-5xl font-black text-black mt-3">
                                {{ $promedioGeneral }}
                            </h2>

                        </div>

                        <div class="w-20 h-20 rounded-3xl
                                    bg-gradient-to-br from-sky-400 to-blue-500
                                    flex items-center justify-center
                                    text-4xl shadow-xl">

                            🌟

                        </div>

                    </div>

                </div>

                <!-- ESTADO -->
                <div class="bg-white/80 backdrop-blur-xl
                            rounded-[30px] shadow-2xl border border-white
                            p-7 hover:scale-[1.02] transition duration-300">

                    <div class="flex items-center justify-between gap-4">

                        <div>

                            <p class="text-sm uppercase tracking-wider
                                      text-emerald-500 font-black">

                                🚀 Estado

                            </p>

                            <h2 class="text-2xl font-black text-black mt-4 leading-tight">

                                @if($promedioGeneral >= 3)
                                    Excelente 🎉
                                @elseif($promedioGeneral >= 2.5)
                                    En riesgo ⚠️
                                @else
                                    Debes mejorar 📌
                                @endif

                            </h2>

                        </div>

                        <div class="w-20 h-20 rounded-3xl
                                    bg-gradient-to-br from-emerald-400 to-green-500
                                    flex items-center justify-center
                                    text-4xl shadow-xl">

                            🏆

                        </div>

                    </div>

                </div>

            </div>

            <!-- ================= TABLA ================= -->
            <div class="bg-white/80 backdrop-blur-xl
                        rounded-[35px] shadow-2xl
                        border border-white overflow-hidden">

                <!-- TOP -->
                <div class="bg-gradient-to-r from-pink-100 via-sky-100 to-yellow-100
                            px-8 py-6 border-b border-white">

                    <h2 class="text-3xl font-black text-sky-600 flex items-center gap-3">
                        📝 Registro Académico
                    </h2>

                    <p class="text-slate-600 font-bold mt-2">
                        Visualiza tus notas y desempeño en cada periodo
                    </p>

                </div>

                <!-- TABLA -->
                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <!-- HEAD -->
                        <thead class="bg-gradient-to-r from-pink-400 via-purple-400 to-sky-400">

                            <tr>

                                <th class="px-8 py-5 text-left text-sm font-black text-black uppercase tracking-wider">
                                    📚 Materia
                                </th>

                                <th class="px-4 py-5 text-center text-sm font-black text-black uppercase">
                                    P1
                                </th>

                                <th class="px-4 py-5 text-center text-sm font-black text-black uppercase">
                                    P2
                                </th>

                                <th class="px-4 py-5 text-center text-sm font-black text-black uppercase">
                                    P3
                                </th>

                                <th class="px-4 py-5 text-center text-sm font-black text-black uppercase">
                                    P4
                                </th>

                                <th class="px-4 py-5 text-center text-sm font-black text-black uppercase">
                                    ⭐ Promedio
                                </th>

                                <th class="px-6 py-5 text-center text-sm font-black text-black uppercase">
                                    🚦 Estado
                                </th>

                            </tr>

                        </thead>

                        <!-- BODY -->
                        <tbody class="divide-y divide-pink-100 bg-white">

                            @foreach($calificaciones as $materiaId => $notas)

                                @php

                                    $periodos = $notas->keyBy('periodo');

                                    $promedio = round($notas->avg('nota'), 2);

                                    if ($promedio >= 3.0) {
                                        $estado = 'Aprobado';
                                        $color = 'green';
                                        $emoji = '✅';
                                    } elseif ($promedio >= 2.5) {
                                        $estado = 'En riesgo';
                                        $color = 'yellow';
                                        $emoji = '⚠️';
                                    } else {
                                        $estado = 'Reprobado';
                                        $color = 'red';
                                        $emoji = '❌';
                                    }

                                @endphp

                                <tr class="hover:bg-pink-50/50 transition duration-300">

                                    <!-- MATERIA -->
                                    <td class="px-8 py-6">

                                        <div class="flex items-center gap-4">

                                            <div class="w-14 h-14 rounded-2xl
                                                        bg-gradient-to-br from-pink-400 to-purple-500
                                                        flex items-center justify-center
                                                        text-black font-black text-xl shadow-lg">

                                                📖

                                            </div>

                                            <div>

                                                <h3 class="text-lg font-black text-black">
                                                    {{ $notas->first()->materia->nombre_materia }}
                                                </h3>

                                                <p class="text-slate-500 font-semibold text-sm mt-1">
                                                    Materia académica
                                                </p>

                                            </div>

                                        </div>

                                    </td>

                                    <!-- PERIODOS -->
                                    @for($i = 1; $i <= 4; $i++)

                                        @php
                                            $nota = $periodos[$i]->nota ?? null;
                                        @endphp

                                        <td class="px-4 py-6 text-center">

                                            @if($nota)

                                                <span class="inline-flex items-center justify-center
                                                             min-w-[65px]
                                                             bg-emerald-100 text-emerald-700
                                                             px-4 py-3 rounded-2xl
                                                             text-sm font-black shadow-sm">

                                                    {{ number_format($nota, 1) }}

                                                </span>

                                            @else

                                                <span class="inline-flex items-center justify-center
                                                             min-w-[65px]
                                                             bg-slate-100 text-slate-400
                                                             px-4 py-3 rounded-2xl
                                                             text-sm font-bold">

                                                    —

                                                </span>

                                            @endif

                                        </td>

                                    @endfor

                                    <!-- PROMEDIO -->
                                    <td class="px-4 py-6 text-center">

                                        <span class="inline-flex items-center justify-center
                                                     bg-pink-100 text-pink-700
                                                     px-5 py-3 rounded-2xl
                                                     text-sm font-black shadow-sm">

                                            {{ $promedio }}

                                        </span>

                                    </td>

                                    <!-- ESTADO -->
                                    <td class="px-6 py-6 text-center">

                                        <span class="inline-flex items-center gap-2
                                                     px-5 py-3 rounded-2xl
                                                     text-sm font-black shadow-sm

                                                     {{ $color === 'green'
                                                        ? 'bg-emerald-100 text-emerald-700'
                                                        : ($color === 'yellow'
                                                            ? 'bg-yellow-100 text-yellow-700'
                                                            : 'bg-red-100 text-red-700') }}">

                                            {{ $emoji }}
                                            {{ $estado }}

                                        </span>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        @else

            <!-- EMPTY -->
            <div class="bg-white/80 backdrop-blur-xl
                        rounded-[35px] shadow-2xl border border-white
                        py-20 px-10 text-center">

                <div class="flex flex-col items-center">

                    <div class="text-8xl mb-6">
                        📭
                    </div>

                    <h2 class="text-4xl font-black text-slate-700">
                        Aún no tienes calificaciones
                    </h2>

                    <p class="text-slate-500 font-bold text-lg mt-4 max-w-xl">
                        Tus docentes todavía no han registrado notas
                        en el sistema académico ✨
                    </p>

                </div>

            </div>

        @endif

    </div>

</div>

@endsection