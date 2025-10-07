<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\EskulController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\UserController;
use App\Models\eskul;
use App\Models\siswa;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login');
// });
Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login/post', [AdminController::class, 'Auth'])->name('login.auth');

Route::middleware(['authadmin'])->group(function () {

    // DASHBOARD & LOGOUT
    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    // PROFIL SEKOLAH
    Route::get('/admin/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::get('/admin/profile/create', [ProfileController::class, 'create'])->name('admin.profile.create');
    Route::post('/admin/profile/create/store', [ProfileController::class, 'store'])->name('admin.profile.create.post');
    Route::get('/admin/profile/edit/{id}', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/admin/profile/edit/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');

    // SISWA
    Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('admin.siswa');
    Route::get('/admin/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/admin/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/admin/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::post('/admin/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/admin/siswa/delete/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');

    // GURU
    Route::get('/admin/guru', [GuruController::class, 'index'])->name('admin.guru');
    Route::get('/admin/guru/create', [GuruController::class, 'tambah'])->name('admin.guru.create');
    Route::post('/admin/guru/store', [GuruController::class, 'store'])->name('admin.guru.store');
    Route::get('/admin/guru/edit/{id}', [GuruController::class, 'edit'])->name('admin.guru.edit');
    Route::post('/admin/guru/update/{id}', [GuruController::class, 'update'])->name('admin.guru.update');
    Route::delete('/admin/guru/delete/{id}', [GuruController::class, 'delete'])->name('admin.guru.delete');

    // ESKUL
    Route::get('/admin/ekstrakulikuler', [EskulController::class, 'index'])->name('admin.ekstrakulikuler');
    Route::get('/admin/ekstrakulikuler/add', [EskulController::class, 'add'])->name('admin.ekstrakulikuler.add');
    Route::post('/admin/ekstrakulikuler/store', [EskulController::class, 'store'])->name('admin.ekstrakulikuler.store');
    Route::get('/admin/ekstrakulikuler/edit/{id}', [EskulController::class, 'edit'])->name('admin.ekstrakuliker.edit');
    Route::post('/admin/ekstrakulikuler/update/{id}', [EskulController::class, 'update'])->name('admin.ekstrakulikuler.update');
    Route::post('/admin/ekstrakulikuler/delete/{id}', [EskulController::class, 'delete'])->name('admin.ekstrakulikuler.delete');

    // BERITA
    Route::get('/admin/berita', [BeritaController::class, 'index'])->name('admin.berita');
    Route::get('/admin/berita/create', [BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/admin/berita/store', [BeritaController::class, 'store'])->name('admin.berita.store');
    Route::get('/admin/berita/edit/{berita}', [BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::post('/admin/berita/update/{berita}', [BeritaController::class, 'update'])->name('admin.berita.update');
    Route::post('/admin/berita/delete/{berita}', [BeritaController::class, 'destroy'])->name('admin.berita.delete');

    // GALERI
    Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('admin.galeri');
    Route::get('/admin/galeri/add', [GaleriController::class, 'add'])->name('admin.galeri.add');
    Route::post('/admin/galeri/store', [GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('/admin/galeri/edit/{id}', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::post('/admin/galeri/update/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');

    //user
    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/admin/users/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::post('/admin/users/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
});

Route::middleware(['authoperator'])->group(function () {

    // DASHBOARD & LOGOUT
    Route::get('/operator/home', [AdminController::class, 'halaman'])->name('operator.index');
    Route::get('/operator/logout', [AdminController::class, 'keluar'])->name('operator.logout');

    // USER
    Route::get('/operator /users', [UserController::class, 'halaman'])->name('operator.user');

    // PROFIL SEKOLAH
    Route::get('/operator/profile', [ProfileController::class, 'halaman'])->name('operator.profile');
    Route::get('/operator/profile/create', [ProfileController::class, 'tambah'])->name('operator.profile.create');
    Route::post('/operator/profile/create/store', [ProfileController::class, 'pos'])->name('operator.profile.create.post');
    Route::get('/operator/profile/edit/{id}', [ProfileController::class, 'ubah'])->name('operator.profile.edit');
    Route::post('/operator/profile/edit/update/{id}', [ProfileController::class, 'kirim'])->name('operator.profile.update');

    // SISWA
    Route::get('/operator/siswa', [SiswaController::class, 'halaman'])->name('operator.siswa');
    Route::get('/operator/siswa/create', [SiswaController::class, 'tambah'])->name('operator.siswa.create');
    Route::post('/operator/siswa/store', [SiswaController::class, 'pos'])->name('operator.siswa.store');
    Route::get('/operator/siswa/edit/{id}', [SiswaController::class, 'ubah'])->name('operator.siswa.edit');
    Route::post('/operator/siswa/update/{id}', [SiswaController::class, 'kirim'])->name('operator.siswa.update');
    Route::delete('/operator/siswa/delete/{id}', [SiswaController::class, 'hapus'])->name('operator.siswa.delete');

    // GURU
    Route::get('/operator/guru', [GuruController::class, 'halaman'])->name('operator.guru');
    Route::get('/operator/guru/create', [GuruController::class, 'add'])->name('operator.guru.create');
    Route::post('/operator/guru/store', [GuruController::class, 'pos'])->name('operator.guru.store');
    Route::get('/operator/guru/edit/{id}', [GuruController::class, 'ubah'])->name('operator.guru.edit');
    Route::post('/operator/guru/update/{id}', [GuruController::class, 'kirim'])->name('operator.guru.update');
    Route::delete('/operator/guru/delete/{id}', [GuruController::class, 'hapus'])->name('operator.guru.delete');

    // ESKUL
    Route::get('/operator/ekstrakulikuler', [EskulController::class, 'halaman'])->name('operator.ekstrakulikuler');
    Route::get('/operator/ekstrakulikuler/add', [EskulController::class, 'tambah'])->name('operator.ekstrakulikuler.add');
    Route::post('/operator/ekstrakulikuler/store', [EskulController::class, 'pos'])->name('operator.ekstrakulikuler.store');
    Route::get('/operator/ekstrakulikuler/edit/{id}', [EskulController::class, 'ubah'])->name('operator.ekstrakuliker.edit');
    Route::post('/operator/ekstrakulikuler/update/{id}', [EskulController::class, 'kirim'])->name('operator.ekstrakulikuler.update');
    Route::post('/operator/ekstrakulikuler/delete/{id}', [EskulController::class, 'hapus'])->name('operator.ekstrakulikuler.delete');

    // BERITA
    Route::get('/operator/berita', [BeritaController::class, 'halaman'])->name('operator.berita');
    Route::get('/operator/berita/create', [BeritaController::class, 'tambah'])->name('operator.berita.create');
    Route::post('/operator/berita/store', [BeritaController::class, 'pos'])->name('operator.berita.store');
    Route::get('/operator/berita/edit/{berita}', [BeritaController::class, 'ubah'])->name('operator.berita.edit');
    Route::post('/operator/berita/update/{berita}', [BeritaController::class, 'kirim'])->name('operator.berita.update');
    Route::post('/operator/berita/delete/{berita}', [BeritaController::class, 'hapus'])->name('operator.berita.delete');

    // GALERI
    Route::get('/operator/galeri', [GaleriController::class, 'halaman'])->name('operator.galeri');
    Route::get('/operator/galeri/add', [GaleriController::class, 'tambah'])->name('operator.galeri.add');
    Route::post('/operator/galeri/store', [GaleriController::class, 'pos'])->name('operator.galeri.store');
    Route::delete('/operator/galeri/hapus/{id}', [GaleriController::class, 'hapus'])->name('operator.galeri.hapus');
});



Route::get('/',[UserController::class, 'user'])->name('user.home');
Route::get('/user/profile',[UserController::class, 'profile'])->name('user.profile');
Route::get('/user/guru',[UserController::class, 'guru'])->name('user.guru');
Route::get('/user/eskul/detail',[UserController::class, 'detail'])->name('detail.eskul');
Route::get('/user/galeri/detail',[UserController::class, 'dg'])->name('detail.galeri');
Route::get('/user/siswa',[UserController::class, 'siswa'])->name('user.siswa');
Route::get('/user/eskul',[UserController::class, 'eskul'])->name('user.eskul');
Route::get('/user/galeri',[UserController::class, 'album'])->name('user.galeri');
Route::get('/user/berita',[UserController::class, 'berita'])->name('user.berita');
