@extends('admin.template')
@section('content')
<div class="container">
    <h2>Profile Sekolah</h2>

    <form action="{{ route('admin.profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Sekolah</label>
            <input type="text" name="nama_sekolah" class="form-control"
                value="{{ old('nama_sekolah', isset($profile) ? $profile->nama_sekolah : '') }}">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control"
                value="{{ old('alamat', isset($profile) ? $profile->alamat : '') }}">
        </div>

        <div class="mb-3">
            <label>Kepala Sekolah</label>
            <input type="text" name="kepala_sekolah" class="form-control"
                value="{{ old('kepala_sekolah', isset($profile) ? $profile->kepala_sekolah : '') }}">
        </div>

        <div class="mb-3">
            <label>Visi Misi</label>
            <textarea name="visi_misi" class="form-control">{{ old('visi_misi', isset($profile) ? $profile->visi_misi : '') }}</textarea>
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
            <input type="text" name="npsn" class="form-control"
                value="{{ old('npsn', isset($profile) ? $profile->npsn : '') }}">
        </div>

        <div class="mb-3">
            <label>Kontak</label>
            <input type="text" name="kontak" class="form-control"
                value="{{ old('kontak', isset($profile) ? $profile->kontak : '') }}">
        </div>

        <div class="mb-3">
            <label>Tahun Berdiri</label>
            <input type="number" name="tahun_berdiri" class="form-control"
                value="{{ old('tahun_berdiri', isset($profile) ? $profile->tahun_berdiri : '') }}">
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ old('deskripsi', isset($profile) ? $profile->deskripsi : '') }}</textarea>
        </div>
    <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm" style="transition:0.3s;">
       <i class="fas fa-paper-plane me-2"></i> {{ isset($profile) ? 'Simpan' : 'Tambah' }}
    </button>
    </form>
</div>
@endsection
