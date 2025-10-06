@extends('admin.template')
@section('content')
<div class="container">
    <h2>Tambah Profile Sekolah</h2>
    @if (Session::get('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="{{ route('admin.profile.create.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
    <label>Nama Sekolah</label>
    <input type="text" name="nama_sekolah" class="form-control">
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <input type="text" name="alamat" class="form-control">
    </div>
    <div class="mb-3">
        <label>Kepala Sekolah</label>
        <input type="text" name="kepala_sekolah" class="form-control"
            value="{{ old('kepala_sekolah', $profile->kepala_sekolah ?? '') }}">
    </div>
    <div class="mb-3">
        <label>Visi Misi</label>
        <textarea name="visi_misi" class="form-control">{{ old('visi_misi', $profile->visi_misi ?? '') }}</textarea>
    </div>
    <div class="mb-3">
        <label>Logo</label><br>
        @if(isset($profile) && $profile->logo)
            <img src="{{ asset('storage/'.$profile->logo) }}" width="100" class="mb-2"><br>
        @endif
        <input type="file" name="logo" class="form-control">
    </div>
    <div class="mb-3">
        <label>Foto</label><br>
        @if(isset($profile) && $profile->foto)
            <img src="{{ asset('storage/'.$profile->foto) }}" width="100" class="mb-2"><br>
        @endif
        <input type="file" name="foto" class="form-control">
    </div>
    <div class="mb-3">
        <label>NPSN</label>
        <input type="text" name="npsn" class="form-control">
    </div>
    <div class="mb-3">
        <label>Kontak</label>
        <input type="text" name="kontak" class="form-control">
    </div>
    <div class="mb-3">
        <label>Tahun Berdiri</label>
        <input type="number" name="tahun_berdiri" class="form-control">
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ old('deskripsi', $profile->deskripsi ?? '') }}</textarea>
    </div>

     <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm" style="transition:0.3s;">
       <i class="fas fa-paper-plane me-2"></i> Tambah
    </button>
</form>
</div>
@endsection
