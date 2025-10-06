@extends('admin.template')
@section('content')
<div class="container">
    <h2>Tambah Ekstrakurikuler</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('admin.ekstrakulikuler.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Ekstrakurikuler</label>
            <input type="text" id="name_eskul" name="name_eskul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Pembina</label>
            <input type="text" id="pembina" name="pembina" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jadwal</label>
            <input type="text" id="jadwal_latihan" name="jadwal_latihan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label>Foto</label>
            <input type="file" name="gambar" id="gambar" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
