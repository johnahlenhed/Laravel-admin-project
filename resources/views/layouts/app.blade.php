<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty and Personal care</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header>
    <nav>
        <a href="{{ route('products.index') }}">Products</a>
        <a href="{{ route('categories.create') }}">Categories</a>
    </nav>
    </header>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @include('includes.error')
        @yield('content')
    </main>
</body>
</html>