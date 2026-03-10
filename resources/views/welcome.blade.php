<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space Catalog | UKK 2026</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at top right, #1e1b4b, #0f172a, #020617);
            overflow: hidden;
        }
        /* Animasi Bintang Sederhana */
        .stars {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: url('https://www.transparenttextures.com/patterns/stardust.png');
            opacity: 0.3;
            z-index: 0;
        }
        /* Efek Glow pada Kartu */
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(79, 70, 229, 0.15);
        }
    </style>
</head>
<body class="text-white min-h-screen flex items-center justify-center relative">
    
    <div class="stars"></div>

    <div class="relative z-10 container mx-auto px-6 text-center">
        <div class="mb-8 flex justify-center">
            <div class="w-24 h-24 rounded-full bg-gradient-to-tr from-indigo-500 to-purple-400 shadow-[0_0_50px_rgba(99,102,241,0.5)] animate-pulse"></div>
        </div>

        <div class="glass-card max-w-2xl mx-auto p-12 rounded-[2rem]">
            <h1 class="text-5xl font-extrabold tracking-tight mb-4">
                Katalog <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-cyan-400">Produk</span>
            </h1>
            <p class="text-gray-400 text-lg mb-10 leading-relaxed">
                Platform pengelolaan foto produk masa depan. <br>
                Jelajahi, beri komentar, dan kelola inventaris dengan antarmuka galaksi.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/katalog') }}" 
                           class="px-8 py-3 bg-indigo-600 hover:bg-indigo-500 rounded-xl font-semibold shadow-lg shadow-indigo-500/30 transition-all duration-300 transform hover:-translate-y-1">
                            Masuk ke Katalog
                        </a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="px-8 py-3 bg-indigo-600 hover:bg-indigo-500 rounded-xl font-semibold shadow-lg shadow-indigo-500/30 transition-all duration-300 transform hover:-translate-y-1">
                            Login
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" 
                               class="px-8 py-3 bg-transparent border border-gray-600 hover:border-indigo-400 rounded-xl font-semibold transition-all duration-300 transform hover:-translate-y-1">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>

        <p class="mt-12 text-sm text-gray-500 uppercase tracking-widest font-medium">
            Project Latihan UKK &bull; 2026 &bull; Galaksi Laravel
        </p>
    </div>

</body>
</html>