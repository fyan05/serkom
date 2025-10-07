@extends('admin.template')
@section('content')
<div class="container">
    <h2>Edit Ekstrakurikuler</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('admin.ekstrakulikuler.update',Crypt::encrypt($eskul->id))  }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nama Ekstrakurikuler</label>
            <input type="text" name="nama_eskul" class="form-control" value="{{ $eskul->nama_eskul }}" required>
        </div>
        <div class="mb-3">
            <label>Pembina</label>
            <input type="text" name="pembina" class="form-control" value="{{ $eskul->pembina }}" required>
        </div>
        <div class="mb-3">
            <label>Jadwal</label>
            <input type="text" name="jadwal" class="form-control" value="{{ $eskul->jadwal }}" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required>{{ $eskul->deskripsi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Foto Lama</label><br>
            @if($eskul->foto)
                <img src="{{ asset('storage/fotoextra/'.$eskul->foto) }}" width="120" class="mb-2">
            @else
                <small class="text-muted">Belum ada foto</small>
            @endif
            <input type="file" name="gambar" class="form-control mt-2">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
