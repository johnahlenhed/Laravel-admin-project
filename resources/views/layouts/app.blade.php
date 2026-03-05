<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beuty and Personal care</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header>

    </header>
    <main>
        @include('includes.error')
        @yield('content')
    </main>
</body>
</html>