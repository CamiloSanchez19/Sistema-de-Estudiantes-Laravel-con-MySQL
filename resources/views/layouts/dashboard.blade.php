<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema Académico')</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* =============================================
           SISTEMA ACADÉMICO — TEMA INFANTIL v2
           Autor: Camilo Sánchez
        ============================================= */

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
            width: 22px;
            height: 22px;
            stroke: #fff;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .logo-text  { font-size: 14px; font-weight: 900; color: #fff; line-height: 1.25; }
        .logo-sub   { font-size: 11px; font-weight: 600; color: rgba(255,255,255,0.45); margin-top: 1px; }

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
            color: rgba(255,255,255,0.7);
            font-size: 13.5px;
            font-weight: 700;
            text-decoration: none;
            transition: background 0.12s, color 0.12s;
        }

        .kids-nav a:hover { background: rgba(255,255,255,0.1); color: #fff; }

        .kids-nav a.active { background: #fff; color: #5B21B6; }

        .kids-nav a svg {
            width: 17px;
            height: 17px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }

        .sidebar-foot {
            padding: 14px 20px;
            border-top: 1.5px solid rgba(255,255,255,0.1);
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
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: #DDD6FE;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 900;
            color: #5B21B6;
            flex-shrink: 0;
        }

        .avatar-name  { font-size: 13px; font-weight: 800; color: #1e1b4b; display: block; }

        .role-pill {
            font-size: 10px;
            font-weight: 800;
            background: #FEF3C7;
            color: #92400E;
            padding: 2px 8px;
            border-radius: 20px;
            display: inline-block;
            margin-top: 2px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .divider-v { width: 1px; height: 28px; background: #EDE9FE; }

        .btn-logout {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 12.5px;
            font-weight: 800;
            color: #DC2626;
            border: 1.5px solid #FCA5A5;
            background: #fff;
            padding: 7px 14px;
            border-radius: 12px;
            cursor: pointer;
            font-family: 'Nunito', sans-serif;
            transition: background 0.12s;
        }

        .btn-logout:hover { background: #FEF2F2; }

        .btn-logout svg {
            width: 15px;
            height: 15px;
            stroke: #DC2626;
            fill: none;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }

        /* CONTENIDO */
        .kids-content { flex: 1; padding: 28px; }

        /* ---- COMPONENTES REUTILIZABLES ---- */

        /* Banner de bienvenida */
        .kids-banner {
            background: #7C3AED;
            border-radius: 18px;
            padding: 22px 26px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            position: relative;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .kids-banner::before {
            content: '';
            position: absolute;
            width: 100px; height: 100px;
            border-radius: 50%;
            background: rgba(255,255,255,0.07);
            top: -30px; right: 140px;
        }

        .kids-banner::after {
            content: '';
            position: absolute;
            width: 70px; height: 70px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            bottom: -20px; right: 60px;
        }

        .kids-banner h2 { font-size: 20px; font-weight: 900; color: #fff; margin-bottom: 5px; }
        .kids-banner p  { font-size: 13px; font-weight: 600; color: rgba(255,255,255,0.75); }

        .banner-action {
            background: rgba(255,255,255,0.15);
            border: 1.5px solid rgba(255,255,255,0.25);
            border-radius: 14px;
            padding: 10px 18px;
            font-size: 13px;
            font-weight: 800;
            color: #fff;
            white-space: nowrap;
            flex-shrink: 0;
            text-decoration: none;
        }

        /* Stats grid */
        .kids-stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin-bottom: 20px; }

        .stat-card {
            background: #fff;
            border-radius: 16px;
            border: 1.5px solid #EDE9FE;
            padding: 18px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .stat-icon {
            width: 44px; height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .stat-icon svg {
            width: 22px; height: 22px;
            fill: none; stroke-width: 2;
            stroke-linecap: round; stroke-linejoin: round;
        }

        .si-blue  { background: #EFF6FF; } .si-blue  svg { stroke: #3B82F6; }
        .si-green { background: #F0FDF4; } .si-green svg { stroke: #22C55E; }
        .si-amber { background: #FFFBEB; } .si-amber svg { stroke: #F59E0B; }

        .stat-num   { font-size: 24px; font-weight: 900; color: #1e1b4b; line-height: 1; display: block; }
        .stat-label { font-size: 11.5px; font-weight: 700; color: #7C3AED; text-transform: uppercase; letter-spacing: 0.5px; margin-top: 4px; display: block; }

        /* Accesos rápidos */
        .section-head {
            font-size: 12px;
            font-weight: 800;
            color: #7C3AED;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            margin-bottom: 12px;
        }

        .quick-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; }

        .quick-card {
            background: #fff;
            border: 1.5px solid #EDE9FE;
            border-radius: 16px;
            padding: 16px 12px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            text-decoration: none;
            transition: transform 0.12s, border-color 0.12s;
        }

        .quick-card:hover { transform: translateY(-3px); border-color: #C4B5FD; }

        .quick-icon {
            width: 40px; height: 40px;
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
        }

        .quick-icon svg {
            width: 20px; height: 20px;
            fill: none; stroke-width: 2;
            stroke-linecap: round; stroke-linejoin: round;
        }

        .qi-blue  { background: #EFF6FF; } .qi-blue  svg { stroke: #3B82F6; }
        .qi-green { background: #F0FDF4; } .qi-green svg { stroke: #16A34A; }
        .qi-pink  { background: #FDF2F8; } .qi-pink  svg { stroke: #DB2777; }
        .qi-amber { background: #FFFBEB; } .qi-amber svg { stroke: #D97706; }

        .quick-label { font-size: 12px; font-weight: 800; color: #4C1D95; text-align: center; }
    </style>
</head>
<body>

<div class="kids-layout">

    <!-- ========================
         SIDEBAR
    ========================= -->
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

            <div class="nav-section">Gestión</div>

            <a href="{{ route('admin.estudiantes.index') }}"
               class="{{ request()->routeIs('admin.estudiantes.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4"/>
                    <path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/>
                </svg>
                Estudiantes
            </a>

            <a href="{{ route('admin.cursos.index') }}"
               class="{{ request()->routeIs('admin.cursos.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <path d="M4 19V7a2 2 0 012-2h12a2 2 0 012 2v12"/>
                    <path d="M4 15h16"/>
                    <path d="M9 5v10"/>
                </svg>
                Cursos
            </a>

            <a href="{{ route('admin.materias.index') }}"
               class="{{ request()->routeIs('admin.materias.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <path d="M4 6h16M4 12h16M4 18h10"/>
                </svg>
                Materias
            </a>

            <a href="{{ route('admin.matriculas.index') }}"
               class="{{ request()->routeIs('admin.matriculas.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <rect x="3" y="4" width="18" height="18" rx="2"/>
                    <path d="M16 2v4M8 2v4M3 10h18"/>
                </svg>
                Matrículas
            </a>

            <a href="{{ route('admin.asignaciones.index') }}"
               class="{{ request()->routeIs('admin.asignaciones.*') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24">
                    <path d="M9 11l3 3L22 4"/>
                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
                </svg>
                Asignaciones
            </a>

        </nav>

        <div class="sidebar-foot">© {{ date('Y') }} Camilo Sánchez</div>

    </aside>

    <!-- ========================
         CONTENIDO PRINCIPAL
    ========================= -->
    <div class="kids-main">

        <!-- TOPBAR -->
        <header class="kids-topbar">

            <h1 class="topbar-title">@yield('title', 'Panel principal')</h1>

            <div class="topbar-right">

                <div class="avatar-wrap">
                    {{-- Iniciales del usuario --}}
                    <div class="avatar">
                        {{ strtoupper(substr(auth()->user()->correo ?? 'U', 0, 2)) }}
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

        <!-- MAIN -->
        <main class="kids-content">
            @yield('content')
        </main>

    </div>
</div>

</body>
</html>