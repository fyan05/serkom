@extends('user.template') {{-- Extend layout utama user --}}

@section('content')

<style>
/* Styling card untuk galeri foto/video */
.album-card{
    position:relative;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 4px 12px rgba(0,0,0,.15);
    cursor:pointer;
    transition:transform .4s ease; /* animasi hover */
}

.album-card img,
.album-card video{
    width:100%;
    height:230px; /* tinggi seragam untuk semua card */
    object-fit:cover; /* supaya gambar/video pas tanpa distorsi */
    transition:transform .5s ease;
}

.album-card:hover img,
.album-card:hover video{
    transform:scale(1.08); /* efek zoom saat hover */
}

.album-card:hover{
    transform:translateY(-5px); /* card naik sedikit saat hover */
}

.album-overlay{
    position:absolute;
    bottom:0;left:0;right:0;
    padding:20px 15px;
    background:linear-gradient(to top,rgba(0,0,0,.65),rgba(0,0,0,0)); /* overlay gradien */
    color:#fff;
}

.album-overlay h5{
    font-weight:700;
    text-shadow:1px 1px 3px rgba(0,0,0,.6); /* biar teks terlihat jelas */
}
</style>

<div id="home" class="container-fluid hero-header"
     style="background: url('{{ asset('asset/foto/Quality Restoration-Ultra HD-welcomesmkypc-scaled.jpeg') }}') center center/cover no-repeat;">
    <div class="container hero-header-inner" style="background: rgba(0,0,0,0.4); border-radius: 10px; padding: 50px 20px;">
        <div class="row">
            <div class="col-12 col-lg-7 text-center text-lg-start text-white">
                <h1 class="display-4 mb-3">Galeri</h1>
                <p class="fs-5">Dokumentasi visual kegiatan, prestasi, dan semangat kebersamaan.</p>
                <p class="mt-3">Kami percaya bahwa setiap momen adalah bagian penting dari perjalanan kami. Lihat bagaimana kami tumbuh, belajar, dan berkreasi bersama</p>
            </div>
        </div>
    </div>
</div>
    <div class="row g-4 p-5">
          <h2 class="mb-4 text-center fw-bold">Daftar Galeri</h2>
        {{-- Looping semua data galeri --}}
        @foreach($albums as $galeri)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="album-card" data-bs-toggle="modal" data-bs-target="#modal{{ $loop->index }}">
                {{-- Tampilkan foto atau video --}}
                @if ($galeri->jenis == 'foto')
                    <img src="{{ $galeri->file ? asset('storage/galeri/' . $galeri->file) : 'https://picsum.photos/600/400?random='.$loop->index }}"
                         alt="{{ $galeri->judul }}">
                @elseif ($galeri->jenis == 'video')
                    <video controls muted>
                        <source src="{{ asset('storage/galeri/' . $galeri->file) }}" type="video/mp4">
                        Browser Anda tidak mendukung video.
                    </video>
                @else
                    <p class="text-center text-muted">Jenis file tidak dikenali.</p>
                @endif

                {{-- Overlay judul --}}
                <div class="album-overlay">
                    <h5>{{ $galeri->judul }}</h5>
                </div>
            </div>
        </div>

        {{-- Modal untuk menampilkan galeri lebih besar --}}
        <div class="modal fade" id="modal{{ $loop->index }}" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark">
              <div class="modal-body p-0 text-center">
                @if ($galeri->jenis == 'foto')
                    <img src="{{ $galeri->file ? asset('storage/galeri/' . $galeri->file) : 'https://picsum.photos/1200/800?random='.$loop->index }}"
                         alt="{{ $galeri->judul }}" class="img-fluid w-100">
                @elseif ($galeri->jenis == 'video')
                    <video controls autoplay style="width:100%;max-height:80vh;">
                        <source src="{{ asset('storage/galeri/' . $galeri->file) }}" type="video/mp4">
                        Browser Anda tidak mendukung tag video.
                    </video>
                @endif
              </div>
              <div class="modal-footer justify-content-center text-white">
                <div>
                    <h5>{{ $galeri->judul }}</h5>
                    <p class="mb-0 small">{{ $galeri->deskripsi }}</p>
                    <p class="mb-0"><small>{{ $galeri->tanggal }}</small></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
