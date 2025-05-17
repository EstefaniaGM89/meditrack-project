<!DOCTYPE html>
<html lang="es" class="scroll-smooth dark"> {{-- Modo oscuro siempre activado --}}
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'MediTrack')</title>

    {{-- No se incluye script de tema, se forza modo oscuro --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body data-auth="true" class="min-h-screen bg-gray-900 text-gray-200 font-sans">
    <main class="flex items-center justify-center min-h-[calc(100vh-80px)] px-4">
        @yield('content')
    </main>
</body>
</html>
