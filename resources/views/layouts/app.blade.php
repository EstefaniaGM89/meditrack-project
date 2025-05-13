<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'MediTrack')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-100 min-h-screen font-sans transition-colors duration-300">
    <!-- Header -->
    <header class="bg-indigo-600 text-white p-4 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <!-- Capsula bategant -->
            <svg class="w-7 h-7 animate-heartbeat transition duration-300" viewBox="0 0 64 64"
                xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <clipPath id="capsule-clip">
                        <rect x="8" y="8" width="48" height="48" rx="24" transform="rotate(45 32 32)" />
                    </clipPath>
                </defs>
                <g clip-path="url(#capsule-clip)">
                    <!-- Meitat blava -->
                    <rect x="0" y="0" width="64" height="64" fill="#3b82f6" />
                    <!-- Meitat vermella -->
                    <rect x="32" y="0" width="32" height="64" fill="#ef4444" />
                </g>
            </svg>
            <h1 class="text-2xl font-bold">MediTrack</h1>
        </div>

        <!-- Botó mode fosc -->
        <button id="toggleDarkMode"
            class="bg-white text-indigo-700 px-3 py-1 rounded hover:bg-gray-100 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 transition">
            🌓 Tema
        </button>
    </header>

    <!-- Layout -->
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-transparent p-4 hidden md:block min-h-screen">
            <nav class="space-y-4">
                <a href="{{ url('/') }}"
                    class="block p-4 rounded-xl bg-white shadow-md hover:shadow-lg transition transform hover:scale-[1.01] text-indigo-700 font-medium hover:bg-indigo-50 dark:bg-gray-800 dark:text-indigo-200 dark:hover:bg-indigo-700">
                    🏠 Dashboard
                </a>
                <a href="{{ route('pacients.index') }}"
                    class="block p-4 rounded-xl bg-white shadow-md hover:shadow-lg transition transform hover:scale-[1.01] text-indigo-700 font-medium hover:bg-indigo-50 dark:bg-gray-800 dark:text-indigo-200 dark:hover:bg-indigo-700">
                    👥 Pacients
                </a>
                <a href="{{ route('medicaments.index') }}"
                    class="block p-4 rounded-xl bg-white shadow-md hover:shadow-lg transition transform hover:scale-[1.01] text-rose-700 font-medium hover:bg-rose-50 dark:bg-gray-800 dark:text-rose-300 dark:hover:bg-rose-800">
                    💊 Medicaments
                </a>
                <a href="{{ route('recordatoris.index') }}"
                    class="block p-4 rounded-xl bg-white shadow-md hover:shadow-lg transition transform hover:scale-[1.01] text-yellow-700 font-medium hover:bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-yellow-800">
                    ⏰ Recordatoris
                </a>
                <a href="{{ route('personal-sanitari.index') }}"
                    class="block p-4 rounded-xl bg-white shadow-md hover:shadow-lg transition transform hover:scale-[1.01] text-purple-700 font-medium hover:bg-purple-50 dark:bg-gray-800 dark:text-purple-300 dark:hover:bg-purple-800">
                    👩‍⚕️ Personal Sanitari
                </a>
            </nav>
        </aside>

        <!-- Main content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <!-- Notificació d'èxit -->
    @if (session('success'))
        <div id="notification"
            class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-3 rounded shadow-lg opacity-100 transition-opacity duration-1000">
            {{ session('success') }}
        </div>
    @endif
</body>

</html>