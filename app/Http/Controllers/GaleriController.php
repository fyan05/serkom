<?php

namespace App\Http\Controllers;

use App\Models\galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class GaleriController extends Controller
{
    //
    public function album(){
        return view('user.galeri');
    }
    public function index(){
        $data['galeris']= galeri::all();
        return view('admin.galeri',$data);
    }
    public function add(){
        return view('admin.galeri-create');
    }
    public function store(Request $request)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'file' => 'required|mimes:jpg,jpeg,png,mp4,mov,avi|max:100000',
        'jenis' => 'required|in:foto,video',
        'tanggal' => 'required|date',
    ]);

    if (
        $request->hasFile('file')) {
        $file = $request->file('file');
        $filename = time() . '-' . $file->getClientOriginalName();
        $file->storeAs('galeri', $filename, 'public');
    }

    galeri::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'file' => $filename,
        'jenis' => $request->jenis,
        'tanggal' => $request->tanggal,
    ]);

    return redirect()->route('admin.galeri')->with('success', 'Data galeri berhasil ditambahkan.');
}

public function delete($id){
    $id = Crypt::decrypt($id);
    $galeri = galeri::find($id);
    $galeri->delete();
    return redirect()->route('admin.galeri');
}
}
