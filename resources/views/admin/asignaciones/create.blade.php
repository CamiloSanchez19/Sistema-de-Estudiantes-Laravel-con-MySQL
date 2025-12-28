@extends('layouts.dashboard')

@section('title', 'Panel Administrador')

@section('content')
    <h1 class="text-2xl font-bold text-slate-700 mb-6">➕ Nueva Asignación</h1>

    <form method="POST" action="{{ route('admin.asignaciones.store') }}" class="space-y-4">
        @csrf

<div>
    <label class="block text-sm font-medium text-slate-700">Docente</label>
    <select name="id_usuario_docente" 
            class="mt-1 block w-full border border-slate-300 rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
        <option value="">Seleccione docente</option>
        @foreach($docentes as $d)
            <option value="{{ $d->id_usuario }}">{{ $d->correo }}</option>
        @endforeach
    </select>
    @error('id_usuario_docente')
        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>



        <div>
            <label class="block text-sm font-medium text-slate-700">Materia</label>
            <select name="id_materia"
                    class="mt-1 block w-full border border-slate-300 rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Seleccione materia</option>
                @foreach($materias as $m)
                    <option value="{{ $m->id_materia }}">{{ $m->nombre_materia }}</option>
                @endforeach
            </select>
            @error('id_materia')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-slate-700">Curso</label>
            <select name="id_curso"
                    class="mt-1 block w-full border border-slate-300 rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">Seleccione curso</option>
                @foreach($cursos as $c)
                    <option value="{{ $c->id_curso }}">{{ $c->nombre_curso }}</option>
                @endforeach
            </select>
            @error('id_curso')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit"
                    class="w-full bg-indigo-600 text-black px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
                Asignar
            </button>
        </div>
    </form>
</div>
@endsection
