@extends('admin.template')
@section('content')
<div class="container">
    <h2>Tambah Galeri</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}">
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
        </div>
        <div class="mb-3">
            <label>Jenis</label>
            <select id="jenis" name="jenis" class="form-select">
                <option value="">-- Pilih Jenis --</option>
                <option value="foto" {{ old('jenis') == 'foto' ? 'selected' : '' }}>Foto</option>
                <option value="video" {{ old('jenis') == 'video' ? 'selected' : '' }}>Video</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal') }}">
        </div>
        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="file" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
