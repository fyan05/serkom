<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EskulController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Models\eskul;
use App\Models\siswa;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login');
// });
Route::get('/admin/home',[AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/admin/profile', [ProfileController::class, 'profile'])->name('admin.profile');

Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('admin.siswa');
Route::post('/admin/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');

Route::get('/admin/guru',[GuruController::class, 'index'])->name('admin.guru');

Route::get('/', function () {
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
})->name('user.home');
Route::get('/user/profile',[profileController::class, 'profile'])->name('user.profile');
Route::get('/user/guru',[guruController::class, 'guru'])->name('user.guru');
Route::get('/user/guru/detail',[guruController::class, 'detail'])->name('detail.guru');
Route::get('/user/siswa',[siswaController::class, 'siswa'])->name('user.siswa');
Route::get('/user/eskul',[EskulController::class, 'eskul'])->name('user.eskul');
Route::get('/user/galeri',[GaleriController::class, 'album'])->name('user.album');
Route::get('/login',[Controller::class, 'login'])->name('login');
Route::get('/logout',[Controller::class, 'logout'])->name('logout');

