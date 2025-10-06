<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GuruController extends Controller
{
    public function guru(){
        return view('user.guru');
    }

    public function index(){
        $data['guru'] = Guru::all();
        return view('admin.guru',$data);
    }

    public function tambah(){
        return view('admin.guru-create');
    }

    public function store(Request $request)
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

        return redirect()->route('admin.guru')->with('success', 'Data guru berhasil ditambahkan!');
    }

    public function edit($id){
        // $id = Crypt::decrypt($id); // atau hapus kalau tidak mau pakai encrypt
        $guru = Guru::findOrFail($id);
        return view('admin.guru-edit', compact('guru'));
    }

    public function update(Request $request, $id){
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

        return redirect()->route('admin.guru')->with('success', 'Data guru berhasil diupdate!');
    }

    public function delete($id){
        // $id = Crypt::decrypt($id);
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return redirect()->route('admin.guru')->with('success', 'Data guru berhasil dihapus!');
    }
}
