@extends('admin.template')
@section('content')
<div class="container mt-4">
    <h2>Galeri</h2>
    <a href="{{ route('admin.galeri.add') }}" class="btn btn-primary mb-3">Tambah Galeri</a>
    <div class="row">
        @foreach($galeris as $galeri)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if ($galeri->jenis == 'foto')
                    <img src="{{ asset('storage/galeri'.$galeri->file) }}" alt="" srcset="">
                @elseif ($galeri->jenis == 'video')
                    <video width="100%" height="auto" controls>
                        <source src="{{ asset('storage/galeri'.$galeri->file) }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @else
                    <p>Jenis file tidak dikenali.</p>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $galeri->judul }}</h5>
                    <p class="card-text">{{ $galeri->deskripsi }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('admin.galeri.edit', $galeri->id) }}" class="btn btn-warning btn-sm">Edit</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
