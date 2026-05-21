<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema Académico')</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Nunito', sans-serif;
            background: #F5F3FF;
            color: #1e1b4b;
            -webkit-font-smoothing: antialiased;
        }

        .kids-layout { display: flex; min-height: 100vh; }

        /* ---- SIDEBAR ---- */
        .kids-sidebar {
            width: 230px;
            background: #5B21B6;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }

        .sidebar-logo {
            padding: 22px 20px 18px;
            border-bottom: 1.5px solid rgba(255,255,255,0.12);
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-shape {
            width: 40px;
            height: 40px;
            background: #7C3AED;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .logo-shape svg {
            width: 22px; height: 22px;
            stroke: #fff; fill: none;
            stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;
        }

        .logo-text { font-size: 14px; font-weight: 900; color: #fff; line-height: 1.25; }
        .logo-sub  { font-size: 11px; font-weight: 600; color: rgba(255,255,255,0.45); margin-top: 1px; }

        .kids-nav { flex: 1; padding: 16px 10px; display: flex; flex-direction: column; gap: 2px; }

        .nav-section {
            font-size: 10px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: rgba(255,255,255,0.32);
            padding: 14px 12px 6px;
        }

        .kids-nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 12px;
            color: rgba(255,255,255,0.70);
            font-size: 13.5px;
            font-weight: 700;
            text-decoration: none;
            transition: background 0.12s, color 0.12s;
        }

        .kids-nav a:hover { background: rgba(255,255,255,0.10); color: #fff; }
        .kids-nav a.active { background: #fff; color: #5B21B6; }

        .kids-nav a svg {
            width: 17px; height: 17px;
            stroke: currentColor; fill: none;
            stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;
            flex-shrink: 0;
        }

        .sidebar-foot {
            padding: 14px 20px;
            border-top: 1.5px solid rgba(255,255,255,0.10);
            font-size: 11px;
            font-weight: 700;
            color: rgba(255,255,255,0.32);
        }

        /* ---- MAIN ---- */
        .kids-main { flex: 1; display: flex; flex-direction: column; min-width: 0; }

        /* TOPBAR */
        .kids-topbar {
            background: #fff;
            border-bottom: 2px solid #EDE9FE;
            padding: 13px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            flex-shrink: 0;
        }

        .topbar-title { font-size: 18px; font-weight: 900; color: #4C1D95; }

        .topbar-right { display: flex; align-items: center; gap: 14px; }

        .avatar-wrap { display: flex; align-items: center; gap: 10px; }

        .avatar {
            width: 38px; height: 38px;
            border-radius: 50%;
            background: #DDD6FE;
            display: flex; align-items: center; justify-content: center;
            font-size: 13px; font-weight: 900; color: #5B21B6;
            flex-shrink: 0;
        }

        .avatar-name { font-size: 13px; font-weight: 800; color: #1e1b4b; display: block; }

        .role-pill {
            font-size: 10px; font-weight: 800;
            background: #FEF3C7; color: #92400E;
            padding: 2px 8px; border-radius: 20px;
            display: inline-block; margin-top: 2px;
            text-transform: uppercase; letter-spacing: 0.4px;
        }

        .divider-v { width: 1px; height: 28px; background: #EDE9FE; }

        .btn-logout {
            display: inline-flex; align-items: center; gap: 7px;
            font-size: 12.5px; font-weight: 800;
            color: #DC2626;
            border: 1.5px solid #FCA5A5;
            background: #fff;
            padding: 7px 14px; border-radius: 12px;
            cursor: pointer;
            font-family: 'Nunito', sans-serif;
            transition: background 0.12s;
        }

        .btn-logout:hover { background: #FEF2F2; }

        .btn-logout svg {
            width: 15px; height: 15px;
            stroke: #DC2626; fill: none;
            stroke-width: 2; stroke-linecap: round; stroke-linejoin: round;
            flex-shrink: 0;
        }

        /* CONTENIDO */
        .kids-content { flex: 1; padding: 28px; }
    </style>
</head>
<body>

<div class="kids-layout">

    {{-- ======================== SIDEBAR ======================== --}}
    <aside class="kids-sidebar">

        <div class="sidebar-logo">
            <div class="logo-shape">
                <svg viewBox="0 0 24 24">
                    <path d="M12 3L2 9l10 6 10-6-10-6z"/>
                    <path d="M2 17l10 6 10-6"/>
                    <path d="M2 13l10 6 10-6"/>
                </svg>
            </div>
            <div>
                <div class="logo-text">Sistema</div>
                <div class="logo-sub">Académico</div>
            </div>
        </div>

        <nav class="kids-nav">

            <div class="nav-section">General</div>

            <a href="{{ route('dashboard') }}"
               class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="3" width="7" height="7" rx="1"/>
                    <rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/>
                    <rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                Inicio
            </a>

            <div class="nav-section">Docente</div>

            <a href="{{ route('docente.calificaciones.index') }}"
               class="{{ request()->routeIs('docente.calificaciones.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <path d="M9 11l3 3L22 4"/>
                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
                </svg>
                Mis materias
            </a>

        </nav>

        <div class="sidebar-foot">© {{ date('Y') }} Camilo Sánchez</div>

    </aside>

    {{-- ======================== MAIN ======================== --}}
    <div class="kids-main">

        <header class="kids-topbar">
            <h1 class="topbar-title">@yield('title', 'Panel principal')</h1>

            <div class="topbar-right">

                <div class="avatar-wrap">
                    <div class="avatar">
                        {{ strtoupper(substr(auth()->user()->correo ?? 'US', 0, 2)) }}
                    </div>
                    <div>
                        <span class="avatar-name">{{ auth()->user()->correo ?? 'Usuario' }}</span>
                        <span class="role-pill">{{ auth()->user()->rol ?? 'Rol' }}</span>
                    </div>
                </div>

                <div class="divider-v"></div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <svg viewBox="0 0 24 24">
                            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/>
                            <polyline points="16 17 21 12 16 7"/>
                            <line x1="21" y1="12" x2="9" y2="12"/>
                        </svg>
                        Cerrar sesión
                    </button>
                </form>

            </div>
        </header>

        <main class="kids-content">
            @yield('content')
        </main>

    </div>

</div>

</body>
</html>