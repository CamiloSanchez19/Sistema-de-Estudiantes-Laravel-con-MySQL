@extends('layouts.docente')

@section('title', 'Registrar Calificaciones')

@section('content')

<!-- ENCABEZADO -->
<div class="mb-10">
    <h2 class="text-3xl font-extrabold text-slate-800 flex items-center gap-3">
        ✏️ Registro de calificaciones
    </h2>

    <p class="text-slate-600 mt-2 text-sm">
        Materia:
        <span class="font-semibold text-indigo-600">
            {{ $asignacion->materia->nombre_materia }}
        </span>
        —
        Curso:
        <span class="font-semibold">
            {{ $asignacion->curso->nombre_curso }}
        </span>
    </p>
</div>

<!-- ALERTA DE CONFIRMACIÓN -->
@if(session('success'))
    <div class="mb-6 flex items-start gap-3
                bg-emerald-50 border border-emerald-200
                text-emerald-800 px-5 py-4 rounded-xl shadow-sm">
        <span class="text-xl">✅</span>
        <div>
            <p class="font-semibold">
                {{ session('success') }}
            </p>
            <p class="text-xs text-emerald-600 mt-1">
                Los cambios se han guardado correctamente.
            </p>
        </div>
    </div>
@endif

<!-- FORMULARIO -->
<form method="POST"
      action="{{ route('docente.calificaciones.store') }}"
      class="bg-white rounded-3xl shadow-lg p-8 space-y-8">
    @csrf

    <input type="hidden" name="id_materia" value="{{ $asignacion->id_materia }}">

    <!-- PERIODO ACADÉMICO -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">
                Periodo académico
            </label>

            <select name="periodo" required
                class="w-full rounded-xl border-slate-300
                       focus:border-indigo-500 focus:ring-indigo-500
                       text-sm px-4 py-2">

                <option value="" disabled selected>Seleccione el periodo</option>
                <option value="1">Periodo 1</option>
                <option value="2">Periodo 2</option>
                <option value="3">Periodo 3</option>
                <option value="4">Periodo 4</option>
            </select>
        </div>

        <div class="bg-indigo-50 border border-indigo-100 rounded-xl p-4 text-sm text-indigo-700">
            📝 Si existe una nota previa, se mostrará a la izquierda.
            <br>
            <span class="text-xs text-indigo-500">
                Las notas válidas están entre 0.0 y 5.0
            </span>
        </div>
    </div>

    <!-- TABLA -->
    <div class="overflow-x-auto">
        <table class="w-full border border-slate-200 rounded-2xl overflow-hidden">
            <thead class="bg-slate-100">
                <tr>
                    <th class="text-left px-5 py-4 text-sm font-semibold text-slate-700">
                        👤 Estudiante
                    </th>

                    <th class="text-center px-5 py-4 text-sm font-semibold text-slate-700 w-40">
                        📌 Nota anterior
                    </th>

                    <th class="text-center px-5 py-4 text-sm font-semibold text-slate-700 w-48">
                        ✏️ Nota nueva
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach($matriculas as $m)
                    @php
                        $notaAnterior = $notasAnteriores[$m->id_matricula] ?? null;
                    @endphp

                    <tr class="hover:bg-indigo-50 transition">
                        <!-- Estudiante -->
                        <td class="px-5 py-3 text-sm text-slate-700">
                            {{ $m->estudiante->nombres }}
                            {{ $m->estudiante->apellidos }}
                        </td>

                        <!-- Nota anterior -->
                        <td class="px-5 py-3 text-center">
                            @if($notaAnterior !== null)
                                <span class="inline-block bg-emerald-100 text-emerald-700
                                             px-3 py-1 rounded-lg text-sm font-semibold">
                                    {{ number_format($notaAnterior, 2) }}
                                </span>
                            @else
                                <span class="text-slate-400 italic text-sm">
                                    Sin registro
                                </span>
                            @endif
                        </td>

                        <!-- Nota nueva -->
                        <td class="px-5 py-3 text-center">
                            <input type="hidden" name="id_matricula[]" value="{{ $m->id_matricula }}">

                            <input type="number"
                                   name="nota[]"
                                   step="0.01"
                                   min="0"
                                   max="5"
                                   value="{{ $notaAnterior }}"
                                   placeholder="0.0"
                                   class="w-28 text-center rounded-xl border-slate-300
                                          focus:border-indigo-500 focus:ring-indigo-500
                                          text-sm px-3 py-2
                                          {{ $notaAnterior !== null ? 'bg-yellow-50' : '' }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- ACCIONES -->
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 pt-6 border-t">
        <p class="text-xs text-slate-500">
            ✔ Si modifica una nota existente, esta será actualizada.
        </p>

        <button type="submit"
            class="bg-indigo-600 text-white px-8 py-3 rounded-xl
                   font-semibold text-sm hover:bg-indigo-700
                   transition flex items-center gap-2 shadow">
            💾 Guardar calificaciones
        </button>
    </div>

</form>

@endsection
