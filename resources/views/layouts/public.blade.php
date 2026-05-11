<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'HanaTea' }}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-white text-slate-800">
    @include('components.public-navbar')

    <main class="min-h-screen">
        @include('components.toast')
        @yield('content')
    </main>

    @include('components.public-footer')
    @include('components.whatsapp-float')
</body>
</html>