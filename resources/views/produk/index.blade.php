@extends('layouts.app')

@section('title', 'Katalog Galaksi')

@section('content')
<div class="max-w-7xl mx-auto px-4">
    <div class="mb-12 text-center">
        <h1 class="text-4xl font-black text-indigo-950 tracking-tight mb-2">Eksplorasi <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-cyan-500">Armada</span></h1>
        <p class="text-indigo-800/60 font-medium">Pilih komponen dan berikan transmisi umpan balik secara langsung.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($produks as $produk)
        <div class="bg-white/60 backdrop-blur-2xl border border-white rounded-[2.5rem] shadow-xl overflow-hidden flex flex-col group transition-all duration-500 hover:shadow-indigo-200">
            
            <div class="relative h-64 overflow-hidden">
                <img src="{{ asset('storage/'.$produk->foto) }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-indigo-950/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
            </div>

            <div class="p-6 flex-grow">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-xl font-bold text-indigo-950">{{ $produk->nama_produk }}</h3>
                    <a href="{{ route('produk.show', $produk->id) }}" class="p-2 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition-all">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </a>
                </div>
                <p class="text-sm text-indigo-800/60 line-clamp-2 mb-6 font-medium">{{ $produk->deskripsi }}</p>

                <div class="space-y-4 pt-4 border-t border-indigo-50">
                    <p class="text-[10px] font-black text-indigo-400 uppercase tracking-[0.2em] mb-2">Transmisi Terbaru</p>
                    
                    <div class="space-y-2 max-h-32 overflow-y-auto pr-2 custom-scrollbar">
                        @forelse($produk->komentars->take(3) as $komentar)
                        <div class="text-xs p-3 bg-indigo-50/50 rounded-xl border border-white">
                            <span class="font-bold {{ $komentar->user->role === 'admin' ? 'text-cyan-600' : 'text-indigo-900' }}">
                                {{ $komentar->user->role === 'admin' ? 'ADMIN' : $komentar->user->name }}
                            </span>
                            <span class="text-indigo-800/70 ml-1">{{ $komentar->isi_komentar }}</span>
                        </div>
                        @empty
                        <p class="text-[10px] text-indigo-300 italic">Belum ada transmisi pesan.</p>
                        @endforelse
                    </div>

                    <form action="{{ route('komentar.store') }}" method="POST" class="relative mt-4">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                        <div class="flex gap-2">
                            <input type="text" name="isi_komentar" required
                                class="flex-grow px-4 py-3 bg-white border border-indigo-100 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-400 transition-all text-xs font-medium"
                                placeholder="Ketik komentar cepat...">
                            <button type="submit" class="p-3 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-100">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 3px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #e0e7ff; border-radius: 10px; }
</style>
@endsection