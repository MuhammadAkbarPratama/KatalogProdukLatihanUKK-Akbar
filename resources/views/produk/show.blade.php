@extends('layouts.app')

@section('title', 'Detail Produk')

@section('content')
<div class="max-w-5xl mx-auto">
    <a href="{{ route('produk.index') }}" class="inline-flex items-center gap-2 text-indigo-600 font-bold mb-8 group transition-all">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Kembali ke Katalog
    </a>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-12">
        <div class="bg-white/50 backdrop-blur-md p-4 rounded-[3rem] border border-white shadow-2xl">
            <div class="rounded-[2.5rem] overflow-hidden bg-indigo-50 aspect-square">
                <img src="{{ asset('storage/'.$produk->foto) }}" alt="{{ $produk->nama_produk }}" class="w-full h-full object-cover">
            </div>
        </div>

        <div class="space-y-6">
            <h1 class="text-4xl font-extrabold text-indigo-950 leading-tight">{{ $produk->nama_produk }}</h1>
            <div class="bg-white/40 backdrop-blur-xl border border-white/60 p-6 rounded-[2rem]">
                <h3 class="text-xs font-bold text-indigo-400 uppercase tracking-widest mb-2 italic">// Deskripsi Sistem</h3>
                <p class="text-indigo-900/80 leading-relaxed font-medium">{{ $produk->deskripsi }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white/60 backdrop-blur-2xl border border-white p-8 rounded-[3rem] shadow-xl">
        <h3 class="text-xl font-bold text-indigo-950 mb-8 flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
            </svg>
            Transmisi Komentar
        </h3>

        <form action="{{ route('komentar.store') }}" method="POST" class="mb-10">
            @csrf
            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
            <div class="relative">
                <textarea name="isi_komentar" rows="3" required
                    class="w-full px-6 py-4 bg-white border border-indigo-100 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-400 transition-all text-indigo-950 font-medium"
                    placeholder="Tulis pendapat kamu tentang produk ini..."></textarea>
                <button type="submit" class="mt-3 w-full md:w-auto px-8 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-100">
                    Kirim Pesan
                </button>
            </div>
        </form>

        <div class="space-y-4">
            @forelse($produk->komentars as $komentar)
            <div class="p-5 bg-indigo-50/50 rounded-2xl border border-white transition-all hover:bg-white hover:shadow-md">
                <div class="flex justify-between items-center mb-2">
                    <span class="font-bold text-indigo-900 text-sm italic">@ {{ $komentar->user->name }}</span>
                    <span class="text-[10px] font-bold text-indigo-300 uppercase tracking-widest">{{ $komentar->created_at->diffForHumans() }}</span>
                </div>
                <p class="text-indigo-800/80 text-sm leading-relaxed">{{ $komentar->isi_komentar }}</p>
            </div>
            @empty
            <div class="text-center py-6">
                <p class="text-indigo-300 italic text-sm">Belum ada transmisi komentar di sektor ini.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection