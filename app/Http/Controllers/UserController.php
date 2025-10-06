<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        $beritas = [
            [
                'judul' => 'Surat Edaran Penerapan Jam Malam Bagi Peserta Didik',
                'tanggal' => '19 September 2025',
                'gambar' => 'https://picsum.photos/id/1015/800/500',
                'isi' => 'Pemerintah Provinsi Jawa Barat melalui Dinas Pendidikan telah resmi mengeluarkan Surat Edaran...'
            ],
            [
                'judul' => 'Penguatan Mental Siswa Menjelang Lomba',
                'tanggal' => '13 Juni 2025',
                'gambar' => 'https://picsum.photos/id/1011/800/500',
                'isi' => 'Tasikmalaya, 9 Juni 2025 — Dalam rangka memberikan dukungan penuh kepada...'
            ],
            [
                'judul' => 'Kunjungan Guru RPL SMK YPC Inovasi Mandiri',
                'tanggal' => '28 April 2025',
                'gambar' => 'https://picsum.photos/id/1025/800/500',
                'isi' => 'Tasikmalaya, 23 April 2025 — Dalam rangka meningkatkan mutu pendidikan dan...'
            ],
            [
                'judul' => 'SMK YPC Raih Juara Umum LKS Tingkat Kabupaten',
                'tanggal' => '19 April 2025',
                'gambar' => 'https://picsum.photos/id/1031/800/500',
                'isi' => 'Kabupaten Tasikmalaya — Prestasi membanggakan kembali ditorehkan oleh SMK YPC setelah...'
            ],
            [
                'judul' => 'Halal Bihalal SMK YPC Tasikmalaya 2025',
                'tanggal' => '12 April 2025',
                'gambar' => 'https://picsum.photos/id/1040/800/500',
                'isi' => 'Tasikmalaya, 12 April 2025 — Suasana hangat penuh kekeluargaan mewarnai acara...'
            ],
            [
                'judul' => 'Pembukaan Kegiatan Pesantren Ramadhan',
                'tanggal' => '8 Maret 2025',
                'gambar' => 'https://picsum.photos/id/1052/800/500',
                'isi' => 'Tasikmalaya, 8 Maret 2025 — SMK YPC Tasikmalaya resmi membuka kegiatan...'
            ],
        ];
        return view('user.home',compact('beritas'));
    }
    public function profile(){
        return view('user.profile');
    }
    public function guru(){
        return view('user.guru');
    }
    public function detail(){
        return view('user.detailguru');
    }
    public function siswa(){
        return view('user.siswa');
    }
    public function eskul(){
        return view('user.eskul');
    }
    public function album(){
        return view('user.galeri');
    }
}
