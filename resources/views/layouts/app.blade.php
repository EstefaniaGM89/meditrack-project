<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon-capsula.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'MediTrack')</title>
    {{-- Script CRÍTIC per evitar parpadeo al carregar --}}
    <script>
        if (
            localStorage.theme === 'dark' ||
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        }
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="flex flex-col min-h-screen bg-gray-100 text-gray-700 dark:bg-gray-900 dark:text-gray-300 font-sans transition-colors duration-300">

    <!-- Header -->
    <header class="bg-indigo-600 text-white p-4 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <!-- Càpsula bategant -->
            <svg class="w-7 h-7 animate-heartbeat transition duration-300" viewBox="0 0 64 64"
                xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <clipPath id="capsule-clip">
                        <rect x="8" y="8" width="48" height="48" rx="24" transform="rotate(45 32 32)" />
                    </clipPath>
                </defs>
                <g clip-path="url(#capsule-clip)">
                    <rect x="0" y="0" width="64" height="64" fill="#3b82f6" />
                    <rect x="32" y="0" width="32" height="64" fill="#ef4444" />
                </g>
            </svg>
            <h1 class="text-2xl font-bold">MediTrack</h1>
        </div>

        <div class="flex items-center gap-4">
            <input type="checkbox" class="checkbox hidden" id="checkbox">
            <label for="checkbox"
                class="checkbox-label cursor-pointer bg-gray-800 dark:bg-gray-200 w-12 h-6 rounded-full flex items-center justify-between px-1 relative">
                <i class="fas fa-moon text-yellow-400"></i>
                <i class="fas fa-sun text-yellow-300"></i>
                <span class="ball bg-white w-5 h-5 absolute top-0.5 left-0.5 rounded-full transition-transform"></span>
            </label>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-green-700 text-white px-3 py-1 rounded ml-4">
                🔓 Tancar Sessió
            </button>
        </form>

    </header>

    <!-- Contenidor principal: Sidebar + Contingut -->
    <div class="flex flex-1">
        <!-- Sidebar -->
        <aside class="w-64 bg-transparent p-4 hidden md:block">
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

        <!-- Contingut principal -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <!-- Toast d'èxit -->
    @if(session('success'))
        <div id="toastSuccess"
            class="fixed bottom-6 right-6 z-50 flex items-center max-w-sm w-full p-4 text-sm text-gray-800 bg-green-100 rounded-lg shadow-lg dark:text-green-100 dark:bg-green-800 transition-opacity duration-500">
            <svg class="w-6 h-6 mr-2 text-green-600 dark:text-green-300" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.707a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414L9 13.414l4.707-4.707z"
                    clip-rule="evenodd" />
            </svg>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Footer fixat a sota sempre -->
    <footer class="bg-gray-800 text-white p-4 text-center">
        <p>&copy; 2025 MediTrack. Tots els drets reservats.</p>
    </footer>

</body>

</html>