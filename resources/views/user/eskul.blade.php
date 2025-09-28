@extends('user.template')
@section('content')
@php
    $eskul = [
        [
            'nama'=>'Pramuka',
            'deskripsi'=>'Pramuka adalah kegiatan ekstrakurikuler yang mengajarkan keterampilan hidup, kepemimpinan, dan kerja sama tim melalui berbagai aktivitas di alam terbuka.',
            'foto'=>'https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=60'
        ],
        [
            'nama'=>'Paskibra',
            'deskripsi'=>'Paskibra adalah ekstrakurikuler yang fokus pada pelatihan baris-berbaris, disiplin, dan semangat kebangsaan, biasanya bertugas dalam upacara bendera.',
            'foto'=>'https://images.unsplash.com/photo-1496307042754-b4aa456c4a2d?auto=format&fit=crop&w=400&q=60'
        ],
        [
            'nama'=>'Basket',
            'deskripsi'=>'Ekstrakurikuler basket mengembangkan keterampilan bermain bola basket, kerja sama tim, dan strategi permainan melalui latihan rutin dan pertandingan antar sekolah.',
            'foto'=>'https://images.unsplash.com/photo-1517649763962-0c623066013b?auto=format&fit=crop&w=400&q=60'
        ],
        [
            'nama'=>'Futsal',
            'deskripsi'=>'Futsal adalah olahraga yang dimainkan di lapangan kecil dengan bola yang lebih kecil dan berat, menekankan keterampilan teknis dan kecepatan permainan.',
            'foto'=>'https://images.unsplash.com/photo-1508609349937-5ec4ae374ebf?auto=format&fit=crop&w=400&q=60'
        ],
        [
            'nama'=>'Teater',
            'deskripsi'=>'Teater adalah ekstrakurikuler yang mengembangkan kemampuan akting, ekspresi diri, dan kreativitas melalui pertunjukan drama dan seni panggung.',
            'foto'=>'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=400&q=60'
        ],
        [
            'nama'=>'Musik',
            'deskripsi'=>'Ekstrakurikuler musik mengajarkan siswa berbagai instrumen musik, teori musik, dan keterampilan bermusik secara individu maupun dalam kelompok.',
            'foto'=>'https://images.unsplash.com/photo-1511671782779-c97d3d27a1d4?auto=format&fit=crop&w=400&q=60'
        ]
    ]
@endphp
<style>
.eskul-card{
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow:0 4px 12px rgba(0,0,0,.15);
    transition: transform .4s ease;
    cursor:pointer;
    background:#fff;
}
.eskul-card img{
    width:100%;
    height:230px;
    object-fit:cover;
    transition: transform .6s ease;
}
.eskul-overlay{
    position:absolute;
    bottom:0; left:0; right:0;
    padding:25px 15px 20px;
    background: linear-gradient(to top, rgba(0,0,0,.65) 0%, rgba(0,0,0,0) 100%);
    text-align:center;
    color:#fff;
}
.eskul-overlay .badge{
    background: rgba(255,255,255,0.2);
    backdrop-filter: blur(4px);
    font-weight:600;
    margin-bottom:6px;
}
.eskul-overlay h5{
    font-weight:700;
    text-shadow:1px 1px 3px rgba(0,0,0,.5);
}
.eskul-card:hover img{transform:scale(1.08);}
.eskul-card:hover{transform:translateY(-5px);}
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
    <h2 class="text-center mb-4 fw-bold">Daftar Ekstrakurikuler</h2>
    <div class="row g-4">
        @foreach($eskul as $e)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="eskul-card">
                <img src="{{ $e['foto'] }}" alt="{{ $e['nama'] }}">
                <div class="eskul-overlay">
                    <span class="badge rounded-pill text-bg-primary">Ekstrakurikuler</span>
                    <h5 class="mt-1">{{ $e['nama'] }}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
