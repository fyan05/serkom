<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\eskul;
use App\Models\galeri;
use App\Models\Guru;
use App\Models\profile;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ===============================
    // ADMIN FUNCTION
    // ===============================

    // Menampilkan daftar semua user untuk admin
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->get(); // urut dari user terbaru
        return view('admin.user', compact('users'));
    }

    // Form tambah user baru
    public function create()
    {
        return view('admin.user-create');
    }

    // Simpan data user baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|max:30',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,operator', // hanya boleh admin atau operator
        ]);

        // Simpan ke database, password harus di-hash
        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    // Form edit user
    public function edit($id)
    {
        $user = User::findOrFail($id); // jika tidak ada, tampil error 404
        return view('admin.user-edit', compact('user'));
    }

    // Update data user
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->only(['username', 'role']);

        // Jika password diisi, update juga
        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    // Hapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }

    // ===============================
    // OPERATOR FUNCTION
    // ===============================

    // Menampilkan daftar user untuk operator
    public function halaman()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('operator.user', compact('users'));
    }

    // ===============================
    // USER/FRONTEND FUNCTION
    // ===============================

    // Halaman utama user (dashboard)
    public function user()
    {
        $beritas = Berita::orderBy('tanggal','desc')->get(); // berita terbaru dulu
        $gurus = Guru::all();
        $eskuls = eskul::all();
        return view('user.home', compact('beritas','gurus','eskuls'));
    }

    // Halaman daftar berita
    public function berita()
    {
        $beritas = Berita::orderBy('tanggal','desc')->get();
        return view('user.berita',compact('beritas'));
    }

    // Halaman profil sekolah
    public function profile()
    {
        $profil = profile::first(); // ambil satu data profile
        return view('user.profile', compact('profil'));
    }

    // Halaman daftar guru
    public function guru()
    {
        $gurus = Guru::all();
        return view('user.guru', compact('gurus'));
    }

    // Detail ekstrakurikuler
    public function detail()
    {
        $id = request()->get('id'); // ambil id dari query string
        $eskul = eskul::findOrFail($id);
        return view('user.eskul-detail', compact('eskul'));
    }

    // Halaman daftar siswa
    public function siswa()
    {
        $siswa = Siswa::all();
        return view('user.siswa', compact('siswa'));
    }

    // Halaman daftar ekstrakurikuler
    public function eskul()
    {
        $eskuls = eskul::all();
        return view('user.eskul', compact('eskuls'));
    }

    // Halaman album galeri
    public function album()
    {
        $data['albums']= galeri::all();
        return view('user.galeri',$data);
    }

    // Detail galeri (foto/video)
    public function dg()
    {
        $id = request()->get('id'); // ambil id dari query string
        $galeri = galeri::findOrFail($id);
        return view('user.galeri-detail', compact('galeri'));
    }
}
