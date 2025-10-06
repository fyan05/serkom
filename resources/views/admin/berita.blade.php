@extends('admin.template')
@section('content')
<div class="container">
    <h2>Daftar Berita</h2>
    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary mb-3">+ Tambah Berita</a>

    @foreach ($beritas as $berita)
        <div class="card mb-3">
            <div class="card-body">
                <h4>{{ $berita->judul }}</h4>
                <small>{{ $berita->tanggal }} | by {{ $berita->user->name }}</small>
                <p>{{ Str::limit($berita->isi, 100) }}</p>
                <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('admin.berita.delete', $berita->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                </form>
            </div>
        </div>
    @endforeach

    {{ $beritas->links() }}
</div>
@endsection
