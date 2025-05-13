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
            <nav class="space-y-4">
                <div class="p-4 bg-indigo-50 rounded shadow hover:shadow-md transition">
                    <a href="{{ url('/') }}" class="block text-indigo-700 font-semibold hover:underline">🏠
                        Dashboard</a>
                </div>
                <div class="p-4 bg-indigo-50 rounded shadow hover:shadow-md transition">
                    <a href="{{ route('pacients.index') }}" class="block text-indigo-700 hover:underline">👥
                        Pacients</a>
                </div>
                <div class="p-4 bg-indigo-50 rounded shadow hover:shadow-md transition">
                    <a href="{{ route('medicaments.index') }}" class="block text-indigo-700 hover:underline">💊
                        Medicaments</a>
                </div>
                <div class="p-4 bg-indigo-50 rounded shadow hover:shadow-md transition">
                    <a href="{{ route('recordatoris.index') }}" class="block text-indigo-700 hover:underline">⏰
                        Recordatoris</a>
                </div>
                <div class="p-4 bg-indigo-50 rounded shadow hover:shadow-md transition">
                    <a href="{{ route('personal-sanitari.index') }}" class="block text-indigo-700 hover:underline">👩‍⚕️
                        Personal Sanitari</a>
                </div>
            </nav>
        </aside>

        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    <!-- Mostrar notificació emergent si existeix una sessió exitosa -->
    @if (session('success'))
        <div id="notification" class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-3 rounded shadow-lg opacity-100 transition-opacity duration-1000">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('notification').style.opacity = 0;  // Desapareix després de 5 segons
                setTimeout(function() {
                    document.getElementById('notification').style.display = 'none'; // Elimina l'element del DOM
                }, 1000); // Espera 1 segon per eliminar l'element
            }, 5000); // 5000ms = 5 segons
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const notifications = document.querySelectorAll('.bg-blue-500');

            notifications.forEach(notification => {
                setTimeout(() => {
                    notification.classList.add('opacity-0');
                    notification.classList.add('transition-opacity');
                }, 5000); // Desapareix després de 5 segons
            });
        });
    </script>
</body>

</html>
