<x-guest-layout>
    <div class="min-h-screen bg-blue-100 flex items-center justify-center relative">
        <!-- Fondo ilustrativo -->
        <div class="absolute inset-0">
            <img src="https://static.vecteezy.com/system/resources/previews/021/592/930/non_2x/children-going-to-school-cartoon-vector.jpg" 
                 alt="Fondo educativo" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-blue-100/60"></div> <!-- capa semi-transparente -->
        </div>

        <!-- Contenedor del login -->
        <div class="relative z-10 w-full max-w-sm bg-white rounded-3xl shadow-2xl p-8">
            <!-- Logo y título -->
            <div class="text-center mb-6">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlpkVl1v1VXlykKiHJlEwmZIP_bV4rSTvfvg&s" 
                     alt="Logo Sistema" 
                     class="mx-auto w-20 h-20">
                <h1 class="text-2xl font-bold text-gray-800 mt-2">Sistema de Gestión Educativa</h1>
                <p class="text-gray-500 text-sm">Inicia sesión para continuar</p>
            </div>

            <!-- Errores -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-2 mb-4 rounded-lg border border-red-200">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Usuario -->
                <div class="mb-4 relative">
                    <x-text-input id="correo"
                                  class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition placeholder-gray-400"
                                  type="text"
                                  name="correo"
                                  :value="old('correo')"
                                  placeholder="Usuario"
                                  required
                                  autofocus />
                    <x-input-error :messages="$errors->get('correo')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- Contraseña -->
                <div class="mb-4 relative">
                    <x-text-input id="password"
                                  class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 transition placeholder-gray-400"
                                  type="password"
                                  name="password"
                                  placeholder="Contraseña"
                                  required />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-600" />
                </div>

                <!-- Recordarme -->
                <div class="flex items-center mb-4">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">Recordar Contraseña</label>
                </div>

                <!-- Roles -->
                <div class="flex justify-between mb-6 gap-2 flex-wrap">
                    <button type="button" class="flex-1 px-3 py-1 bg-orange-500 text-white rounded-lg hover:bg-orange-500 transition">Admin</button>
                    <button type="button" class="flex-1 px-3 py-1 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">Profesor</button>
                    <button type="button" class="flex-1 px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">Alumno</button>
                </div>

                <!-- Botón Acceder -->
                <x-primary-button class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 rounded-lg font-semibold transition-transform hover:scale-105">
                    ACCEDER
                </x-primary-button>
            </form>
        </div>
    </div>
</x-guest-layout>
