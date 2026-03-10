@extends('layouts.app')

@section('title', 'Luncurkan Produk Baru')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-10 flex items-center gap-6">
        <a href="{{ route('produk.index') }}" class="group p-4 bg-white/50 backdrop-blur-md border border-white rounded-2xl hover:bg-white hover:shadow-lg transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-indigo-950 tracking-tight">Manufaktur <span class="text-indigo-600">Produk</span></h1>
            <p class="text-indigo-800/60 font-medium">Input spesifikasi item baru ke dalam pangkalan data galaksi.</p>
        </div>
    </div>

    <div class="bg-white/40 backdrop-blur-2xl border border-white/80 p-8 md:p-12 rounded-[3rem] shadow-2xl shadow-indigo-100 relative overflow-hidden">
        <div class="absolute top-0 right-0 p-8 opacity-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.628.283a2 2 0 01-1.186.127l-2.331-.466a2 2 0 00-1.022.547l-1.428 1.428a2 2 0 00-.547 1.022l-.466 2.331a2 2 0 00.127 1.186l.283.628a6 6 0 00.517 3.86l.477 2.387a2 2 0 00.547 1.022l1.428 1.428a2 2 0 001.022.547l2.331.466a2 2 0 001.186-.127l.628-.283a6 6 0 003.86-.517l2.387.477a2 2 0 001.022-.547l1.428-1.428a2 2 0 00.547-1.022l.466-2.331a2 2 0 00-.127-1.186l-.283-.628a6 6 0 00-.517-3.86l-.477-2.387a2 2 0 00-.547-1.022l-1.428-1.428z" />
            </svg>
        </div>

        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="relative z-10 space-y-8">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-2">
                    <label class="text-sm font-bold text-indigo-900 uppercase tracking-widest ml-1">Identitas Item</label>
                    <input type="text" name="nama_produk" required
                        class="w-full px-6 py-4 bg-white/50 border border-indigo-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:bg-white transition-all text-indigo-950 font-semibold"
                        placeholder="Nama Produk Galaksi">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-bold text-indigo-900 uppercase tracking-widest ml-1">Transmisi Visual (Foto)</label>
                    <div class="relative group">
                        <input type="file" name="foto" id="foto" required
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                        <div class="px-6 py-4 bg-indigo-50 border-2 border-dashed border-indigo-200 rounded-2xl text-center group-hover:bg-indigo-100 group-hover:border-indigo-400 transition-all">
                            <span class="text-indigo-600 font-bold text-sm" id="file-label">Pilih Berkas Citra</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-2">
                <label class="text-sm font-bold text-indigo-900 uppercase tracking-widest ml-1">Log Deskripsi Sistem</label>
                <textarea name="deskripsi" rows="5" required
                    class="w-full px-6 py-4 bg-white/50 border border-indigo-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:bg-white transition-all text-indigo-950 font-medium"
                    placeholder="Jelaskan detail dan fungsi produk ini..."></textarea>
            </div>

            <div class="pt-6">
                <button type="submit" 
                    class="w-full py-5 bg-gradient-to-r from-indigo-600 to-cyan-500 text-white rounded-[2rem] font-black text-lg shadow-xl shadow-indigo-200 hover:shadow-indigo-400 hover:scale-[1.02] active:scale-95 transition-all duration-300 flex items-center justify-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                    INISIALISASI PRODUK
                </button>
            </div>
        </form>
    </div>

    <div class="mt-8 text-center">
        <p class="text-indigo-900/40 text-xs font-bold uppercase tracking-widest flex items-center justify-center gap-2">
            <span class="h-1 w-1 bg-indigo-400 rounded-full"></span>
            Data akan dienkripsi secara otomatis ke dalam Database Utama
            <span class="h-1 w-1 bg-indigo-400 rounded-full"></span>
        </p>
    </div>
</div>

<script>
    // Script sederhana untuk ganti nama label file saat dipilih
    document.getElementById('foto').onchange = function() {
        document.getElementById('file-label').innerHTML = this.files[0].name;
    };
</script>
@endsection