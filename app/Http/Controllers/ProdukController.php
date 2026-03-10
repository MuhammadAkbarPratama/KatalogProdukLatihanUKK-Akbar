<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Menampilkan semua data foto produk (Katalog).
     * Bisa diakses oleh User dan Admin.
     */
    public function index()
    {
        $produks = Produk::with(['komentars.user'])->get();
        return view('produk.index', compact('produks'));
    }   

    /**
     * Menampilkan form tambah produk.
     * Khusus untuk Admin.
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Menyimpan foto produk baru ke database.
     * Khusus untuk Admin.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload Foto
        $fotoPath = $request->file('foto')->store('produk', 'public');

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail produk dan komentar.
     * Sesuai fitur "Menambahkan Komentar".
     */
    public function show(string $id)
    {
        $produk = Produk::with('komentars.user')->findOrFail($id);
        return view('produk.show', compact('produk'));
    }

    /**
     * Menampilkan form edit produk.
     * Khusus untuk Admin.
     */
    public function edit(string $id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit', compact('produk'));
    }

    /**
     * Memperbarui data foto produk.
     * Khusus untuk Admin.
     */
    public function update(Request $request, string $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama_produk' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada foto baru
            Storage::disk('public')->delete($produk->foto);
            $fotoPath = $request->file('foto')->store('produk', 'public');
            $produk->foto = $fotoPath;
        }

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus foto produk.
     * Khusus untuk Admin.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);
        
        // Hapus file dari storage
        Storage::disk('public')->delete($produk->foto);
        
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Produk berhasil dihapus.');
    }
}