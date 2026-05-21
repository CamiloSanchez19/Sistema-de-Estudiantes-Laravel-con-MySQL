<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen overflow-hidden bg-sky-50 antialiased text-slate-900">
        <div class="relative min-h-screen">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(186,230,253,0.85),_rgba(239,246,255,0.72)_35%,_#dbeafe_65%,_#cde5a6_66%,_#93c26d_100%)]"></div>
            <div class="absolute inset-x-0 top-0 h-56 bg-[linear-gradient(180deg,rgba(255,255,255,0.55)_0%,rgba(255,255,255,0)_100%)]"></div>
            <div class="absolute left-6 top-8 h-10 w-24 rounded-full bg-white/35 blur-2xl"></div>
            <div class="absolute right-14 top-14 h-14 w-36 rounded-full bg-white/30 blur-2xl"></div>
            <div class="absolute inset-x-0 bottom-0 h-52 bg-gradient-to-t from-emerald-700 via-emerald-500 to-lime-300"></div>
            <div class="absolute inset-x-0 bottom-28 h-28 bg-sky-100/40"></div>

            <div class="absolute inset-x-0 bottom-20 flex items-end justify-center gap-3 px-6 opacity-95">
                <div class="hidden h-24 w-16 rounded-t-2xl bg-sky-100 shadow-[0_0_0_4px_rgba(255,255,255,0.24)] sm:block"></div>
                <div class="h-36 w-20 rounded-t-2xl bg-white/80 shadow-[0_0_0_4px_rgba(255,255,255,0.2)]"></div>
                <div class="h-28 w-16 rounded-t-2xl bg-sky-200 shadow-[0_0_0_4px_rgba(255,255,255,0.16)]"></div>
                <div class="h-40 w-24 rounded-t-2xl bg-sky-50 shadow-[0_0_0_4px_rgba(255,255,255,0.18)]"></div>
                <div class="h-32 w-16 rounded-t-2xl bg-blue-100 shadow-[0_0_0_4px_rgba(255,255,255,0.18)]"></div>
                <div class="h-44 w-28 rounded-t-2xl bg-amber-100 shadow-[0_0_0_4px_rgba(255,255,255,0.18)]"></div>
            </div>

            <div class="relative flex min-h-screen items-center justify-center p-6 md:p-10">
                <div class="w-full max-w-md">
                    <a href="{{ route('home') }}" class="mb-6 flex justify-center" wire:navigate>
                        <span class="inline-flex h-16 w-16 items-center justify-center rounded-3xl bg-white/80 shadow-lg ring-8 ring-white/45 backdrop-blur">
                            <x-app-logo-icon class="h-8 w-8 text-sky-700" />
                        </span>
                        <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                    </a>

                    <div class="overflow-hidden rounded-[2rem] border border-white/60 bg-white/88 shadow-[0_25px_80px_rgba(15,23,42,0.18)] backdrop-blur-xl">
                        <div class="border-b border-sky-100/70 bg-gradient-to-r from-sky-50 via-white to-emerald-50 px-8 py-6 text-center">
                            <p class="text-xs font-semibold uppercase tracking-[0.35em] text-sky-700/80">Sistema de Gestión Educativa</p>
                            <div class="mt-3 flex justify-center">
                                <span class="inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-sky-600 text-white shadow-lg shadow-sky-600/20 ring-8 ring-sky-100">
                                    <x-app-logo-icon class="h-8 w-8 text-white" />
                                </span>
                            </div>
                        </div>

                        <div class="px-8 py-8 sm:px-10">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @fluxScripts
    </body>
</html>
