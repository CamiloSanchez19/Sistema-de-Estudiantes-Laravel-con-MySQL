<x-layouts.auth>
    <div class="flex flex-col gap-7">
        <div class="space-y-4 text-center">
            <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-[1.75rem] bg-gradient-to-br from-sky-600 via-sky-500 to-cyan-400 text-white shadow-[0_20px_40px_rgba(14,165,233,0.35)] ring-8 ring-sky-100">
                <x-app-logo-icon class="h-10 w-10 text-white" />
            </div>

            <div class="space-y-2">
                <p class="text-xs font-semibold uppercase tracking-[0.35em] text-sky-700">Acceder</p>
                <h1 class="text-2xl font-semibold tracking-tight text-slate-900 sm:text-[1.7rem]">Sistema de Gestión Educativa</h1>
                <p class="mx-auto max-w-xs text-sm leading-6 text-slate-600">Ingresa con tu correo y contraseña para continuar al panel correspondiente.</p>
            </div>

            <div class="grid grid-cols-2 gap-2 text-xs font-semibold sm:grid-cols-4">
                <span class="rounded-full bg-orange-100 px-3 py-2 text-orange-700">Admin</span>
                <span class="rounded-full bg-emerald-100 px-3 py-2 text-emerald-700">Profesor</span>
                <span class="rounded-full bg-sky-100 px-3 py-2 text-sky-700">Alumno</span>
                <span class="rounded-full bg-violet-100 px-3 py-2 text-violet-700">Padres</span>
            </div>
        </div>

        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-5">
            @csrf

            <flux:input
                name="email"
                :label="__('Correo electrónico')"
                :value="old('email')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="correo@colegio.com"
            />

            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('Contraseña')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Contraseña')"
                    viewable
                />

                @if (Route::has('password.request'))
                    <flux:link class="absolute end-0 top-0 text-sm text-sky-700" :href="route('password.request')" wire:navigate>
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </flux:link>
                @endif
            </div>

            <div class="flex items-center justify-between gap-4">
                <flux:checkbox name="remember" :label="__('Recordarme')" :checked="old('remember')" />

                @if (Route::has('register'))
                    <flux:link class="text-sm text-slate-600" :href="route('register')" wire:navigate>
                        {{ __('Crear cuenta') }}
                    </flux:link>
                @endif
            </div>

            <flux:button variant="primary" type="submit" class="h-12 w-full rounded-xl text-sm font-semibold uppercase tracking-[0.18em] shadow-lg shadow-sky-600/20" data-test="login-button">
                {{ __('Acceder') }}
            </flux:button>
        </form>
    </div>
</x-layouts.auth>
