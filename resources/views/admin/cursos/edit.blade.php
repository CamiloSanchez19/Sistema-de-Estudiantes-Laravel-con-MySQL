@extends('layouts.dashboard')

@section('title', 'Panel Administrador')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-slate-700 mb-6">✏️ Editar Curso</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.cursos.update', $curso) }}" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-slate-700">Nombre del Curso</label>
            <input type="text" name="nombre_curso" 
                   value="{{ old('nombre_curso', $curso->nombre_curso) }}"
                   placeholder="Nombre del curso"
                   class="mt-1 block w-full border @error('nombre_curso') border-red-500 @else border-slate-300 @enderror rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div>
            <button type="submit" 
                    class="w-full bg-indigo-600 text-black px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
                Actualizar
            </button>
        </div>
    </form>
</div>
@endsection
