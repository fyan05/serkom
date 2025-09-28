@extends('user.template')
@section('content')
@php
    $albums = [
          [
            'judul' => 'Kegiatan Upacara',
            'foto'  => 'https://picsum.photos/600/400?random=1'
        ],
        [
            'judul' => 'Lomba 17 Agustus',
            'foto'  => 'https://picsum.photos/600/400?random=2'
        ],
        [
            'judul' => 'Ekstrakurikuler Futsal',
            'foto'  => 'https://picsum.photos/600/400?random=3'
        ],
        [
            'judul' => 'Kunjungan Industri',
            'foto'  => 'https://picsum.photos/600/400?random=4'
        ],
        [
            'judul' => 'Study Tour',
            'foto'  => 'https://picsum.photos/600/400?random=5'
        ],
        [
            'judul' => 'Pentas Seni',
            'foto'  => 'https://picsum.photos/600/400?random=6'
        ],
    ]
@endphp
<style>
.album-card{
    position:relative;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 4px 12px rgba(0,0,0,.15);
    cursor:pointer;
    transition:transform .4s ease;
}
.album-card img{
    width:100%;
    height:230px;
    object-fit:cover;
    transition:transform .5s ease;
}
.album-card:hover img{transform:scale(1.08);}
.album-card:hover{transform:translateY(-5px);}
.album-overlay{
    position:absolute;
    bottom:0;left:0;right:0;
    padding:20px 15px;
    background:linear-gradient(to top,rgba(0,0,0,.65),rgba(0,0,0,0));
    color:#fff;
}
.album-overlay h5{
    font-weight:700;
    text-shadow:1px 1px 3px rgba(0,0,0,.6);
}
</style>
<div id="home" class="container-fluid hero-header" style="background: url('https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1200&q=80') center center/cover no-repeat;">
    <div class="container hero-header-inner" style="background: rgba(0,0,0,0.4); border-radius: 10px;">
        <div class="row">
            <div class="col-12 col-lg-7 text-center text-lg-start text-white">
                {{-- <p class="fs-5 fs-lg-4 mb-2">Selamat Datang di Masjid At-Taqwa Lebak Gede</p>
                <h1 class="display-4 display-lg-1 mb-3 mb-lg-4">Kemurnian Berasal Dari Iman</h1> --}}
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <h2 class="text-center mb-4 fw-bold">Album Foto Sekolah</h2>

    <div class="row g-4">
        @foreach($albums as $a)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="album-card" data-bs-toggle="modal" data-bs-target="#modal{{ $loop->index }}">
                <img src="{{ $a['foto'] }}" alt="{{ $a['judul'] }}">
                <div class="album-overlay">
                    <h5>{{ $a['judul'] }}</h5>
                </div>
            </div>
        </div>

        <!-- Modal untuk tampilan besar -->
        <div class="modal fade" id="modal{{ $loop->index }}" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark">
              <div class="modal-body p-0">
                <img src="{{ $a['foto'] }}" alt="{{ $a['judul'] }}" class="img-fluid w-100">
              </div>
              <div class="modal-footer justify-content-center text-white">
                {{ $a['judul'] }}
              </div>
            </div>
          </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
