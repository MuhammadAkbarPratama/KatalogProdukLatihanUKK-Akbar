<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Explorer | Space Catalog</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: radial-gradient(circle at top right, #1e1b4b, #0f172a, #020617);
            overflow: hidden; /* Mencegah scroll */
            height: 100vh;
        }

        /* --- Animasi Background Galaksi --- */
        .stars {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: url('https://www.transparenttextures.com/patterns/stardust.png');
            opacity: 0.4; z-index: 0;
        }

        .nebula {
            position: absolute;
            width: 600px; height: 600px;
            background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, rgba(0,0,0,0) 70%);
            filter: blur(100px);
            z-index: 1;
        }

        .planet {
            position: absolute;
            border-radius: 50%;
            z-index: 2;
            filter: drop-shadow(0 0 20px rgba(99, 102, 241, 0.3));
        }

        .planet-1 { width: 120px; height: 120px; background: linear-gradient(135deg, #4338ca, #06b6d4); top: 5%; right: 5%; animation: float 10s ease-in-out infinite; }
        .planet-2 { width: 60px; height: 60px; background: linear-gradient(135deg, #db2777, #7c3aed); bottom: 10%; left: 5%; animation: float 7s ease-in-out infinite reverse; }
        .planet-3 { width: 30px; height: 30px; background: #fbbf24; top: 20%; left: 15%; opacity: 0.6; animation: float 5s ease-in-out infinite; }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-20px) scale(1.05); }
        }

        /* --- Styling Kartu Lebar & Futuristik --- */
        .glass-card {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 0 60px rgba(79, 70, 229, 0.15);
        }

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
<body class="text-white flex items-center justify-center relative">
    
    <div class="stars"></div>
    <div class="nebula top-0 left-0"></div>
    <div class="nebula bottom-0 right-0"></div>
    <div class="planet planet-1"></div>
    <div class="planet planet-2"></div>
    <div class="planet planet-3"></div>

    <div class="relative z-10 w-full max-w-2xl px-6"> <div class="text-center mb-6">
            <h2 class="text-4xl font-extrabold tracking-tight">
                Daftar <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-400 to-cyan-400">Baru</span>
            </h2>
            <p class="text-gray-400 mt-2 text-base">Buat akun untuk memulai misi di galaksi produk.</p>
        </div>

        <div class="glass-card p-10 rounded-[3rem] shadow-2xl relative overflow-hidden">
            
            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6"> <div>
                        <label class="block text-sm font-semibold mb-2 text-gray-300 uppercase tracking-wider">Nama Lengkap</label>
                        <input type="text" name="name" required
                            class="w-full px-5 py-3 rounded-2xl input-futuristic text-white focus:outline-none"
                            placeholder="Astro Boy">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2 text-gray-300 uppercase tracking-wider">Email Explorer</label>
                        <input type="email" name="email" required
                            class="w-full px-5 py-3 rounded-2xl input-futuristic text-white focus:outline-none"
                            placeholder="astro@galaxy.com">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2 text-gray-300 uppercase tracking-wider">Password</label>
                        <input type="password" name="password" required
                            class="w-full px-5 py-3 rounded-2xl input-futuristic text-white focus:outline-none"
                            placeholder="••••••••">
                    </div>

                    <div>
                        <label class="block text-sm font-semibold mb-2 text-gray-300 uppercase tracking-wider">Konfirmasi</label>
                        <input type="password" name="password_confirmation" required
                            class="w-full px-5 py-3 rounded-2xl input-futuristic text-white focus:outline-none"
                            placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" 
                    class="w-full py-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-500 hover:to-purple-500 rounded-2xl font-bold text-lg shadow-lg shadow-indigo-500/20 transition-all duration-300 transform hover:scale-[1.01]">
                    Meluncur ke Akun Baru
                </button>
            </form>

            <div class="mt-8 pt-6 border-t border-gray-800 text-center text-gray-400">
                Sudah punya akses? 
                <a href="{{ route('login') }}" class="text-indigo-400 font-semibold hover:text-cyan-400 transition-colors">Masuk di Sini</a>
            </div>
        </div>

        <div class="text-center mt-6">
            <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-400 text-xs tracking-widest uppercase font-medium">
                &larr; Kembali ke Sektor Utama
            </a>
        </div>
    </div>

</body>
</html>