@extends('layouts.dashboard')

@section('title', 'Panel Administrador')

@section('content')
    <!-- Encabezado -->
<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold text-slate-700 mb-6">Matrículas</h1>

    <a href="{{ route('admin.matriculas.create') }}"
       class="inline-block bg-indigo-600 text-black px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition mb-4">
        + Nueva Matrícula
    </a>

    <!-- Mensaje de éxito -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabla de Matrículas -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-slate-200 border rounded-lg">
            <thead class="bg-slate-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                        Estudiante
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                        Curso
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-200">
                @foreach($matriculas as $m)
                <tr class="hover:bg-slate-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">
                        {{ $m->estudiante->nombres }} {{ $m->estudiante->apellidos }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">
                        {{ $m->curso->nombre_curso }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm flex gap-2">
                        <form method="POST" action="{{ route('admin.matriculas.destroy', $m) }}"
                              onsubmit="return confirm('¿Deseas eliminar esta matrícula?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-red-600 hover:text-red-800 font-semibold px-2 py-1 rounded hover:bg-red-50 transition">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
