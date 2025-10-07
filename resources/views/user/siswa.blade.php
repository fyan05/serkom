@extends('user.template') {{-- Meng-extend template utama user --}}

@section('content')

<style>
    /* Styling kartu siswa */
    .student-card {
        position: relative;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0,0,0,.1);
        cursor: pointer;
        background: #fff;
    }

    /* Gambar di dalam kartu */
    .student-card img {
        width: 100%;
        height: 320px;
        object-fit: cover; /* Menyesuaikan ukuran gambar agar proporsional */
        transition: transform .6s ease; /* Animasi saat hover */
    }

    /* Overlay informasi siswa */
    .student-overlay {
        position: absolute;
        bottom: 0; left: 0; right: 0;
        padding: 15px 20px;
        background: linear-gradient(to top, rgba(0,0,0,.7) 0%, rgba(0,0,0,0) 100%);
        color: #fff;
        transform: translateY(30%); /* Awalnya overlay tersembunyi */
        opacity: 0;
        transition: all .4s ease;
    }

    .student-overlay h5 { margin: 0; font-weight: 600; }
    .student-overlay p { margin: 0; font-size: 0.9rem; }

    /* Efek hover pada kartu siswa */
    .student-card:hover img { transform: scale(1.08); }
    .student-card:hover .student-overlay {
        transform: translateY(0);
        opacity: 1; /* Menampilkan overlay saat hover */
    }
</style>

{{-- Hero Section / Header --}}
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

{{-- Daftar Siswa --}}
<div class="container py-5">
    <h2 class="mb-4 text-center fw-bold">Daftar Siswa</h2>
    <div class="row g-4">
        @foreach($siswa as $index => $s) {{-- Looping data siswa yang dikirim dari controller --}}
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="student-card">
                {{-- Jika tidak ada foto siswa, menggunakan gambar acak dari picsum --}}
                @php
                    $foto = 'https://picsum.photos/400/500?random=' . ($index + 1);
                @endphp

                <img src="{{ $foto }}" alt="{{ $s->nama_siswa }}">

                {{-- Overlay informasi siswa --}}
                <div class="student-overlay">
                    <h5>{{ $s->nama_siswa }}</h5> {{-- Nama siswa --}}
                    <p>NISN: {{ $s->nisn }}</p> {{-- Nomor Induk Siswa Nasional --}}
                    <p>Jenis Kelamin: {{ $s->jenis_kelamin }}</p>
                    <p>Tahun Masuk: {{ $s->tahun_masuk }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
