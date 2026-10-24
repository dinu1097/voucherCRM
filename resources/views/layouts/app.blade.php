<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <nav class="bg-white shadow p-4 flex justify-between items-center">
        <a href="/" class="font-bold text-lg text-indigo-600">Voucher Portal</a>
        @auth
            <div class="flex items-center gap-4">
                <span class="text-gray-700">Hello, {{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm bg-red-500 text-white px-3 py-1 rounded">Logout</button>
                </form>
            </div>
        @endauth
    </nav>
    <main class="p-6 max-w-4xl mx-auto">
        @yield('content')
    </main>
</body>
</html>