<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center relative overflow-hidden bg-gradient-to-br from-blue-100 via-sky-200 to-indigo-300">

        <!-- Fondo -->
        <div class="absolute inset-0">

            <img src="https://cdn.creativefabrica.com/2020/07/05/School-Stationery-Pattern-Background-Graphics-4546687-1.jpg"
                 alt="Fondo educativo"
                 class="w-full h-full object-cover opacity-20">

            <div class="absolute inset-0 bg-slate-900/40"></div>

        </div>

        <!-- Formulario -->
        <div class="relative z-10 w-full max-w-md px-6">

            <div class="bg-white rounded-3xl shadow-2xl p-8 md:p-10">

                <!-- Logo -->
                <div class="text-center mb-8">

                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlpkVl1v1VXlykKiHJlEwmZIP_bV4rSTvfvg&s"
                         alt="Logo"
                         class="w-24 h-24 mx-auto rounded-full shadow-lg border-4 border-white object-cover">

                    <h1 class="mt-5 text-3xl font-extrabold text-slate-800">
                        Sistema Educativo
                    </h1>

                    <p class="mt-2 text-sm text-slate-500">
                        Inicia sesión para continuar
                    </p>

                </div>

                <!-- Errores -->
                @if ($errors->any())
                    <div class="mb-5 rounded-2xl border border-red-200 bg-red-50 px-4 py-3">
                        <ul class="space-y-1 text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulario -->
                <form method="POST" action="{{ route('login') }}" class="space-y-5">
                    @csrf

                    <!-- Usuario -->
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-slate-700">
                            Usuario
                        </label>

                        <input
                            id="correo"
                            type="text"
                            name="correo"
                            value="{{ old('correo') }}"
                            required
                            autofocus
                            placeholder="Ingresa tu usuario"
                            class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-5 py-4 text-slate-700 placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-200 outline-none transition">

                    </div>

                    <!-- Contraseña -->
                    <div>

                        <label class="block mb-2 text-sm font-semibold text-slate-700">
                            Contraseña
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="Ingresa tu contraseña"
                            class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-5 py-4 text-slate-700 placeholder-slate-400 focus:border-blue-500 focus:ring-4 focus:ring-blue-200 outline-none transition">

                    </div>

                    <!-- Opciones -->
                    <div class="flex items-center justify-between text-sm">

                    
                       

                    </div>

                    <!-- Roles -->
                    <div class="flex justify-center pt-2">

                        <div class="inline-flex overflow-hidden rounded-xl border border-gray-200 shadow-sm">

                            <button type="button"
                                    class="px-6 py-2 text-sm font-semibold bg-orange-400 text-black ">
                                Admin
                            </button>

                            <button type="button"
                                    class="px-6 py-2 text-sm font-semibold  text-black hover:bg-emerald-600 transition border-l border-white/20">
                                Profesor
                            </button>

                            <button type="button"
                                    class="px-6 py-2 text-sm font-semibold bg-sky-500 text-black hover:bg-sky-600 transition border-l border-white/20">
                                Alumno
                            </button>

                        </div>

                    </div>

                    <!-- Botón -->
                    <button
                        type="submit"
                        class="w-full rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 py-4 text-base font-semibold text-black shadow-lg hover:from-blue-700 hover:to-green-700 transition duration-300">

                        Iniciar sesión

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-guest-layout>