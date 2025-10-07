<?php

namespace App\Http\Controllers;

use App\Models\Guru; // Model untuk tabel guru
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt; // Bisa dipakai untuk enkripsi/dekripsi ID

class GuruController extends Controller
{
    // ===============================
    // USER FUNCTION
    // ===============================

    // Menampilkan halaman guru untuk user biasa
    public function guru(){
        return view('user.guru');
    }

    // ===============================
    // ADMIN FUNCTION
    // ===============================

    // Menampilkan semua guru di halaman admin
    public function index(){
        $data['guru'] = Guru::all();
        return view('admin.guru',$data);
    }

    // Form tambah guru baru
    public function tambah(){
        return view('admin.guru-create');
    }

    // Proses simpan guru baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_guru' => 'required',
            'nip'       => 'required|unique:gurus,nip',
            'mapel'     => 'required',
            'foto'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Simpan file foto jika ada
        if ($request->hasFile('foto')) {
            $foto     = $request->file('foto');
            $filename = time() . '-' . $request->nama_guru . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('fotoguru', $filename, 'public');
        } else {
            $filename = null;
        }

        // Simpan data guru ke database
        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
            'foto'      => $filename,
        ]);

        return redirect()->route('admin.guru')->with('success', 'Data guru berhasil ditambahkan!');
    }

    // Form edit guru
    public function edit($id){
        $guru = Guru::findOrFail($id);
        return view('admin.guru-edit', compact('guru'));
    }

    // Proses update guru
    public function update(Request $request, $id){
        $guru = Guru::findOrFail($id);

        // Validasi input
        $request->validate([
            'nama_guru' => 'required',
            'nip'       => 'required|unique:gurus,nip,'.$id,
            'mapel'     => 'required',
            'foto'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Upload foto baru jika ada, kalau tidak tetap gunakan foto lama
        if ($request->hasFile('foto')) {
            $foto     = $request->file('foto');
            $filename = time() . '-' . $request->nama_guru . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('fotoguru', $filename, 'public');
        } else {
            $filename = $guru->foto;
        }

        // Update data guru
        $guru->update([
            'nama_guru' => $request->nama_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
            'foto'      => $filename,
        ]);

        return redirect()->route('admin.guru')->with('success', 'Data guru berhasil diupdate!');
    }

    // Hapus guru
    public function delete($id){
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return redirect()->route('admin.guru')->with('success', 'Data guru berhasil dihapus!');
    }

    // ===============================
    // OPERATOR FUNCTION
    // ===============================

    // Halaman guru untuk operator
    public function halaman(){
        $data['guru'] = Guru::all();
        return view('operator.guru',$data);
    }

    // Form tambah guru operator
    public function add(){
        return view('operator.guru-create');
    }

    // Proses simpan guru baru operator
    public function pos(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'nip'       => 'required|unique:gurus,nip',
            'mapel'     => 'required',
            'foto'      => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto     = $request->file('foto');
            $filename = time() . '-' . $request->nama_guru . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('fotoguru', $filename, 'public');
        } else {
            $filename = null;
        }

        Guru::create([
            'nama_guru' => $request->nama_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
            'foto'      => $filename,
        ]);

        return redirect()->route('operator.guru')->with('success', 'Data guru berhasil ditambahkan!');
    }

    // Form edit guru operator
    public function ubah($id){
        $guru = Guru::findOrFail($id);
        return view('operator.guru-edit', compact('guru'));
    }

    // Proses update guru operator
    public function kirim(Request $request, $id){
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama_guru' => 'required',
            'nip'       => 'required|unique:gurus,nip,'.$id,
            'mapel'     => 'required',
            'foto'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $foto     = $request->file('foto');
            $filename = time() . '-' . $request->nama_guru . '.' . $foto->getClientOriginalExtension();
            $foto->storeAs('fotoguru', $filename, 'public');
        } else {
            $filename = $guru->foto;
        }

        $guru->update([
            'nama_guru' => $request->nama_guru,
            'nip'       => $request->nip,
            'mapel'     => $request->mapel,
            'foto'      => $filename,
        ]);

        return redirect()->route('operator.guru')->with('success', 'Data guru berhasil diupdate!');
    }

    // Hapus guru operator
    public function hapus($id){
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return redirect()->route('operator.guru')->with('success', 'Data guru berhasil dihapus!');
    }
}
