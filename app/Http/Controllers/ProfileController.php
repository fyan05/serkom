<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Untuk menyimpan dan menghapus file
use App\Models\Profile;

class ProfileController extends Controller
{
    // ===============================
    // USER FUNCTION
    // ===============================

    // Menampilkan halaman profil untuk user
    public function profile(){
        return view('user.profile');
    }

    // ===============================
    // ADMIN FUNCTION
    // ===============================

    // Menampilkan semua profil di halaman admin
    public function index()
    {
        $data['profiles'] = Profile::all();
        return view('admin.profile', $data);
    }

    // Form tambah profil
    public function create()
    {
        return view('admin.profile-create');
    }

    // Proses simpan profil baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_sekolah' => 'required|max:100',
            'alamat' => 'required|max:150',
            'kepala_sekolah' => 'required|max:50',
            'visi_misi' => 'required',
            'npsn' => 'required|max:10|unique:profiles',
            'kontak' => 'required|max:15',
            'tahun_berdiri' => 'required|digits:4',
            'deskripsi' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Buat object baru dari request
        $profile = new Profile($request->except(['logo', 'foto']));

        // Upload logo jika ada
        if ($request->hasFile('logo')) {
            $profile->logo = $request->file('logo')->store('uploads/logo', 'public');
        }

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $profile->foto = $request->file('foto')->store('uploads/foto', 'public');
        }

        $profile->save();

        return redirect()->route('admin.profile')->with('success', 'Profile berhasil dibuat');
    }

    // Form edit profil
    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('admin.profile-edit', compact('profile'));
    }

    // Proses update profil
    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        // Update semua field kecuali file
        $profile->fill($request->except(['logo', 'foto']));

        // Update logo jika ada file baru
        if ($request->hasFile('logo')) {
            // Hapus logo lama
            if ($profile->logo && Storage::disk('public')->exists($profile->logo)) {
                Storage::disk('public')->delete($profile->logo);
            }
            $profile->logo = $request->file('logo')->store('uploads/logo', 'public');
        }

        // Update foto jika ada file baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($profile->foto && Storage::disk('public')->exists($profile->foto)) {
                Storage::disk('public')->delete($profile->foto);
            }
            $profile->foto = $request->file('foto')->store('uploads/foto', 'public');
        }

        $profile->save();

        return redirect()->route('admin.profile')->with('success', 'Profile berhasil diperbarui');
    }

    // ===============================
    // OPERATOR FUNCTION
    // ===============================

    // Halaman profil operator
    public function halaman()
    {
        $data['profiles'] = Profile::all();
        return view('operator.profile', $data);
    }

    // Form tambah profil operator
    public function tambah()
    {
        return view('operator.profile-create');
    }

    // Proses simpan profil operator
    public function pos(Request $request)
    {
        // Validasi sama seperti admin
        $request->validate([
            'nama_sekolah' => 'required|max:100',
            'alamat' => 'required|max:150',
            'kepala_sekolah' => 'required|max:50',
            'visi_misi' => 'required',
            'npsn' => 'required|max:10|unique:profiles',
            'kontak' => 'required|max:15',
            'tahun_berdiri' => 'required|digits:4',
            'deskripsi' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $profile = new Profile($request->except(['logo', 'foto']));

        if ($request->hasFile('logo')) {
            $profile->logo = $request->file('logo')->store('uploads/logo', 'public');
        }

        if ($request->hasFile('foto')) {
            $profile->foto = $request->file('foto')->store('uploads/foto', 'public');
        }

        $profile->save();

        return redirect()->route('operator.profile')->with('success', 'Profile berhasil dibuat');
    }

    // Form edit profil operator
    public function ubah($id)
    {
        $profile = Profile::findOrFail($id);
        return view('operator.profile-edit', compact('profile'));
    }

    // Proses update profil operator
    public function kirim(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        $profile->fill($request->except(['logo', 'foto']));

        if ($request->hasFile('logo')) {
            if ($profile->logo && Storage::disk('public')->exists($profile->logo)) {
                Storage::disk('public')->delete($profile->logo);
            }
            $profile->logo = $request->file('logo')->store('uploads/logo', 'public');
        }

        if ($request->hasFile('foto')) {
            if ($profile->foto && Storage::disk('public')->exists($profile->foto)) {
                Storage::disk('public')->delete($profile->foto);
            }
            $profile->foto = $request->file('foto')->store('uploads/foto', 'public');
        }

        $profile->save();

        return redirect()->route('operator.profile')->with('success', 'Profile berhasil diperbarui');
    }

}
