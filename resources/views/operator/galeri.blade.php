@extends('operator.template')
@section('content')
<div class="container mt-4">
    <h2>Galeri</h2>
    <a href="{{ route('operator.galeri.add') }}" class="btn btn-primary mb-3">Tambah Galeri</a>
    <div class="row">
        @foreach($galeris as $galeri)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="d-flex align-items-center justify-content-center" style="height: 250px; background: #f8f9fa;">
                    @if ($galeri->jenis == 'foto')
                        <img src="{{ asset('storage/galeri/' . $galeri->file) }}" alt="" class="img-thumbnail" style="max-height: 220px; max-width: 100%; object-fit: contain;">
                    @elseif ($galeri->jenis == 'video')
                        <video style="max-height: 220px; max-width: 100%; object-fit: contain;" controls>
                            <source src="{{ asset('storage/galeri/'. $galeri->file) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <p>Jenis file tidak dikenali.</p>
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $galeri->judul }}</h5>
                    <p class="card-text">{{ $galeri->deskripsi }}</p>
                </div>
                <form id="hapus-form-{{ $galeri->id }}"
                    action="{{ route('operator.galeri.hapus', Crypt::encrypt($galeri->id)) }}"
                    method="POST" style="display: inline-block;"
                    onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
