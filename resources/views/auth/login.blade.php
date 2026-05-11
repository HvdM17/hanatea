<x-guest-layout bg="bg-emerald-50">
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-6 text-center">
        <div class="mx-auto mb-3 flex justify-center">
            <img src="{{ asset('assets/logo-hanatea.png') }}"
                 alt="HanaTea"
                 class="h-14 w-14 rounded-2xl border border-emerald-100 bg-white object-contain p-1 shadow-sm">
        </div>
        <h1 class="text-xl font-extrabold tracking-tight text-slate-900">Masuk Admin</h1>
        <p class="mt-1 text-sm text-slate-600">HanaTea — kelola menu, banner, dan profil UMKM.</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input
                id="email"
                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
                autocomplete="username"
            />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input
                id="password"
                class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500"
                type="password"
                name="password"
                required
                autocomplete="current-password"
            />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between gap-3">
            <label for="remember_me" class="inline-flex items-center">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-emerald-600 shadow-sm focus:ring-emerald-500"
                    name="remember"
                >
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-emerald-800 underline-offset-4 hover:text-emerald-900 hover:underline"
                   href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif
        </div>

        <div class="pt-1 flex justify-center">
            <x-primary-button class="inline-flex justify-center rounded-xl bg-emerald-700 px-8 py-3 text-sm font-extrabold uppercase tracking-wide text-white shadow-sm hover:bg-emerald-800 focus:ring-emerald-500">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <p class="mt-6 text-center text-xs text-slate-500">
        Akses khusus admin. Butuh bantuan? hubungi pemilik UMKM.
    </p>
</x-guest-layout>