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
Route::get('/', [AdminController::class, 'login'])->name('login');
Route::post('/login/post', [AdminController::class, 'Auth'])->name('login.auth');

Route::middleware(['authadmin'])->group(function () {
    Route::get('/admin/home',[AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::get('/admin/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::get('/admin/profile/create', [ProfileController::class, 'create'])->name('admin.profile.create');
    Route::post('/admin/profile/create/store', [ProfileController::class, 'store'])->name('admin.profile.create.post');
    Route::get('/admin/profile/edit/{id}', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/admin/profile/edit/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');

    Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('admin.siswa');
    Route::get('/admin/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/admin/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/admin/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::post('/admin/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/admin/siswa/delete/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');

    Route::get('/admin/guru',[GuruController::class, 'index'])->name('admin.guru');
    Route::get('/admin/guru/create',[GuruController::class, 'tambah'])->name('admin.guru.create');
    Route::post('/admin/guru/store',[GuruController::class, 'store'])->name('admin.guru.store');
    Route::get('/admin/guru/edit/{id}',[GuruController::class, 'edit'])->name('admin.guru.edit');
    Route::post('/admin/guru/update/{id}',[GuruController::class, 'update'])->name('admin.guru.update');
    Route::delete('/admin/guru/delte/{id}',[GuruController::class, 'delete'])->name('admin.guru.delete');

    Route::get('/admin/ekstrakulikuler',[EskulController::class, 'index'])->name('admin.ekstrakulikuler');
    Route::get('/admin/ekstrakulikuler/add',[EskulController::class, 'add'])->name('admin.ekstrakulikuler.add');
    Route::post('/admin/ekstrakulikuler/store',[EskulController::class, 'store'])->name('admin.ekstrakulikuler.store');
    Route::get('/admin/ekstrakulikuler/edit/{id}',[EskulController::class, 'edit'])->name('admin.ekstrakuliker.edit');
    Route::post('/admin/ekstrakulikuler/update/{id}',[EskulController::class, 'update'])->name('admin.ekstrakulikuler.update');
    Route::post('/admin/ekstrakulikuler/delete/{id}',[EskulController::class, 'delete'])->name('admin.ekstrakulikuler.delete');

    Route::get('/admin/berita/',[BeritaController::class,'index'])->name('admin.berita');
    Route::get('/admin/berita/create',[BeritaController::class, 'create'])->name('admin.berita.create');
    Route::post('/admin/berita/store',[BeritaController::class, 'store'])->name('admin.berita.store')->middleware('authadmin');
    Route::get('/admin/berita/edit/{berita}',[BeritaController::class, 'edit'])->name('admin.berita.edit');
    Route::post('/admin/berita/update/{berita}',[BeritaController::class, 'update'])->name('admin.berita.update');
    Route::post('/admin/berita/delete/{berita}',[BeritaController::class, 'destroy'])->name('admin.berita.delete');

    Route::get('/admin/galeri',[GaleriController::class, 'index'])->name('admin.galeri');
    Route::get('/admin/galeri/add',[GaleriController::class, 'add'])->name('admin.galeri.add');
    Route::post('/admin/galeri/store',[GaleriController::class, 'store'])->name('admin.galeri.store');
    Route::get('/admin/galeri/edit/{id}',[GaleriController::class, 'edit'])->name('admin.galeri.edit');
    Route::post('/admin/galeri/update/{id}',[GaleriController::class, 'update'])->name('admin.galeri.update');

});
// Route::middleware(['authoperator'])->group(function () {
//     Route::get('/admin/home',[AdminController::class, 'index'])->name('admin.index');
//     Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

//     Route::get('/admin/profile', [ProfileController::class, 'index'])->name('admin.profile');
//     Route::get('/admin/profile/create', [ProfileController::class, 'create'])->name('admin.profile.create');
//     Route::post('/admin/profile/create/store', [ProfileController::class, 'store'])->name('admin.profile.create.post');
//     Route::get('/admin/profile/edit/{id}', [ProfileController::class, 'edit'])->name('admin.profile.edit');
//     Route::post('/admin/profile/edit/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');

//     Route::get('/admin/siswa', [SiswaController::class, 'index'])->name('admin.siswa');
//     Route::get('/admin/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
//     Route::post('/admin/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
//     Route::get('/admin/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
//     Route::post('/admin/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
//     Route::delete('/admin/siswa/delete/{id}', [SiswaController::class, 'delete'])->name('siswa.delete');

//     Route::get('/admin/guru',[GuruController::class, 'index'])->name('admin.guru');
//     Route::get('/admin/guru/create',[GuruController::class, 'tambah'])->name('admin.guru.create');
//     Route::post('/admin/guru/store',[GuruController::class, 'store'])->name('admin.guru.store');
//     Route::get('/admin/guru/edit/{id}',[GuruController::class, 'edit'])->name('admin.guru.edit');
//     Route::post('/admin/guru/update/{id}',[GuruController::class, 'update'])->name('admin.guru.update');
//     Route::delete('/admin/guru/delte/{id}',[GuruController::class, 'delete'])->name('admin.guru.delete');

//     Route::get('/admin/ekstrakulikuler',[EskulController::class, 'index'])->name('admin.ekstrakulikuler');
//     Route::get('/admin/ekstrakulikuler/add',[EskulController::class, 'add'])->name('admin.ekstrakulikuler.add');
//     Route::post('/admin/ekstrakulikuler/store',[EskulController::class, 'store'])->name('admin.ekstrakulikuler.store');
//     Route::get('/admin/ekstrakulikuler/edit/{id}',[EskulController::class, 'edit'])->name('admin.ekstrakuliker.edit');
//     Route::post('/admin/ekstrakulikuler/update/{id}',[EskulController::class, 'update'])->name('admin.ekstrakulikuler.update');
//     Route::post('/admin/ekstrakulikuler/delete/{id}',[EskulController::class, 'delete'])->name('admin.ekstrakulikuler.delete');

//     Route::get('/admin/berita/',[BeritaController::class,'index'])->name('admin.berita');
//     Route::get('/admin/berita/create',[BeritaController::class, 'create'])->name('admin.berita.create');
//     Route::post('/admin/berita/store',[BeritaController::class, 'store'])->name('admin.berita.store')->middleware('authoperator');
//     Route::get('/admin/berita/edit/{berita}',[BeritaController::class, 'edit'])->name('admin.berita.edit');
//     Route::post('/admin/berita/update/{berita}',[BeritaController::class, 'update'])->name('admin.berita.update');
//     Route::post('/admin/berita/delete/{berita}',[BeritaController::class, 'destroy'])->name('admin.berita.delete');
// });

Route::get('/user/home',[UserController::class, 'index'])->name('user.home');
Route::get('/user/profile',[UserController::class, 'profile'])->name('user.profile');
Route::get('/user/guru',[UserController::class, 'guru'])->name('user.guru');
Route::get('/user/guru/detail',[UserController::class, 'detail'])->name('detail.guru');
Route::get('/user/siswa',[UserController::class, 'siswa'])->name('user.siswa');
Route::get('/user/eskul',[UserController::class, 'eskul'])->name('user.eskul');
Route::get('/user/galeri',[UserController::class, 'album'])->name('user.album');
