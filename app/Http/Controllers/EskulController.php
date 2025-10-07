<?php

namespace App\Http\Controllers;

use App\Models\eskul; // Model untuk tabel ekstrakurikuler
use App\Models\Siswa; // Model siswa (tidak dipakai di controller ini)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt; // Untuk enkripsi/dekripsi ID

class EskulController extends Controller
{
    // ===============================
    // ADMIN FUNCTION
    // ===============================

    // Tampilkan daftar ekstrakurikuler di admin
    public function index(){
        $data['eskuls'] = eskul::all(); // Ambil semua data eskul
        return view('admin.eskul', $data); // Kirim ke view admin
    }

    // Form tambah eskul
    public function add(){
        return view('admin.eskul-create');
    }

    // Proses simpan eskul baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name_eskul' => 'required',
            'pembina' => 'required',
            'jadwal_latihan' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan file gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time() . '-' . $request->nama_eskul . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('fotoextra', $filename, 'public');
        } else {
            $filename = null;
        }

        // Simpan data eskul
        eskul::create([
            'nama_eskul' => $request->name_eskul,
            'pembina' => $request->pembina,
            'jadwal' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'foto' => $filename,
        ]);

        return redirect()->route('admin.ekstrakulikuler')->with('success', 'Data berhasil ditambah');
    }

    // Hapus eskul (ID terenkripsi)
    public function delete(string $id){
        $id = Crypt::decrypt($id); // Dekripsi ID
        $ekstra = eskul::find($id);
        $ekstra->delete();
        return redirect()->route('admin.ekstrakulikuler')->with('success', 'Data ekstrakulikuler berhasil dihapus!');
    }

    // Form edit eskul
    public function edit($id){
        $id = Crypt::decrypt($id);
        $eskul = eskul::find($id);
        return view('admin.eskul-edit', compact('eskul'));
    }

    // Proses update eskul
    public function update(Request $request, string $id)
    {
        $id = Crypt::decrypt($id);

        $request->validate([
            'nama_eskul' => 'required',
            'pembina' => 'required',
            'jadwal' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image'
        ]);

        $extra = eskul::find($id);

        // Jika upload gambar baru, simpan file baru
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time() . '-' . $request->nama_eskul . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('fotoextra', $filename, 'public');
        } else {
            $filename = $extra->gambar; // tetap pakai gambar lama
        }

        // Update data eskul
        $extra->update([
            'nama_eskul' => $request->nama_eskul,
            'pembina' => $request->pembina,
            'jadwal' => $request->jadwal,
            'deskripsi' => $request->deskripsi,
            'foto' => $filename,
        ]);

        return redirect()->route('admin.ekstrakulikuler')->with('success', 'Data berhasil diubah');
    }

    // ===============================
    // OPERATOR FUNCTION
    // ===============================

    public function halaman(){
        $data['eskuls'] = eskul::all();
        return view('operator.eskul', $data);
    }

    public function tambah(){
        return view('operator.eskul-create');
    }

    public function pos(Request $request)
    {
        // Validasi input
        $request->validate([
            'name_eskul' => 'required',
            'pembina' => 'required',
            'jadwal_latihan' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Simpan file gambar jika ada
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time() . '-' . $request->nama_eskul . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('fotoextra', $filename, 'public');
        } else {
            $filename = null;
        }

        // Simpan data eskul
        eskul::create([
            'nama_eskul' => $request->name_eskul,
            'pembina' => $request->pembina,
            'jadwal' => $request->jadwal_latihan,
            'deskripsi' => $request->deskripsi,
            'foto' => $filename,
        ]);

        return redirect()->route('operator.ekstrakulikuler')->with('success', 'Data berhasil ditambah');
    }

    public function hapus(string $id){
        $id = Crypt::decrypt($id);
        $ekstra = eskul::find($id);
        $ekstra->delete();
        return redirect()->route('operator.ekstrakulikuler')->with('success', 'Data ekstrakulikuler berhasil dihapus!');
    }

    public function ubah($id){
        $id = Crypt::decrypt($id);
        $eskul = eskul::find($id);
        return view('operator.eskul-edit', compact('eskul'));
    }

    public function kirim(Request $request, string $id)
    {
        $id = Crypt::decrypt($id);

        $request->validate([
            'nama_eskul' => 'required',
            'pembina' => 'required',
            'jadwal' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image'
        ]);

        $extra = eskul::find($id);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $filename = time() . '-' . $request->nama_eskul . '.' . $gambar->getClientOriginalExtension();
            $gambar->storeAs('fotoextra', $filename, 'public');
        } else {
            $filename = $extra->gambar;
        }

        $extra->update([
            'nama_eskul' => $request->nama_eskul,
            'pembina' => $request->pembina,
            'jadwal' => $request->jadwal,
            'deskripsi' => $request->deskripsi,
            'foto' => $filename,
        ]);

        return redirect()->route('operator.ekstrakulikuler')->with('success', 'Data berhasil diubah');
    }
}
