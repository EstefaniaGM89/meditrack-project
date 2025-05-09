<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'MediTrack')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen">
    <header class="bg-indigo-600 text-white p-4">
        <h1 class="text-2xl font-bold">MediTrack</h1>
    </header>

    <div class="flex">
        <aside class="w-64 bg-white p-4 shadow-md hidden md:block">
            <nav class="space-y-2">
                <a href="{{ url('/') }}" class="block text-indigo-600 font-semibold hover:underline">🏠 Dashboard</a>
                <a href="{{ route('pacients.index') }}" class="block hover:text-indigo-600">👥 Usuaris</a>
                <a href="{{ route('medicaments.index') }}" class="block hover:text-indigo-600">💊 Medicaments</a>
                <a href="{{ route('recordatoris.index') }}" class="block hover:text-indigo-600">⏰ Recordatoris</a>
            </nav>
        </aside>

        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
