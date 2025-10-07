@extends('operator.template')
@section('content')
<div class="container">
    <h2>Edit Berita</h2>
    <form action="{{ route('operator.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" required>{{ $berita->isi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $berita->tanggal }}" required>
        </div>
        <div class="mb-3">
            <label>Foto</label><br>
            @if($berita->foto)
                <img src="{{ asset('storage/'.$berita->foto) }}" width="100" class="mb-2"><br>
            @endif
            <input type="file" name="foto" class="form-control">
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
