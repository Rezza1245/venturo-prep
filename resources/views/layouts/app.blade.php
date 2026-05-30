<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Todo App Zaraaa</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-100">
    <nav class="bg-white shadow">
        <div class="max-w-4x1 mx-auto px-6 py-4">
            <a href="/tasks" class="text-xl font-bold text-gray-800">
                Todo App Zaraaa
            </a>
        </div>
    </nav>
    <main class="max-w-4x1 mx-auto px-6 py-6">
        @yield('content')
    </main>
</body>

</html>