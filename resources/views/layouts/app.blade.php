
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palaran - Notes PWA</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="manifest" href="/manifest.json">
    <meta name="theme-color" content="#1e3a8a">
</head>
<body class="bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 min-h-screen text-white">
    @yield('content')
</body>
</html>
