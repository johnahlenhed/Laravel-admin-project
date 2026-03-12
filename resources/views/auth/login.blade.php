<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-background min-h-screen flex items-center justify-center">
    <div class="bg-card rounded-xl shadow-md p-8 w-full max-w-sm">
        <h1 class="text-2xl font-bold text-font-primary mb-6 text-center">Sign In</h1>

        @if ($errors->any())
            <div class="bg-danger/10 border border-danger rounded-lg p-3 mb-4">
                <ul class="list-disc list-inside text-danger text-sm space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="flex flex-col gap-4">
            @csrf
            <div class="flex flex-col gap-1">
                <label for="email" class="text-sm font-semibold text-font-primary">Email</label>
                <input type="email" id="email" name="email" placeholder="you@example.com" required
                    class="border-2 border-primary/40 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" />
            </div>
            <div class="flex flex-col gap-1">
                <label for="password" class="text-sm font-semibold text-font-primary">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required
                    class="border-2 border-primary/40 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" />
            </div>
            <button type="submit" class="bg-primary text-white font-bold py-2 px-4 rounded text-center cursor-pointer mt-2">
                Sign In
            </button>
        </form>
    </div>
</body>
</html>
