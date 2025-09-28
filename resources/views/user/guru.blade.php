@extends('user.template')
@section('content')
<style>
    .teacher-card{
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        box-shadow:0 4px 12px rgba(0,0,0,.1);
        cursor:pointer;
    }

    /* --- FOTO --- */
    .teacher-card img{
        width:100%;
        height:350px;
        object-fit:cover;
        display:block;
        transition: transform .6s ease; /* zoom anim */
    }

    /* --- OVERLAY --- */
    .teacher-overlay{
        position:absolute;
        bottom:0; left:0; right:0;
        padding:20px;
        background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);
        color:#fff;

        /* animasi awal: sedikit turun & transparan */
        transform: translateY(30%);
        opacity:0;
        transition: all .4s ease;
    }

    .teacher-overlay h5{margin:0;font-weight:600;}
    .teacher-overlay p{margin:0;font-size:0.9rem;}

    .teacher-icons{
        margin-top:10px;
        font-size:1.4rem;
    }
    .teacher-icons a{
        color:#fff;
        margin-right:15px;
        transition:color .3s;
    }
    .teacher-icons a:hover{color:#ffc107;}

    /* ===== HOVER EFFECT ===== */
    .teacher-card:hover img{
        transform: scale(1.08); /* zoom in */
    }
    .teacher-card:hover .teacher-overlay{
        transform: translateY(0); /* slide-up */
        opacity:1;               /* fade-in */
    }

</style>
@php
     $gurus = [
        ['nama'=>'Budi Santoso','jabatan'=>'Guru Matematika','foto'=>'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=400&q=60'],
        ['nama'=>'Siti Aminah','jabatan'=>'Guru Bahasa Inggris','foto'=>'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=crop&w=400&q=60'],
        ['nama'=>'Rudi Hartono','jabatan'=>'Guru Fisika','foto'=>'https://images.unsplash.com/photo-1531123897727-8f129e1688ce?auto=format&fit=crop&w=400&q=60'],
        ['nama'=>'Dewi Kartika','jabatan'=>'Guru Kimia','foto'=>'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=400&q=60'],
        ['nama'=>'Dewi Kartika','jabatan'=>'Guru Kimia','foto'=>'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=400&q=60'],
        ['nama'=>'Maria Yosefa','jabatan'=>'Guru Biologi','foto'=>'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=400&q=60'],
        ['nama'=>'Maria Yosefa','jabatan'=>'Guru Biologi','foto'=>'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=400&q=60'],
        ['nama'=>'Maria Yosefa','jabatan'=>'Guru Biologi','foto'=>'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=400&q=60'],
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
    <div class="row g-4">
        @foreach($gurus as $g)
        <div class="col-md-4 col-lg-3">
            <div class="teacher-card">
                <img src="{{ $g['foto'] }}" alt="{{ $g['nama'] }}">
                <div class="teacher-overlay">
                    <h5>{{ $g['nama'] }}</h5>
                    <p>{{ $g['jabatan'] }}</p>
                    <div class="teacher-icons">
                        <a href="#"><i class="bi bi-envelope-fill"></i></a>
                        <a href="#"><i class="bi bi-telephone-fill"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
