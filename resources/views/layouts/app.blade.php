<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk | @yield('title', 'Explorer')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            /* Background Luar Angkasa Muda & Cerah */
            background: radial-gradient(circle at top right, #eef2ff, #e0e7ff, #dbeafe);
            background-attachment: fixed;
            min-height: 100vh;
            color: #1e293b;
        }

        /* Navigasi Kaca Futuristik */
        .glass-nav {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.5);
        }

        /* Efek Floating untuk Konten Utama */
        .main-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 2.5rem;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
        }

        /* Animasi Partikel Kecil (Bintang Muda) */
        .light-stars {
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            background-image: radial-gradient(#6366f1 0.5px, transparent 0.5px);
            background-size: 40px 40px;
            opacity: 0.1;
            z-index: -1;
        }

        /* Custom Scrollbar agar lebih estetik */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #c7d2fe; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #818cf8; }
    </style>
</head>
<body class="antialiased">
    
    <div class="light-stars"></div>

    <nav class="glass-nav sticky top-0 z-50 px-6 md:px-12 py-4 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-indigo-500 to-cyan-400 rotate-12 flex items-center justify-center shadow-lg shadow-indigo-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white -rotate-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                </svg>
            </div>
            <span class="text-xl font-extrabold tracking-tight text-indigo-900">Produk<span class="text-cyan-600">Katalog</span></span>
        </div>

        @auth
        <div class="flex items-center gap-4">
            <div class="hidden md:flex flex-col items-end mr-2">
                <span class="text-xs font-bold text-indigo-400 uppercase tracking-widest">Active Explorer</span>
                <span class="text-sm font-semibold text-indigo-900">{{ Auth::user()->name }}</span>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="px-5 py-2 rounded-xl bg-white border border-indigo-100 text-red-500 font-bold text-xs uppercase tracking-widest hover:bg-red-50 hover:text-red-600 transition-all shadow-sm">
                    Logout
                </button>
            </form>
        </div>
        @else
        <div class="flex gap-4">
            <a href="{{ route('login') }}" class="text-sm font-bold text-indigo-600 px-4 py-2 hover:text-indigo-800 transition">Masuk</a>
            <a href="{{ route('register') }}" class="text-sm font-bold bg-indigo-600 text-white px-5 py-2 rounded-xl shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">Daftar</a>
        </div>
        @endauth
    </nav>

    <main class="container mx-auto px-6 py-10">
        @if(session('success'))
            <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-600 rounded-2xl flex items-center gap-3 animate-bounce">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                <span class="font-bold text-sm">{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="py-12 text-center text-indigo-900/40 text-xs font-medium uppercase tracking-[0.2em]">
        &copy; 2026 Space Catalog • Mission Control Jakarta
    </footer>

</body>
</html>