@extends('layouts.app')

@section('title', 'Admin Command Center')

@section('content')
<div class="max-w-6xl mx-auto relative">
    <div class="mb-10">
        <div class="flex items-center gap-4 mb-2">
            <div class="h-2 w-12 bg-cyan-500 rounded-full animate-pulse"></div>
            <span class="text-xs font-bold text-cyan-600 uppercase tracking-[0.3em]">System Online</span>
        </div>
        <h1 class="text-4xl font-extrabold text-indigo-950 tracking-tight">
            Dashboard <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-cyan-500">Otoritas</span>
        </h1>
        <p class="text-indigo-800/60 mt-1">Selamat datang, Komandan <span class="text-indigo-600 font-bold">{{ Auth::user()->name }}</span>.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
        <div class="bg-white/40 backdrop-blur-xl border border-white/60 p-6 rounded-[2rem] shadow-xl shadow-indigo-100/50 flex justify-between items-center">
            <div>
                <p class="text-xs font-bold text-indigo-400 uppercase tracking-widest mb-1">Total Armada</p>
                <span class="text-4xl font-black text-indigo-950">{{ $totalProduk }}</span>
            </div>
            <div class="p-4 bg-indigo-50 rounded-2xl text-indigo-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
            </div>
        </div>

        <div class="bg-indigo-600 p-6 rounded-[2rem] shadow-xl shadow-indigo-200 flex justify-between items-center">
            <div>
                <p class="text-xs font-bold text-indigo-100 uppercase tracking-widest mb-1">Status Keamanan</p>
                <span class="text-2xl font-bold text-white italic">Encrypted Access</span>
            </div>
            <div class="h-12 w-12 bg-white/20 rounded-full flex items-center justify-center">
                <div class="h-3 w-3 bg-emerald-400 rounded-full animate-ping"></div>
            </div>
        </div>
    </div>

    <div class="bg-white/60 backdrop-blur-2xl border border-white p-8 rounded-[3rem] shadow-2xl shadow-indigo-100">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
            <div>
                <h3 class="text-xl font-bold text-indigo-950 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    Pangkalan Data Produk
                </h3>
                <p class="text-xs text-indigo-400 font-medium italic">Kelola semua item tanpa harus ke halaman katalog user.</p>
            </div>
            <a href="{{ route('produk.create') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-2xl font-bold text-sm hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-100">
                + Tambah Item Baru
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-separate border-spacing-y-3">
                <thead>
                    <tr class="text-indigo-400 text-[10px] font-black uppercase tracking-[0.2em]">
                        <th class="px-6 pb-2">Visual</th>
                        <th class="px-6 pb-2">Identitas Item</th>
                        <th class="px-6 pb-2 text-center">Kendali Otoritas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\Produk::latest()->get() as $item)
                    <tr class="bg-white/50 hover:bg-white transition-all duration-300 group shadow-sm">
                        <td class="px-6 py-4 rounded-l-[1.5rem] border-y border-l border-indigo-50">
                            <img src="{{ asset('storage/'.$item->foto) }}" class="w-14 h-10 rounded-lg object-cover shadow-sm transition-transform group-hover:scale-110">
                        </td>
                        
                        <td class="px-6 py-4 border-y border-indigo-50">
                            <p class="font-bold text-indigo-950 leading-none mb-1">{{ $item->nama_produk }}</p>
                            <span class="text-[9px] px-2 py-0.5 bg-indigo-50 text-indigo-400 rounded-md font-bold uppercase tracking-tighter">Code: #{{ $item->id }}</span>
                        </td>

                        <td class="px-6 py-4 rounded-r-[1.5rem] border-y border-r border-indigo-50">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('produk.show', $item->id) }}" class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition-all" title="Lihat Detail">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>

                                <a href="{{ route('produk.edit', $item->id) }}" class="p-2.5 bg-cyan-50 text-cyan-600 rounded-xl hover:bg-cyan-500 hover:text-white transition-all" title="Edit Data">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                <form action="{{ route('produk.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus item ini selamanya?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="p-2.5 bg-red-50 text-red-500 rounded-xl hover:bg-red-500 hover:text-white transition-all" title="Hapus">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection