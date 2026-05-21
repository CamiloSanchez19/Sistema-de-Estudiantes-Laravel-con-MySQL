@extends('layouts.docente')

@section('title', 'Registrar Calificaciones')

@section('content')

@php
    $periodos = [
        '1' => 'Periodo 1',
        '2' => 'Periodo 2',
        '3' => 'Periodo 3',
        '4' => 'Periodo 4',
    ];

    $periodoSeleccionado = old('periodo', '1');
@endphp

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
                        📝 Registrar Calificaciones
                    </h1>

                    <p class="mt-4 text-black/70 text-xl font-bold max-w-2xl leading-relaxed">
                        Gestiona las notas de tus estudiantes de forma divertida y organizada ✨
                    </p>

                    <!-- INFO -->
                    <div class="flex flex-wrap gap-4 mt-6">

                        <div class="bg-white/40 backdrop-blur-md
                                    rounded-3xl px-5 py-4 border border-white/50 shadow-lg">

                            <p class="text-xs uppercase tracking-wider text-black/60 font-black">
                                📚 Materia
                            </p>

                            <p class="text-black font-black text-lg mt-1">
                                {{ $asignacion->materia->nombre_materia }}
                            </p>

                        </div>

                        <div class="bg-white/40 backdrop-blur-md
                                    rounded-3xl px-5 py-4 border border-white/50 shadow-lg">

                            <p class="text-xs uppercase tracking-wider text-black/60 font-black">
                                🏫 Curso
                            </p>

                            <p class="text-black font-black text-lg mt-1">
                                {{ $asignacion->curso->nombre_curso }}
                            </p>

                        </div>

                    </div>

                </div>

                <!-- ICONO -->
                <div class="text-8xl animate-bounce">
                    ✏️
                </div>

            </div>

        </div>

        {{-- ========= ALERTA ========= --}}
        @if(session('success'))

            <div class="mb-8 bg-emerald-100 border border-emerald-300
                        rounded-3xl p-5 shadow-xl flex items-center gap-4">

                <div class="text-4xl">
                    ✅
                </div>

                <div>

                    <h3 class="text-lg font-black text-emerald-800">
                        ¡Calificaciones guardadas!
                    </h3>

                    <p class="text-emerald-700 font-semibold mt-1">
                        {{ session('success') }}
                    </p>

                </div>

            </div>

        @endif

        <!-- ================= FORMULARIO ================= -->
        <form method="POST"
              action="{{ route('docente.calificaciones.store') }}"
              class="bg-white/80 backdrop-blur-xl
                     rounded-[35px] shadow-2xl
                     border border-white overflow-hidden">

            @csrf

            <input type="hidden" name="id_materia" value="{{ $asignacion->id_materia }}">

            <!-- ================= TOP ================= -->
            <div class="p-8 border-b border-pink-100">

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    <!-- SELECT -->
                    <div class="bg-gradient-to-br from-pink-50 to-purple-50
                                rounded-3xl p-6 border border-pink-100">

                        <label for="periodo-academico"
                               class="block text-sm font-black text-pink-600 uppercase tracking-wider mb-4">

                            📅 Selecciona un periodo

                        </label>

                        <select name="periodo"
                                id="periodo-academico"
                                required
                                class="w-full rounded-2xl border-pink-200
                                       focus:border-pink-500
                                       focus:ring-pink-500
                                       px-4 py-4 font-bold text-black">

                            <option value="" disabled>
                                Seleccione un periodo
                            </option>

                            @foreach($periodos as $valor => $etiqueta)

                                <option value="{{ $valor }}"
                                    {{ $periodoSeleccionado == $valor ? 'selected' : '' }}>

                                    {{ $etiqueta }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <!-- INFO -->
                    <div class="lg:col-span-2
                                bg-gradient-to-r from-sky-50 to-yellow-50
                                rounded-3xl p-6 border border-sky-100">

                        <h3 class="text-2xl font-black text-sky-600 mb-4">
                            🌟 Información importante
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <div class="bg-white rounded-2xl p-4 shadow-sm">
                                <p class="font-black text-black">
                                    📌 Notas válidas
                                </p>

                                <p class="text-slate-600 font-semibold mt-1">
                                    Desde 0.0 hasta 5.0
                                </p>
                            </div>

                            <div class="bg-white rounded-2xl p-4 shadow-sm">
                                <p class="font-black text-black">
                                    ✨ Actualización automática
                                </p>

                                <p class="text-slate-600 font-semibold mt-1">
                                    Las notas existentes serán reemplazadas
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- ================= TABLA ================= -->
            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <!-- HEAD -->
                    <thead class="bg-gradient-to-r from-pink-400 via-purple-400 to-sky-400">

                        <tr>

                            <th class="px-8 py-5 text-left text-sm font-black text-black uppercase tracking-wider">
                                👨‍🎓 Estudiante
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

                            <th class="px-6 py-5 text-center text-sm font-black text-black uppercase">
                                ✍️ Nota
                            </th>

                        </tr>

                    </thead>

                    <!-- BODY -->
                    <tbody class="divide-y divide-pink-100 bg-white">

                        @foreach($matriculas as $m)

                            @php
                                $historial = $notasAnteriores[$m->id_matricula] ?? collect();

                                $notasPorPeriodo = [
                                    '1' => $historial->get('1'),
                                    '2' => $historial->get('2'),
                                    '3' => $historial->get('3'),
                                    '4' => $historial->get('4'),
                                ];

                                $notaSeleccionada = $notasPorPeriodo[$periodoSeleccionado] ?? null;
                            @endphp

                            <tr class="hover:bg-pink-50/50 transition duration-300"
                                data-notas='@json($notasPorPeriodo)'>

                                <!-- ESTUDIANTE -->
                                <td class="px-8 py-6">

                                    <div class="flex items-center gap-4">

                                        <div class="w-14 h-14 rounded-2xl
                                                    bg-gradient-to-br from-pink-400 to-purple-500
                                                    flex items-center justify-center
                                                    text-black font-black text-xl shadow-lg">

                                            {{ strtoupper(substr($m->estudiante->nombres, 0, 1)) }}

                                        </div>

                                        <div>

                                            <h3 class="text-lg font-black text-black">
                                                {{ $m->estudiante->nombres }}
                                                {{ $m->estudiante->apellidos }}
                                            </h3>

                                            <p class="text-slate-500 font-semibold text-sm mt-1">
                                                Estudiante matriculado
                                            </p>

                                        </div>

                                    </div>

                                </td>

                                <!-- PERIODOS -->
                                @foreach(['1', '2', '3', '4'] as $periodo)

                                    <td class="px-4 py-6 text-center">

                                        @if($notasPorPeriodo[$periodo] !== null)

                                            <span class="inline-flex items-center justify-center
                                                         min-w-[65px]
                                                         bg-emerald-100 text-emerald-700
                                                         px-4 py-3 rounded-2xl
                                                         text-sm font-black shadow-sm">

                                                {{ number_format($notasPorPeriodo[$periodo], 2) }}

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

                                @endforeach

                                <!-- INPUT -->
                                <td class="px-6 py-6 text-center">

                                    <input type="hidden"
                                           name="id_matricula[]"
                                           value="{{ $m->id_matricula }}">

                                    <input type="number"
                                           name="nota[]"
                                           step="0.01"
                                           min="0"
                                           max="5"
                                           value="{{ $notaSeleccionada ?? '' }}"
                                           placeholder="0.0"
                                           class="nota-input w-28 text-center
                                                  rounded-2xl border-slate-300
                                                  focus:border-pink-500
                                                  focus:ring-pink-500
                                                  font-black text-black
                                                  px-4 py-3 shadow-sm
                                                  {{ $notaSeleccionada !== null ? 'bg-yellow-50 border-yellow-200' : 'bg-white' }}">

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <!-- ================= FOOTER ================= -->
            <div class="flex flex-col lg:flex-row items-center justify-between gap-5
                        p-8 border-t border-pink-100 bg-pink-50/50">

                <p class="text-sm text-slate-500 text-center lg:text-left font-semibold">
                    Guarda las notas del periodo seleccionado para actualizar el boletín académico ✨
                </p>

                <button type="submit"
                        class="inline-flex items-center gap-3
                               bg-gradient-to-r from-pink-500 to-purple-500
                               hover:from-pink-600 hover:to-purple-600
                               text-black font-black
                               px-8 py-4 rounded-2xl
                               shadow-xl hover:scale-105
                               transition duration-300">

                    💾 Guardar Calificaciones

                </button>

            </div>

        </form>

    </div>

</div>

<!-- ================= SCRIPT ================= -->
<script>
    (() => {

        const selectPeriodo = document.getElementById('periodo-academico');
        const notaInputs = Array.from(document.querySelectorAll('.nota-input'));

        if (!selectPeriodo || notaInputs.length === 0) {
            return;
        }

        const actualizarNotas = () => {

            const periodo = selectPeriodo.value;

            notaInputs.forEach((input) => {

                const fila = input.closest('tr');

                if (!fila) return;

                const notas = JSON.parse(fila.dataset.notas || '{}');

                const notaPeriodo = notas[periodo];

                input.value = notaPeriodo ?? '';

                input.classList.toggle(
                    'bg-yellow-50',
                    notaPeriodo !== undefined &&
                    notaPeriodo !== null &&
                    notaPeriodo !== ''
                );

                input.classList.toggle(
                    'border-yellow-200',
                    notaPeriodo !== undefined &&
                    notaPeriodo !== null &&
                    notaPeriodo !== ''
                );

            });

        };

        selectPeriodo.addEventListener('change', actualizarNotas);

        actualizarNotas();

    })();
</script>

@endsection