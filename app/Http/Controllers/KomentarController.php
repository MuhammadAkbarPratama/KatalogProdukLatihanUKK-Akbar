<?php

namespace App\Http\Controllers;

use App\Models\Komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    /**
     * Menyimpan komentar baru ke database.
     * Fitur ini dapat dilakukan oleh User maupun Admin.
     */
    public function store(Request $request)
    {
        // Validasi input komentar sesuai kebutuhan aplikasi
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'isi_komentar' => 'required|string|max:500',
        ]);

        // Membuat data komentar baru
        Komentar::create([
            'user_id' => Auth::id(), // Mengambil ID user yang sedang login
            'produk_id' => $request->produk_id,
            'isi_komentar' => $request->isi_komentar,
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }
}