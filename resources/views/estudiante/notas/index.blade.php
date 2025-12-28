@extends('layouts.estudiante')

@section('title', 'Mis Calificaciones')

@section('content')
<!-- ENCABEZADO -->
<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-700 mb-2">📊 Mis Calificaciones</h1>
    <p class="text-slate-500">Consulta tus calificaciones por materia y periodo</p>
</div>

<!-- TABLA DE CALIFICACIONES -->
@if($calificaciones->count())
<div class="bg-white rounded-2xl shadow overflow-hidden">

    <div class="overflow-x-auto">
        <table class="w-full border-collapse min-w-[700px]">
            <thead class="bg-slate-100 text-slate-700 font-semibold text-xs uppercase">
                <tr>
                    <th class="px-6 py-3 text-left">Materia</th>
                    <th class="px-3 py-3 text-center">P1</th>
                    <th class="px-3 py-3 text-center">P2</th>
                    <th class="px-3 py-3 text-center">P3</th>
                    <th class="px-3 py-3 text-center">P4</th>
                    <th class="px-3 py-3 text-center">Promedio</th>
                    <th class="px-3 py-3 text-center">Estado</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-200">
                @foreach($calificaciones as $materiaId => $notas)
                    @php
                        $periodos = $notas->keyBy('periodo');
                        $promedio = round($notas->avg('nota'), 2);

                        if ($promedio >= 3.0) {
                            $estado = 'Aprobado';
                            $color = 'green';
                        } elseif ($promedio >= 2.5) {
                            $estado = 'En riesgo';
                            $color = 'yellow';
                        } else {
                            $estado = 'Reprobado';
                            $color = 'red';
                        }
                    @endphp

                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4 text-slate-700 font-semibold">
                            {{ $notas->first()->materia->nombre_materia }}
                        </td>

                        @for($i = 1; $i <= 4; $i++)
                            <td class="px-3 py-4 text-center text-slate-600 font-medium">
                                {{ $periodos[$i]->nota ?? '-' }}
                            </td>
                        @endfor

                        <td class="px-3 py-4 text-center font-bold text-slate-800">
                            {{ $promedio }}
                        </td>

                        <td class="px-3 py-4 text-center">
                            <span class="px-3 py-1 rounded-full text-black 
                                {{ $color === 'green' ? 'bg-green-600' : ($color === 'yellow' ? 'bg-yellow-500' : 'bg-red-600') }}">
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
<div class="bg-white rounded-xl shadow p-6 text-center text-slate-500">
    No tienes calificaciones registradas aún.
</div>
@endif
@endsection
