<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin - HanaTea' }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-slate-50 text-slate-800">
    <div class="min-h-screen md:flex">
        @include('components.admin-sidebar')

        <div class="flex-1">
            @include('components.admin-topbar')

            <main class="mx-auto max-w-7xl px-4 py-6">
                @include('components.toast')
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>