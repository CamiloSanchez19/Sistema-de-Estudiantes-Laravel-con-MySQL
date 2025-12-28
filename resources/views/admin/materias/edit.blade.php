@extends('layouts.dashboard')

@section('title', 'Panel Administrador')

@section('content')

@section('content')
<h1 class="text-2xl font-bold text-slate-700 mb-6">✏️ Editar Materia</h1>

<form method="POST" action="{{ route('admin.materias.update', $materia) }}">
@csrf
@method('PUT')

<input type="text" name="nombre_materia"
       value="{{ $materia->nombre_materia }}"
       class="mt-1 block w-full border @error('nombre_materia') border-red-500 @else border-slate-300 @enderror rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">

<button class="w-full bg-indigo-600 text-black px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
Actualizar
</button>
</form>
@endsection
