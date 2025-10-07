<?php

namespace App\Http\Controllers;

use App\Models\Berita; // Model untuk tabel berita
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    // ===============================
    // ADMIN FUNCTION
    // ===============================

    // Tampilkan daftar berita di halaman admin
    public function index()
    {
        $beritas = Berita::latest()->paginate(5); // Ambil berita terbaru, 5 per halaman
        return view('admin.berita', compact('beritas')); // Kirim data ke view
    }

    // Tampilkan form tambah berita
    public function create()
    {
        return view('admin.berita-create');
    }

    // Proses simpan berita baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|max:100',
            'isi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // opsional
            'tanggal' => 'required|date',
        ]);

        $foto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('berita', 'public'); // simpan file ke storage
        }

        // Buat berita baru
        Berita::create([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $foto,
            'tanggal' => $request->tanggal,
            'user_id' => Auth::id(), // ambil ID user yg login
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil ditambahkan');
    }

    // Tampilkan form edit berita
    public function edit(Berita $berita)
    {
        return view('admin.berita-update', compact('berita'));
    }

    // Proses update berita
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|max:100',
            'isi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'tanggal' => 'required|date',
        ]);

        $foto = $berita->foto; // tetap gunakan foto lama jika tidak ada upload baru
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('berita', 'public'); // simpan foto baru
        }

        $berita->update([
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $foto,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.berita')->with('success', 'Berita berhasil diperbarui');
    }

    // Hapus berita
    public function destroy(Berita $berita)
    {
        $berita->delete();
        return redirect()->route('admin.berita')->with('success', 'Berita berhasil dihapus');
    }

    // ===============================
    // OPERATOR FUNCTION
    // ===============================

    // Tampilkan daftar berita untuk operator
    public function halaman()
    {
        $beritas = Berita::latest()->paginate(5);
        return view('operator.berita', compact('beritas'));
    }

    // Form tambah berita operator
    public function tambah()
    {
        return view('operator.berita-create');
    }

    // Proses simpan berita operator
    public function pos(Request $request)
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

        return redirect()->route('operator.berita')->with('success', 'Berita berhasil ditambahkan');
    }

    // Form edit berita operator
    public function ubah(Berita $berita)
    {
        return view('operator.berita-update', compact('berita'));
    }

    // Proses update berita operator
    public function kirim(Request $request, Berita $berita)
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

        return redirect()->route('operator.berita')->with('success', 'Berita berhasil diperbarui');
    }

    // Hapus berita operator
    public function hapus(Berita $berita)
    {
        $berita->delete();
        return redirect()->route('operator.berita')->with('success', 'Berita berhasil dihapus');
    }
}
