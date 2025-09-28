@extends('user.template')
@section('content')
<style>
    .student-card{
    position: relative;
    border-radius: 15px;
    overflow: hidden;
    box-shadow:0 4px 12px rgba(0,0,0,.1);
    cursor:pointer;
    background:#fff;
}
.student-card img{
    width:100%;
    height:320px;
    object-fit:cover;
    transition: transform .6s ease;
}
.student-overlay{
    position:absolute;
    bottom:0; left:0; right:0;
    padding:15px 20px;
    background: linear-gradient(to top, rgba(0,0,0,.7) 0%, rgba(0,0,0,0) 100%);
    color:#fff;
    transform:translateY(30%);
    opacity:0;
    transition:all .4s ease;
}
.student-overlay h5{margin:0;font-weight:600;}
.student-overlay p{margin:0;font-size:0.9rem;}
.student-icons{
    margin-top:8px;
    font-size:1.3rem;
}
.student-icons a{
    color:#fff; margin-right:12px;
    transition:color .3s;
}
.student-icons a:hover{color:#ffc107;}
.student-card:hover img{transform:scale(1.08);}
.student-card:hover .student-overlay{
    transform:translateY(0);
    opacity:1;
}
</style>
@php
    $siswa = [
        [
            'nama' => 'ujang',
            'kelas'=> 'XI RPL 1',
            'foto' => 'https://picsum.photos/400/500?random=1',
            'email'=> 'aulia@example.com',
            'telp' => '081234567890',
        ],
        [
            'nama' => 'ujang',
            'kelas'=> 'XI RPL 1',
            'foto' => 'https://picsum.photos/400/500?random=1',
            'email'=> 'aulia@example.com',
            'telp' => '081234567890',
        ],
        [
            'nama' => 'ujang',
            'kelas'=> 'XI RPL 1',
            'foto' => 'https://picsum.photos/400/500?random=1',
            'email'=> 'aulia@example.com',
            'telp' => '081234567890',
        ],
        [
            'nama' => 'ujang',
            'kelas'=> 'XI RPL 1',
            'foto' => 'https://picsum.photos/400/500?random=1',
            'email'=> 'aulia@example.com',
            'telp' => '081234567890',
        ],

    ];
@endphp
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
    <h2 class="mb-4 text-center fw-bold">Daftar Siswa</h2>
    <div class="row g-4">
        @foreach($siswa as $s)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="student-card">
                <img src="{{ $s['foto'] }}" alt="{{ $s['nama'] }}">
                <div class="student-overlay">
                    <h5>{{ $s['nama'] }}</h5>
                    <p>Kelas: {{ $s['kelas'] }}</p>
                    <div class="student-icons">
                        <a href="mailto:{{ $s['email'] }}"><i class="bi bi-envelope-fill"></i></a>
                        <a href="tel:{{ $s['telp'] }}"><i class="bi bi-telephone-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
