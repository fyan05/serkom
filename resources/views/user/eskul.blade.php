@extends('user.template') {{-- Extend layout utama user --}}

@section('content')

<style>
/* Card ekstrakurikuler */
.eskul-card{
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow:0 4px 12px rgba(0,0,0,.15);
    transition: transform .4s ease; /* animasi hover */
    cursor:pointer;
    background:#fff;
}
.eskul-card img{
    width:100%;
    height:230px; /* tinggi seragam */
    object-fit:cover; /* gambar tidak terdistorsi */
    transition: transform .6s ease;
}
.eskul-overlay{
    position:absolute;
    bottom:0; left:0; right:0;
    padding:25px 15px 20px;
    background: linear-gradient(to top, rgba(0,0,0,.65) 0%, rgba(0,0,0,0) 100%); /* gradien overlay */
    text-align:center;
    color:#fff;
}
.eskul-overlay h5{
    font-weight:700;
    text-shadow:1px 1px 3px rgba(0,0,0,.5); /* teks jelas di atas gambar */
}
.eskul-card:hover img{transform:scale(1.08);} /* zoom gambar saat hover */
.eskul-card:hover{transform:translateY(-5px);} /* card naik saat hover */
</style>

{{-- Hero / Header --}}
<div id="home" class="container-fluid hero-header"
     style="background: url('{{ asset('asset/foto/Quality Restoration-Ultra HD-welcomesmkypc-scaled.jpeg') }}') center center/cover no-repeat;">
    <div class="container hero-header-inner" style="background: rgba(0,0,0,0.4); border-radius: 10px; padding: 50px 20px;">
        <div class="row">
            <div class="col-12 col-lg-7 text-center text-lg-start text-white">
                <h1 class="display-4 mb-3">Daftar Ekstrakurikuler</h1>
                <p class="fs-5">Beragam kegiatan pengembangan diri yang dirancang untuk menyalurkan minat dan bakat siswa</p>
                    <p class="mt-3">Ekstrakurikuler tidak hanya memperkaya pengalaman belajar, tetapi juga membentuk karakter, kepemimpinan, dan kerja sama tim. Jelajahi pilihan yang tersedia dan jadilah bagian dari perjalanan inspiratif ini.</p>
            </div>
        </div>
    </div>
</div>

{{-- Daftar Eskul --}}
<div class="container py-5">
    <h2 class="text-center mb-4 fw-bold">Daftar Ekstrakurikuler</h2>
    <div class="row g-4">
        {{-- Looping semua ekstrakurikuler dari controller --}}
        @foreach($eskuls as $e)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="eskul-card" data-bs-toggle="modal" data-bs-target="#eskulModal{{ $e->id }}">
                {{-- Gambar eskul, fallback pakai picsum --}}
                <img src="{{ $e->foto ? asset('storage/fotoextra/'.$e->foto) : 'https://picsum.photos/400/300?random='.$loop->index }}"
                     alt="{{ $e->nama_eskul }}">
                <div class="eskul-overlay">
                    <h5 class="mt-1">{{ $e->nama_eskul }}</h5>
                </div>
            </div>
        </div>

        {{-- Modal detail eskul --}}
        <div class="modal fade" id="eskulModal{{ $e->id }}" tabindex="-1" aria-labelledby="eskulModalLabel{{ $e->id }}" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
              <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="eskulModalLabel{{ $e->id }}">{{ $e->nama_eskul }}</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                {{-- Gambar lebih besar --}}
                <div class="text-center mb-3">
                    <img src="{{ $e->foto ? asset('storage/fotoextra/'.$e->foto) : 'https://picsum.photos/600/400?random='.$loop->index }}"
                         alt="{{ $e->nama_eskul }}" class="img-fluid rounded shadow">
                </div>
                {{-- Detail eskul --}}
                <p><strong>Pembina:</strong> {{ $e->pembina }}</p>
                <p><strong>Jadwal Latihan:</strong> {{ $e->jadwal }}</p>
                <p class="mt-3"><strong>Deskripsi:</strong> {{ $e->deskripsi }}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
