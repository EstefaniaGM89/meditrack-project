<!-- Vista de plantilla del layout d'autenticació -->
<!DOCTYPE html>
<html lang="es" class="scroll-smooth dark"> {{-- Mode dark sempre activat --}}

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('favicon-capsula.ico') }}?v=2" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'MediTrack')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body data-auth="true" class="min-h-screen bg-gray-900 text-gray-200 font-sans">
    <main class="flex items-center justify-center min-h-[calc(100vh-80px)] px-4">
        @yield('content')
    </main>
</body>

</html>