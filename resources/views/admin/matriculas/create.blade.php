@extends('layouts.dashboard')

@section('title', 'Panel Administrador')

@section('content')
    <!-- Encabezado -->
    <h2 class="text-2xl font-bold text-slate-700 mb-6">➕ Nueva Matrícula</h2>

    <!-- Formulario -->
    <form method="POST" action="{{ route('admin.matriculas.store') }}" class="space-y-4">
        @csrf

        <!-- Estudiante -->
        <div>
            <label class="block text-sm font-medium text-slate-700">Estudiante</label>
            <select name="id_estudiante"
                    class="mt-1 block w-full border rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 @error('id_estudiante') border-red-500 @enderror">
                <option value="">Seleccione estudiante</option>
                @foreach($estudiantes as $e)
                    <option value="{{ $e->id_estudiante }}" @selected(old('id_estudiante') == $e->id_estudiante)>
                        {{ $e->nombres }} {{ $e->apellidos }}
                    </option>
                @endforeach
            </select>
            @error('id_estudiante')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Curso -->
        <div>
            <label class="block text-sm font-medium text-slate-700">Curso</label>
            <select name="id_curso"
                    class="mt-1 block w-full border rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 @error('id_curso') border-red-500 @enderror">
                <option value="">Seleccione curso</option>
                @foreach($cursos as $c)
                    <option value="{{ $c->id_curso }}" @selected(old('id_curso') == $c->id_curso)>
                        {{ $c->nombre_curso }}
                    </option>
                @endforeach
            </select>
            @error('id_curso')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Botón -->
        <div>
            <button type="submit"
                    class="w-full bg-indigo-600 text-black px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
                Matricular
            </button>
        </div>
    </form>
</div>
@endsection
