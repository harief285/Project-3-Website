<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    public function index()
    {
        $articles = Artikel::all();
        $users = User::all();
        return view('artikel.index', compact('articles', 'users'));
    }

    public function create()
    {
        $users = User::all();
        return view('artikel.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validatedData['id_user'] = auth()->user()->id;
        $validatedData = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['gambar'] = $imageName;
        }

        $validatedData['id_user'] = auth()->user()->id;

        Artikel::create($validatedData);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    public function show($id)
    {
        $article = Artikel::find($id);
        $users = User::all();
        return view('artikel.show', compact('article', 'users'));
    }

    public function edit($id)
    {
        $article = Artikel::find($id);
        $users = User::all();
        return view('artikel.update', compact('article', 'users'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diinput
        $validatedData = $request->validate([
            'judul' => 'required',
            'isi' => 'required',
        ]);

        // Ambil artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);

        // Cek apakah ada file gambar baru yang diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($artikel->gambar && file_exists(public_path('images/' . $artikel->gambar))) {
                unlink(public_path('images/' . $artikel->gambar));
            }

            // Proses upload gambar baru
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $validatedData['gambar'] = $imageName;
        }

        // Update artikel dengan data yang divalidasi
        $artikel->update($validatedData);

        // Redirect ke halaman artikel dengan pesan sukses
        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diupdate');
    }

    public function destroy($id)
    {
        $article = Artikel::find($id);
        $article->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus');
    }
}
