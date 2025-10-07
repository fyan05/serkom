@extends('user.template') {{-- Extend layout utama user --}}

@section('content')

<style>
/* Card berita */
.news-card {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,.15);
    background: #fff;
    transition: transform .3s ease; /* animasi hover */
    cursor: pointer;
}
.news-card:hover {
    transform: translateY(-5px); /* naik saat hover */
}
.news-card img {
    width: 100%;
    height: 200px;
    object-fit: cover; /* gambar tetap proporsional */
}
.news-body {
    padding: 15px;
}
.news-body h5 {
    font-weight: 700;
    font-size: 1.1rem;
}
.news-body p {
    font-size: 0.9rem;
    color: #555;
}
.news-meta {
    font-size: 0.8rem;
    color: #777;
}
</style>

{{-- Hero / Header --}}
<div id="home" class="container-fluid hero-header"
     style="background: url('{{ asset('asset/foto/Quality Restoration-Ultra HD-welcomesmkypc-scaled.jpeg') }}') center center/cover no-repeat;">
    <div class="container hero-header-inner" style="background: rgba(0,0,0,0.4); border-radius: 10px; padding: 50px 20px;">
        <div class="row">
            <div class="col-12 col-lg-7 text-center text-lg-start text-white">
                <h1 class="display-4 mb-3"></h1>
                <p class="fs-5"></p>
                    <p class="mt-3"></p>
            </div>
        </div>
    </div>
</div>

{{-- Daftar Berita --}}
<div class="container py-5">
    <div class="row g-4">
        {{-- Looping semua berita dari controller --}}
        @foreach($beritas as $b)
        <div class="col-md-6 col-lg-4">
            <div class="news-card" data-bs-toggle="modal" data-bs-target="#beritaModal{{ $b->id }}">
                {{-- Gambar berita, fallback pakai placeholder --}}
                <img src="{{ $b->foto ? asset('storage/' . $b->foto) : 'https://picsum.photos/400/250?random='.$loop->index }}" alt="{{ $b->judul }}">
                <div class="news-body">
                    <h5>{{ $b->judul }}</h5>
                    {{-- Limit isi berita agar tidak terlalu panjang --}}
                    <p>{{ Str::limit(strip_tags($b->isi), 100, '...') }}</p>
                    <div class="news-meta mt-2">
                        <i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($b->tanggal)->translatedFormat('d F Y') }}<br>
                        <i class="bi bi-person-circle"></i> {{ $b->user->name ?? 'Admin' }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal detail berita --}}
        <div class="modal fade" id="beritaModal{{ $b->id }}" tabindex="-1" aria-labelledby="beritaModalLabel{{ $b->id }}" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="beritaModalLabel{{ $b->id }}">{{ $b->judul }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {{-- Gambar lebih besar --}}
                <div class="text-center mb-3">
                    <img src="{{ $b->foto ? asset('storage/' . $b->foto) : 'https://picsum.photos/600/400?random='.$loop->index }}" alt="{{ $b->judul }}" class="img-fluid rounded shadow">
                </div>
                {{-- Meta info --}}
                <p class="text-muted small">
                    <i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($b->tanggal)->translatedFormat('d F Y') }} |
                    <i class="bi bi-person-circle"></i> {{ $b->user->name ?? 'Admin' }}
                </p>
                {{-- Isi berita --}}
                <p>{!! nl2br(e($b->isi)) !!}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
