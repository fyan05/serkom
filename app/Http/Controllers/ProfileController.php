<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Profile;

class ProfileController extends Controller
{
    //
    public function profile(){
        return view('user.profile');
    }
        public function index()
    {
        $data['profiles'] = Profile::all();
        return view('admin.profile', $data);
    }

    public function create()
    {
        return view('admin.profile-create');
    }

    public function store(Request $request)
    {
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

        return redirect()->route('admin.profile')->with('success', 'Profile berhasil dibuat');
    }

    public function edit($id)
    {
            $profile = Profile::findOrFail($id);
            return view('admin.profile-edit', compact('profile'));
    }

    public function update(Request $request,$id)
    {
            $profile = Profile::findOrFail($id);
        //     $request->validate([
        //     'nama_sekolah' => 'required|max:100',
        //     'alamat' => 'required|max:150',
        //     'kepala_sekolah' => 'required|max:50',
        //     'visi_misi' => 'required',
        //     'npsn' => 'required|max:10|unique:profiles,npsn,'.$profile->id,
        //     'kontak' => 'required|max:15',
        //     'tahun_berdiri' => 'required|digits:4',
        //     'deskripsi' => 'required',
        //     'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        //     'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        // ]);

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

        return redirect()->route('admin.profile')->with('success', 'Profile berhasil diperbarui');
    }
}
