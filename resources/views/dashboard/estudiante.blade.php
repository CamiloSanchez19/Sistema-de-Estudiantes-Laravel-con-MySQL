@extends('layouts.estudiante')

@section('title', 'Mi Panel')

@section('content')

{{-- ================= HEADER ================= --}}
<div class="bg-gradient-to-r from-indigo-600 to-indigo-500
            text-black p-6 rounded-2xl shadow mb-8">

    <h1 class="text-3xl font-bold">
        👋 Hola, {{ $estudiante->nombres }} {{ $estudiante->apellidos }}
    </h1>

    <p class="text-indigo-100 mt-1">
        Bienvenido a tu panel académico
    </p>

</div>

{{-- ================= GRID PRINCIPAL ================= --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- ================= PERFIL ================= --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <h2 class="text-lg font-semibold text-slate-700 mb-4 flex items-center gap-2">
            👤 Perfil del estudiante
        </h2>

        <div class="space-y-3 text-sm text-slate-600">
            <div class="flex justify-between">
                <span class="font-medium">Documento</span>
                <span>{{ $estudiante->documento }}</span>
            </div>

            <div class="flex justify-between">
                <span class="font-medium">Nombre</span>
                <span>{{ $estudiante->nombres }} {{ $estudiante->apellidos }}</span>
            </div>

            <div class="flex justify-between">
                <span class="font-medium">Dirección</span>
                <span>{{ $estudiante->direccion }}</span>
            </div>

            <div class="flex justify-between">
                <span class="font-medium">Teléfono</span>
                <span>{{ $estudiante->telefono }}</span>
            </div>
        </div>
    </div>


@endsection
