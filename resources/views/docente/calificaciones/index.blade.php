@extends('layouts.docente')

@section('title', 'Panel del Docente')

@section('content')

<!-- ENCABEZADO -->
<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-700 mb-6">Mis materias asignadas</h1>
        
  
    <p class="text-slate-500 mt-1">
        Selecciona una materia para registrar calificaciones
    </p>
</div>

<!-- LISTADO EN TABLA -->
@if($asignaciones->count())
    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <table class="w-full border-collapse">
            <thead class="bg-slate-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-slate-600 uppercase">
                        Materia
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-slate-600 uppercase">
                        Curso
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-slate-600 uppercase">
                        Acción
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @foreach($asignaciones as $a)
                    <tr class="hover:bg-slate-50 transition">

                        <!-- MATERIA -->
                        <td class="px-6 py-4 text-sm text-slate-700 font-semibold">
                            📚 {{ $a->materia->nombre_materia }}
                        </td>

                        <!-- CURSO -->
                        <td class="px-6 py-4 text-sm text-slate-600">
                            {{ $a->curso->nombre_curso }}
                        </td>

                        <!-- ACCIÓN -->
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('docente.calificaciones.create', $a->id_asignacion) }}"
                               class="inline-flex items-center gap-2
                                      bg-indigo-600 text-black
                                      px-4 py-2 rounded-xl
                                      text-sm font-semibold
                                      hover:bg-indigo-700 transition">
                                ✏️
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@else
    <div class="bg-white rounded-xl shadow p-6 text-center text-slate-500">
        No tienes materias asignadas.
    </div>
@endif


@endsection
