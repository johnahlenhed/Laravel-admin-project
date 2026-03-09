<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty and Personal care</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-background">
    <header class="bg-secondary border-b-4 border-primary p-4 mb-8">
    <nav class="flex flex-row">
        <a class="text-4xl font-bold text-white" href="{{ route('products.index') }}">Products</a>
        <a class="text-4xl font-bold text-white" href="{{ route('categories.index') }}">Categories</a>
        <div class="logout">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-primary-button type="submit">Logout</x-primary-button>
        </form>
    </div>
    </nav>
    </header>
    <main class="bg-background max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @include('includes.error')
        @yield('content')
    </main>

</body>
</html>