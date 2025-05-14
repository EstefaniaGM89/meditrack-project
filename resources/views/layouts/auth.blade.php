<!DOCTYPE html>
<html lang="es" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'MediTrack')</title>
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

<body class="min-h-screen bg-gray-100 dark:bg-gray-900 font-sans text-gray-800 dark:text-gray-200">

    <!-- Header minimal con botón Tema -->
    <header class="w-full flex justify-end p-4">
        <button id="toggleDarkMode"
            class="bg-white text-indigo-700 px-3 py-1 rounded hover:bg-gray-100 dark:bg-gray-800 dark:text-white dark:hover:bg-gray-700 transition">
            🌓 Tema
        </button>
    </header>

    <!-- Contenido principal centrado -->
    <main class="flex items-center justify-center min-h-[calc(100vh-80px)] px-4">
        @yield('content')
    </main>

</body>
</html>
