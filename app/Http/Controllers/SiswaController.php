<?php

namespace App\Http\Controllers;

use App\Models\galeri;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SiswaController extends Controller
{
//
        public function siswa(){
        return view('user.siswa');
    }
    public function index(){
        $data['siswa'] = Siswa::all();
        return view('admin.siswa',$data);
    }
    public function create(){
        return view('admin.siswa-create');
    }
    public function store(Request $request){
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
    return redirect()->route('admin.siswa')->with('success','Data Berhasil Ditambahkan');
}
    public function delete (string $id){
        // $id = Crypt::decrypt($id);
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect()->route('admin.siswa')->with('success', 'Data guru berhasil dihapus!');
    }
    public function edit ($id){
        // $id = Crypt::decrypt($id);
        $siswa = Siswa::find($id);
        return view('admin.editsiswa', compact('siswa'));
    }
    public function update (Request $request,string $id){
        // $request->validate([
        //     'nama' => 'required',
        //     'nisn' => 'required',
        //     'jenis_kelamin' => 'required',
        //     'tahun_masuk' => 'required',
        // ]);
        $siswa = Siswa::find($id);
        $siswa->update([
            'nama_siswa' => $request->nama_siswa,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tahun_masuk' => $request->tahun_masuk,
        ]);
        return redirect()->route('admin.siswa')->with('success','Data Berhasil Diubah');
    }
}
