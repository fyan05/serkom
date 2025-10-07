@extends('user.template')
@section('content')

{{-- CSS untuk styling kartu guru --}}
<style>
    .teacher-card {
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,.1);
        cursor: pointer;
    }
    .teacher-card img {
        width: 100%;
        height: 350px;
        object-fit: cover;
        display: block;
        transition: transform .6s ease;
    }
    .teacher-overlay {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        padding: 20px;
        background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);
        color: #fff;
        transform: translateY(30%);
        opacity: 0;
        transition: all .4s ease;
    }
    .teacher-overlay h5 { margin: 0; font-weight: 600; }
    .teacher-overlay p { margin: 0; font-size: 0.9rem; }
    .teacher-icons { margin-top: 10px; font-size: 1.4rem; }
    .teacher-icons a { color: #fff; margin-right: 15px; transition: color .3s; }
    .teacher-icons a:hover { color: #ffc107; }
    .teacher-card:hover img { transform: scale(1.08); }
    .teacher-card:hover .teacher-overlay { transform: translateY(0); opacity: 1; }
</style>

{{-- Bagian header dengan background gambar --}}
<div id="home" class="container-fluid hero-header"
     style="background: url('{{ asset('asset/foto/Quality Restoration-Ultra HD-welcomesmkypc-scaled.jpeg') }}') center center/cover no-repeat;">
    <div class="container hero-header-inner" style="background: rgba(0,0,0,0.4); border-radius: 10px; padding: 50px 20px;">
        <div class="row">
            <div class="col-12 col-lg-7 text-center text-lg-start text-white">
                <h1 class="display-4 mb-3">Guru SMK YPC</h1>
                <p class="fs-5"> Mendidik dengan ilmu, membimbing dengan iman.</p>
                <p class="mt-3">    Guru SMK YPC Tasikmalaya menjadi teladan dalam membangun karakter dan keterampilan siswa menuju kesuksesan dunia dan akhirat.</p>
            </div>
        </div>
    </div>
</div>

{{-- Bagian daftar guru --}}
<div class="container py-5">
      <h2 class="mb-4 text-center fw-bold">Daftar Guru</h2>
    <div class="row g-4">
        {{-- Looping data guru --}}
        @foreach($gurus as $g)
            <div class="col-md-4 col-lg-3">
                <div class="teacher-card">
                    {{-- Jika tidak ada foto di database, pakai foto default dari internet --}}
                    <img src="{{ $g->foto ? asset('storage/fotoguru/'.$g->foto) : 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=400&q=60' }}"
                         alt="{{ $g->nama_guru }}">

                    {{-- Overlay muncul saat hover --}}
                    <div class="teacher-overlay">
                        <h5>{{ $g->nama_guru }}</h5>
                        <p>{{ $g->mapel }}</p>
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
