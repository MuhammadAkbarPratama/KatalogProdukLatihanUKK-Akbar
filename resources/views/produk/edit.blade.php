@extends('layouts.app')

@section('title', 'Rekonfigurasi: ' . $produk->nama_produk)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-10 flex items-center gap-6">
        <a href="{{ route('produk.index') }}" class="group p-4 bg-white/50 backdrop-blur-md border border-white rounded-2xl hover:bg-white hover:shadow-lg transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <h1 class="text-3xl font-extrabold text-indigo-950 tracking-tight">Rekonfigurasi <span class="text-cyan-600">Produk</span></h1>
            <p class="text-indigo-800/60 font-medium">Memperbarui koordinat data untuk item <span class="text-indigo-600">#{{ $produk->id }}</span></p>
        </div>
    </div>

    <div class="bg-white/40 backdrop-blur-2xl border border-white/80 p-8 md:p-12 rounded-[3rem] shadow-2xl shadow-indigo-100 relative">
        
        <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="space-y-4">
                    <label class="text-sm font-bold text-indigo-900 uppercase tracking-widest ml-1">Citra Saat Ini</label>
                    <div class="relative group rounded-[2rem] overflow-hidden border-4 border-white shadow-lg aspect-square bg-indigo-50">
                        <img id="preview-img" src="{{ asset('storage/'.$produk->foto) }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 bg-indigo-950/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="text-white font-bold text-xs uppercase tracking-tighter">Ganti Foto</span>
                        </div>
                        <input type="file" name="foto" id="foto-input" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                    </div>
                    <p class="text-[10px] text-center text-indigo-400 font-bold uppercase">*Klik gambar untuk mengunggah citra baru</p>
                </div>

                <div class="space-y-6">
                    <div class="space-y-2">
                        <label class="text-sm font-bold text-indigo-900 uppercase tracking-widest ml-1">Identitas Baru</label>
                        <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" required
                            class="w-full px-6 py-4 bg-white/50 border border-indigo-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:bg-white transition-all text-indigo-950 font-semibold">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-bold text-indigo-900 uppercase tracking-widest ml-1">Log Deskripsi</label>
                        <textarea name="deskripsi" rows="6" required
                            class="w-full px-6 py-4 bg-white/50 border border-indigo-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:bg-white transition-all text-indigo-950 font-medium">{{ $produk->deskripsi }}</textarea>
                    </div>
                </div>
            </div>

            <div class="pt-6">
                <button type="submit" 
                    class="w-full py-5 bg-gradient-to-r from-cyan-500 to-indigo-600 text-white rounded-[2rem] font-black text-lg shadow-xl shadow-cyan-200 hover:shadow-indigo-300 hover:scale-[1.02] active:scale-95 transition-all duration-300 flex items-center justify-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    UPDATE TRANSMISI DATA
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Live Preview saat pilih foto baru
    document.getElementById('foto-input').onchange = function (evt) {
        const [file] = this.files
        if (file) {
            document.getElementById('preview-img').src = URL.createObjectURL(file)
        }
    }
</script>
@endsection