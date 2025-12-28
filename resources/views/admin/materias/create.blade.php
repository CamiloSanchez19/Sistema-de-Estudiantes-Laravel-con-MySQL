@extends('layouts.dashboard')

@section('title', 'Panel Administrador')

@section('content')
<h1 class="text-2xl font-bold text-slate-700 mb-6">➕ Nueva Materia</h1>

<form method="POST" action="{{ route('admin.materias.store') }}">
@csrf

<input type="text" name="nombre_materia"
       placeholder="Nombre de la materia"
       class="mt-1 block w-full border rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 @error('documento') border-red-500 @enderror">

<button class="w-full bg-indigo-600 text-black px-4 py-2 rounded-lg font-semibold hover:bg-indigo-700 transition">
Guardar
</button>
</form>
@endsection
