<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Explorer | Space Catalog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at bottom left, #1e1b4b, #0f172a, #020617);
            overflow: hidden;
        }

        /* --- Animasi Background --- */
        .stars {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: url('https://www.transparenttextures.com/patterns/stardust.png');
            opacity: 0.3; z-index: 0;
        }

        /* Lingkaran Orbit */
        .orbit-bg {
            position: absolute;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            border: 1px solid rgba(99, 102, 241, 0.1);
            z-index: 1;
        }

        /* Planet Kecil yang Mengorbit */
        .planet-orbiter {
            position: absolute;
            top: 0; left: 50%;
            width: 20px; height: 20px;
            background: gradient-to-tr from-indigo-500 to-purple-400;
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.8);
            animation: orbit 20s linear infinite;
            z-index: 2;
        }

        @keyframes orbit {
            from { transform: rotate(0deg) translateX(250px) rotate(0deg); }
            to   { transform: rotate(360deg) translateX(250px) rotate(-360deg); }
        }

        /* --- Styling Kartu Futuristik --- */
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            /* Efek Neon Glow tipis di sekeliling kartu */
            box-shadow: 0 0 50px rgba(79, 70, 229, 0.1);
        }

        /* Styling Input agar lebih "menyatu" */
        .input-futuristic {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }
        .input-futuristic:focus {
            background: rgba(79, 70, 229, 0.05);
            border-color: rgba(99, 102, 241, 0.5);
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.2);
        }
    </style>
</head>
<body class="text-white min-h-screen flex items-center justify-center relative">
    
    <div class="stars"></div>
    <div class="orbit-bg w-[500px] h-[500px]"></div> <div class="orbit-bg w-[700px] h-[700px] opacity-50"></div> <div class="planet-orbiter"></div> <div class="relative z-10 w-full max-w-xl px-6">
        
        <div class="text-center mb-10">
            <h2 class="text-4xl font-extrabold tracking-tight">
                Mulai <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-cyan-400">Penjelajahan</span>
            </h2>
            <p class="text-gray-400 mt-3 text-lg">Masuk dengan akun Explorer Anda untuk mengakses katalog produk.</p>
        </div>

        <div class="glass-card p-12 rounded-[3rem] shadow-2xl relative overflow-hidden">
            
            <div class="absolute -top-10 -left-10 w-32 h-32 bg-indigo-700/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-purple-700/20 rounded-full blur-3xl"></div>

            <form action="{{ route('login') }}" method="POST" class="relative z-10">
                @csrf
                
                <div class="mb-8">
                    <label class="block text-sm font-semibold mb-3 text-gray-300 tracking-wide uppercase">Email Explorer</label>
                    <input type="email" name="email" required autocomplete="email"
                        class="w-full px-6 py-4 rounded-2xl input-futuristic text-white focus:outline-none transition-all text-lg"
                        placeholder="username@galaxy.com">
                    @error('email')
                        <span class="text-red-400 text-sm mt-2 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-10">
                    <label class="block text-sm font-semibold mb-3 text-gray-300 tracking-wide uppercase">Kode Akses (Password)</label>
                    <input type="password" name="password" required autocomplete="current-password"
                        class="w-full px-6 py-4 rounded-2xl input-futuristic text-white focus:outline-none transition-all text-lg"
                        placeholder="••••••••">
                </div>

                <button type="submit" 
                    class="w-full py-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 rounded-2xl font-bold text-lg shadow-lg shadow-indigo-500/20 transition-all duration-300 transform hover:scale-[1.02] hover:shadow-indigo-500/40">
                    Go Login
                </button>
            </form>

            <div class="mt-10 pt-8 border-t border-gray-800 text-center text-base text-gray-400 reltive z-10">
                Belum terdaftar di pangkalan data? 
                <a href="{{ route('register') }}" class="text-indigo-400 font-semibold hover:text-cyan-400 transition-colors">Daftar Akun Explorer</a>
            </div>
        </div>

        <div class="text-center mt-10">
            <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-400 text-sm transition-all tracking-widest uppercase font-medium">
                &larr; Kembali ke Sektor Utama
            </a>
        </div>
    </div>

</body>
</html>