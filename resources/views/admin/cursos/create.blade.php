@extends('layouts.dashboard')

@section('title', 'Panel Administrador')

@section('content')
    <h1 class="text-2xl font-bold text-slate-700 mb-6">➕ Nuevo Curso</h1>

    <form method="POST" action="{{ route('admin.cursos.store') }}" class="space-y-4">
        @csrf

        <div>
            <label for="nombre_curso" class="block text-sm font-medium text-slate-700">Nombre del Curso</label>
            <input type="text" id="nombre_curso" name="nombre_curso" placeholder="Ingrese el nombre del curso"
                   required
                   class="mt-1 block w-full border rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 @error('nombre_curso') border-red-500 @enderror">
        </div>

        <div>
            <button type="submit"
                    class="w-full bg-indigo-600 text-black px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
                Guardar
            </button>
        </div>
    </form>
</div>
@endsection
