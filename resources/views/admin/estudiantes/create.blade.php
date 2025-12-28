@extends('layouts.dashboard')

@section('title', 'Panel Administrador')

@section('content')

{{-- ========= ALERTA DE ÉXITO ========= --}}
@if(session('success'))
    <div class="mb-6 bg-emerald-100 border border-emerald-300
                text-emerald-800 px-4 py-3 rounded-xl
                flex items-center gap-2 shadow">
        ✅ {{ session('success') }}
    </div>
@endif

<h1 class="text-2xl font-bold text-slate-700 mb-6">
    ➕ Nuevo Estudiante
</h1>

<form method="POST"
      action="{{ route('admin.estudiantes.store') }}"
      class="space-y-8 max-w-3xl">
    @csrf

    <!-- ================= DATOS DE ACCESO ================= -->
    <div class="bg-slate-100 p-6 rounded-xl shadow-sm space-y-4">
        <h2 class="text-lg font-semibold text-slate-700">
            🔐 Datos de acceso
        </h2>

        <!-- Correo -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">
                Correo electrónico
            </label>
            <input type="email"
                   name="correo"
                   value="{{ old('correo') }}"
                   class="w-full rounded-lg border px-3 py-2
                          focus:ring-indigo-500 focus:border-indigo-500
                          @error('correo') border-red-500 @enderror">
            @error('correo')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Contraseña -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">
                Contraseña
            </label>
            <input type="password"
                   name="password"
                   class="w-full rounded-lg border px-3 py-2
                          focus:ring-indigo-500 focus:border-indigo-500
                          @error('password') border-red-500 @enderror">
            @error('password')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- ================= DATOS PERSONALES ================= -->
    <div class="bg-white p-6 rounded-xl shadow-sm space-y-4">
        <h2 class="text-lg font-semibold text-slate-700">
            👤 Datos personales
        </h2>

        <!-- Documento -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">
                Documento
            </label>
            <input type="text"
                   name="documento"
                   value="{{ old('documento') }}"
                   class="w-full rounded-lg border px-3 py-2
                          focus:ring-indigo-500 focus:border-indigo-500
                          @error('documento') border-red-500 @enderror">
            @error('documento')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nombres -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">
                Nombres
            </label>
            <input type="text"
                   name="nombres"
                   value="{{ old('nombres') }}"
                   class="w-full rounded-lg border px-3 py-2">
        </div>

        <!-- Apellidos -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">
                Apellidos
            </label>
            <input type="text"
                   name="apellidos"
                   value="{{ old('apellidos') }}"
                   class="w-full rounded-lg border px-3 py-2">
        </div>

        <!-- Fecha de nacimiento -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">
                Fecha de nacimiento
            </label>
            <input type="date"
                   name="fecha_nacimiento"
                   value="{{ old('fecha_nacimiento') }}"
                   class="w-full rounded-lg border px-3 py-2">
        </div>

        <!-- Sangre y sexo -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">
                    Tipo de sangre
                </label>
                <select name="tipo_sangre"
                        class="w-full rounded-lg border px-3 py-2">
                    @foreach(['A+','A-','B+','B-','AB+','AB-','O+','O-'] as $tipo)
                        <option value="{{ $tipo }}"
                            {{ old('tipo_sangre') == $tipo ? 'selected' : '' }}>
                            {{ $tipo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">
                    Sexo
                </label>
                <select name="sexo"
                        class="w-full rounded-lg border px-3 py-2">
                    <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>
                        Masculino
                    </option>
                    <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>
                        Femenino
                    </option>
                </select>
            </div>
        </div>

        <!-- Dirección -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">
                Dirección
            </label>
            <input type="text"
                   name="direccion"
                   value="{{ old('direccion') }}"
                   class="w-full rounded-lg border px-3 py-2">
        </div>

        <!-- Barrio -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">
                Barrio
            </label>
            <input type="text"
                   name="barrio"
                   value="{{ old('barrio') }}"
                   class="w-full rounded-lg border px-3 py-2">
        </div>

        <!-- Teléfono -->
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-1">
                Teléfono
            </label>
            <input type="text"
                   name="telefono"
                   value="{{ old('telefono') }}"
                   class="w-full rounded-lg border px-3 py-2">
        </div>
    </div>

    <!-- ================= BOTÓN ================= -->
    <button type="submit"
        class="w-full bg-indigo-600 text-black py-3 rounded-xl
               font-semibold hover:bg-indigo-700 transition shadow">
        💾 Guardar estudiante
    </button>

</form>
@endsection
