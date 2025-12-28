<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800 antialiased">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r shadow-sm flex flex-col">

        <!-- LOGO -->
        <div class="px-6 py-6 flex items-center gap-3 border-b">
            <h1 class="text-lg font-extrabold text-indigo-700 tracking-wide">
                Sistema Académico
            </h1>
        </div>

        <!-- MENU -->
        <nav class="flex-1 px-3 py-6 text-sm space-y-1">

            

            <a href="{{ route('dashboard') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg
                      text-slate-700 font-medium
                      hover:bg-indigo-50 hover:text-indigo-700 transition">
                Inicio
            </a>

            <a href="{{ route('estudiante.notas.index') }}"
               class="flex items-center gap-3 px-4 py-2 rounded-lg
                      text-slate-700 font-medium
                      hover:bg-indigo-50 hover:text-indigo-700 transition">
                Mis notas
            </a>
            
        </nav>

        <!-- FOOTER SIDEBAR -->
        <div class="px-6 py-4 border-t text-xs text-slate-400">
            © {{ date('Y') }} Camilo Sánchez
        </div>

    </aside>

    <!-- CONTENIDO PRINCIPAL -->
    <div class="flex-1 flex flex-col">

        <!-- TOPBAR -->
        <header class="bg-white shadow-sm px-8 py-4 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-slate-700">
                @yield('title', 'Dashboard')
            </h1>

            <div class="flex items-center gap-5">
                <div class="text-right leading-tight">
                    <p class="text-sm font-semibold text-slate-800">
                        {{ auth()->user()->correo ?? 'Usuario' }}
                    </p>
                    <p class="inline-block mt-1 text-xs font-semibold uppercase tracking-wide
                        text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded-full">
                        {{ auth()->user()->rol ?? 'Rol' }}
                    </p>
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="flex items-center gap-2 text-sm font-semibold text-red-600
                               border border-red-200 px-4 py-2 rounded-lg
                               hover:bg-red-50 hover:border-red-300 transition">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </header>

        <!-- MAIN -->
        <main class="flex-1 p-8">
            @yield('content') <!-- Aquí se inyecta el contenido de cada vista -->
        </main>

    </div>

</div>

</body>
</html>
