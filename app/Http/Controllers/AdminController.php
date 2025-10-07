<?php

namespace App\Http\Controllers;

use App\Models\eskul;   // Model ekstrakurikuler
use App\Models\galeri;  // Model galeri sekolah
use App\Models\Guru;    // Model guru
use App\Models\Siswa;   // Model siswa
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Untuk autentikasi

class AdminController extends Controller
{
    // =====================
    // ADMIN FUNCTION
    // =====================

    // Halaman dashboard admin
    public function index()
    {
        // Ambil semua data guru, siswa, ekstrakurikuler, dan galeri
        $data['guru'] = Guru::all();
        $data['siswa'] = Siswa::all();
        $data['eks'] = eskul::all();
        $data['galeri'] = galeri::all();

        // Kirim data ke view admin.home
        return view('admin.home', $data);
    }

    // Tampilkan halaman login
    public function login(Request $request)
    {
        return view('login');
    }

    // Proses autentikasi login
    public function Auth(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Ambil input username & password
        $credentials = $request->only('username', 'password');

        // Cek login menggunakan Auth
        if (Auth::attempt($credentials)) {

            // Cek role user setelah login
            if (Auth::user()->role == 'admin') {
                return redirect()->route('admin.index'); // redirect ke dashboard admin
            } elseif (Auth::user()->role == 'operator') {
                return redirect()->route('operator.index'); // redirect ke dashboard operator
            } else {
                return redirect()->back(); // role lain, balik ke login
            }
        }

        // Jika login gagal
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ]);
    }

    // Logout admin/operator
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login'); // balik ke halaman login
    }

    // =====================
    // OPERATOR FUNCTION
    // =====================

    // Halaman dashboard operator
    public function halaman()
    {
        // Ambil semua data untuk operator
        $data['guru'] = Guru::all();
        $data['siswa'] = Siswa::all();
        $data['eks'] = eskul::all();
        $data['galeri'] = galeri::all();

        // Kirim data ke view operator.home
        return view('operator.home', $data);
    }

    // Logout operator
    public function keluar()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
