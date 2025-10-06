<?php

namespace App\Http\Controllers;

use App\Models\eskul;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EskulController extends Controller
{
    //
    public function index(){
        $data['eskuls'] = Siswa::all();
        return view('admin.eskul', $data);
    }

    public function add(){
        return view('admin.eskul-create');
    }
    public function store(Request $request)
{
    $request->validate([
        'name_eskul' => 'required',
        'pembina' => 'required',
        'jadwal_latihan' => 'required',
        'deskripsi' => 'required',
        'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('gambar')) {
        $gambar   = $request->file('gambar');
        $filename = time() . '-' . $request->nama_eskul . '.' . $gambar->getClientOriginalExtension();
        $gambar->storeAs('fotoextra', $filename, 'public');
    } else {
        $filename = null;
    }

    eskul::create([
        'nama_eskul' => $request->name_eskul,
        'pembina' => $request->pembina,
        'jadwal' => $request->jadwal_latihan,
        'deskripsi' => $request->deskripsi,
        'foto' => $filename,
    ]);

    return redirect()->route('admin.ekstrakulikuler')->with('success', 'Data berhasil ditambah');
}

    public function delete (string $id){
        $id = Crypt::decrypt($id);
        $ekstra = eskul::find($id);
        $ekstra->delete();
        return redirect()->route('admin.ekstrakulikuler')->with('success', 'Data ekstrakulikuler berhasil dihapus!');
    }
    public function edit ($id){
        // $id = Crypt::decrypt($id);
        $ekstra = eskul::find($id);
        return view('admin.eskul-edit', compact('ekstra'));
    }
    public function update(Request $request, string $id)
{
    $request->validate([
        'name_ekstra' => 'required',
        'pembina' => 'required',
        'jadwal_latihan' => 'required',
        'deksripsi' => 'required',
        'gambar' => 'nullable|image'
    ]);

    $extra = eskul::find($id);

    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $filename = time() . '-' . $request->name_ekstra . '.' . $gambar->getClientOriginalExtension();
        $gambar->storeAs('fotoguru', $filename, 'public');
    } else {
        $filename = $extra->gambar;
    }

    $extra->update([
        'name_ekstra' => $request->name_ekstra,
        'pembina' => $request->pembina,
        'jadwal_latihan' => $request->jadwal_latihan,
        'deksripsi' => $request->deksripsi,
        'gambar' => $filename,
    ]);

    return redirect()->route('admin.ekstrakulikuler')->with('success', 'Data berhasil diubah');
}
}
