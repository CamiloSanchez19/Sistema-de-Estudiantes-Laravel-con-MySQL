@extends('layouts.dashboard')

@section('title', 'Panel Administrador')

@section('content')
<!-- ENCABEZADO -->
<div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold text-slate-700 mb-6">Estudiantes</h1>

    <a href="{{ route('admin.estudiantes.create') }}"
       class="inline-block bg-indigo-600 text-black px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition mb-4">
        + Nuevo Estudiante
    </a>

<!-- TABLA -->
<div class="overflow-x-auto ">
        <table class="min-w-full divide-y divide-slate-200 border rounded-lg">
        <thead class="bg-slate-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                    Documento
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                    Nombre
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody class="divide-y divide-slate-200">
            @foreach($estudiantes as $e)
            <tr class="hover:bg-slate-50 transition">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700 font-medium">
                    {{ $e->documento }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-700">
                    {{ $e->nombres }} {{ $e->apellidos }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm flex items-center gap-3">
                    <a href="{{ route('admin.estudiantes.edit', $e) }}"
                       class="text-blue-600 hover:text-blue-800 font-semibold px-2 py-1 rounded hover:bg-red-50 transition">
                        ✏️ Editar
                    </a>
                       <form action="{{ route('admin.estudiantes.destroy', $e) }}" method="POST" class="inline" onsubmit="return confirm('¿Estás seguro de eliminar este estudiante?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 hover:text-red-800 font-semibold px-2 py-1 rounded hover:bg-red-50 transition">
            🗑️ Eliminar
        </button>
    </form>
</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection
