<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voucher Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#f1faee] text-[#f1faee] min-h-screen flex flex-col selection:bg-[#e63946] selection:text-black">
    <!-- Top Navigation Header -->
    <nav class="sticky top-0 z-50 backdrop-blur-md bg-white/90 border-b border-[#a8dadc]/15 px-6 py-4">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <a href="/" class="flex items-center gap-3 group">
                <div class="w-9 h-9 rounded-xl bg-[#e63946] flex items-center justify-center text-black font-black shadow-lg shadow-[#e63946]/30 group-hover:scale-105 transition-transform">
                    V
                </div>
                <span class="font-bold text-xl text-black">
                    Voucher<span class="text-black">Vault</span>
                </span>
            </a>

            @auth
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2.5 bg-a8dadc border border-[#a8dadc]/20 px-3.5 py-1.5 rounded-full">
                        <div class="w-2 h-2 rounded-full bg-black animate-pulse"></div>
                        <span class="text-xs font-semibold text-black">{{ Auth::user()->name }}</span>
                        @if(Auth::user()->is_admin)
                            <span class="text-[10px] uppercase font-extrabold bg-[#e63946]/20 text-[#e63946] border border-[#e63946]/30 px-2 py-0.5 rounded-full">Admin</span>
                        @endif
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="text-xs font-semibold bg-[#e63946]/10 hover:bg-[#e63946] text-[#e63946] hover:text-black border border-[#e63946]/30 px-3.5 py-2 rounded-xl transition-all">
                            Sign Out
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </nav>

    <!-- Main Content Area -->
    <main class="flex-1 max-w-6xl w-full mx-auto p-4 sm:p-6 lg:p-8">
        @yield('content')
    </main>
</body>
</html>