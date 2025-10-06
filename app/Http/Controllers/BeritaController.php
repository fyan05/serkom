<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    //
    public function index()
    {
        $beritas = Berita::latest()->paginate(5);
        return view('admin.berita', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'isi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tanggal' => 'required|date',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $foto,
            'tanggal' => $request->tanggal,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita-update', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'isi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tanggal' => 'required|date',
        ]);

        $foto = $berita->foto;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('berita', 'public');
        }

        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $foto,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();
        return redirect()->route('admin.berita')->with('success', 'Berita berhasil dihapus');
    }
}
