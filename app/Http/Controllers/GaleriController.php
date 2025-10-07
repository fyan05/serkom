<?php

namespace App\Http\Controllers;

use App\Models\galeri; // Model untuk tabel galeri
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt; // Untuk enkripsi/dekripsi ID

class GaleriController extends Controller
{
    // ===============================
    // USER FUNCTION
    // ===============================

    // Tampilan album galeri untuk user biasa
    public function album(){
        return view('user.galeri');
    }

    // ===============================
    // ADMIN FUNCTION
    // ===============================

    // Menampilkan semua galeri di halaman admin
    public function index(){
        $data['galeris']= galeri::all(); // Ambil semua data galeri
        return view('admin.galeri',$data);
    }

    // Form tambah galeri baru
    public function add(){
        return view('admin.galeri-create');
    }

    // Proses simpan galeri baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file' => 'required|mimes:jpg,jpeg,png,mp4,mov,avi|max:100000',
            'jenis' => 'required|in:foto,video',
            'tanggal' => 'required|date',
        ]);

        // Simpan file jika ada
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('galeri', $filename, 'public');
        }

        // Simpan data galeri ke database
        galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $filename,
            'jenis' => $request->jenis,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('admin.galeri')->with('success', 'Data galeri berhasil ditambahkan.');
    }

    // Hapus galeri (ID terenkripsi)
    public function delete($id){
        $id = Crypt::decrypt($id); // Dekripsi ID
        $galeri = galeri::find($id);
        $galeri->delete();
        return redirect()->route('admin.galeri');
    }

    // ===============================
    // OPERATOR FUNCTION
    // ===============================

    // Halaman galeri untuk operator
    public function halaman(){
        $data['galeris']= galeri::all();
        return view('operator.galeri',$data);
    }

    // Form tambah galeri untuk operator
    public function tambah(){
        return view('operator.galeri-create');
    }

    // Proses simpan galeri baru untuk operator
    public function pos(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file' => 'required|mimes:jpg,jpeg,png,mp4,mov,avi|max:100000',
            'jenis' => 'required|in:foto,video',
            'tanggal' => 'required|date',
        ]);

        // Simpan file jika ada
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->storeAs('galeri', $filename, 'public');
        }

        // Simpan data galeri ke database
        galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $filename,
            'jenis' => $request->jenis,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('operator.galeri')->with('success', 'Data galeri berhasil ditambahkan.');
    }

    // Hapus galeri operator
    public function hapus($id){
        $id = Crypt::decrypt($id); // Dekripsi ID
        $galeri = galeri::find($id);
        $galeri->delete();
        return redirect()->route('operator.galeri');
    }
}
