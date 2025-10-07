<?php

namespace App\Http\Controllers;

use App\Models\galeri; // sepertinya tidak digunakan di sini
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
    // ===============================
    // USER FUNCTION
    // ===============================

    // Halaman daftar siswa untuk user
    public function siswa(){
        return view('user.siswa');
    }

    // ===============================
    // ADMIN FUNCTION
    // ===============================

    // Tampilkan semua data siswa di halaman admin
    public function index(){
        $data['siswa'] = Siswa::all();
        return view('admin.siswa',$data);
    }

    // Form tambah siswa baru
    public function create(){
        return view('admin.siswa-create');
    }

    // Simpan data siswa baru
    public function store(Request $request){
        // Validasi input
        $request->validate([
            'nama_siswa' => 'required',
            'nisn' => 'required|unique:siswas,nisn', // NISN harus unik
            'jenis_kelamin' => 'required',
            'tahun_masuk' => 'required|digits:4', // 4 digit tahun
        ]);

        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()->route('admin.siswa')->with('success','Data Berhasil Ditambahkan');
    }

    // Hapus data siswa
    public function delete (string $id){
        // $id = Crypt::decrypt($id); // bisa pakai enkripsi jika ingin
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil dihapus!');
    }

    // Form edit data siswa
    public function edit ($id){
        $id = Crypt::decrypt($id); // jika pakai enkripsi
        $siswa = Siswa::find($id);
        return view('admin.siswa-edit', compact('siswa'));
    }

    // Proses update data siswa
    public function update (Request $request,string $id){
        $id = Crypt::decrypt($id);

        $siswa = Siswa::find($id);
        $siswa->update([
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()->route('admin.siswa')->with('success','Data Berhasil Diubah');
    }

    // ===============================
    // OPERATOR FUNCTION
    // ===============================

    // Tampilkan semua data siswa untuk operator
    public function halaman(){
        $data['siswa'] = Siswa::all();
        return view('operator.siswa',$data);
    }

    // Form tambah siswa operator
    public function tambah(){
        return view('operator.siswa-create');
    }

    // Simpan siswa baru operator
    public function pos(Request $request){
        $request->validate([
            'nama_siswa' => 'required',
            'nisn' => 'required|unique:siswas,nisn',
            'jenis_kelamin' => 'required',
            'tahun_masuk' => 'required|digits:4',
        ]);

        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()->route('operator.siswa')->with('success','Data Berhasil Ditambahkan');
    }

    // Hapus data siswa operator
    public function hapus (string $id){
        // $id = Crypt::decrypt($id);
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect()->route('operator.siswa')->with('success', 'Data siswa berhasil dihapus!');
    }

    // Form edit data siswa operator
    public function ubah ($id){
        $id = Crypt::decrypt($id);
        $siswa = Siswa::find($id);
        return view('operator.siswa-edit', compact('siswa'));
    }

    // Proses update data siswa operator
    public function kirim (Request $request,string $id){
        $id = Crypt::decrypt($id);

        $siswa = Siswa::find($id);
        $siswa->update([
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);

        return redirect()->route('operator.siswa')->with('success','Data Berhasil Diubah');
    }
}
