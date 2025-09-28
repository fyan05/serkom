@extends('user.template')
@section('content')
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
<div class="container my-5">

    {{-- Judul --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold">Profil Sekolah Ciputra</h1>
        <p class="text-muted">Sekilas informasi tentang sejarah, visi misi dan fasilitas unggulan.</p>
    </div>

    {{-- Sejarah Sekolah --}}
    <div class="row mb-5 align-items-center">
        <div class="col-lg-6 mb-3 mb-lg-0 d-flex justify-content-center">
            <img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=900&q=60"
                 class="img-fluid rounded shadow" alt="Sejarah Sekolah" style="max-width: 400px; width: 100%;">
        </div>
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h3 class="fw-semibold mb-3">Sejarah</h3>
            <p>
                Sekolah Ciputra berdiri sejak tahun 1996 dengan komitmen
                menyediakan pendidikan berstandar internasional di Indonesia.
                Dengan pengalaman lebih dari dua dekade, Sekolah Ciputra telah
                melahirkan banyak lulusan yang berhasil menorehkan prestasi
                baik di tingkat nasional maupun internasional.
            </p>
        </div>
    </div>

    {{-- Visi & Misi --}}
    <div class="row mb-5 align-items-center">
        <div class="col-lg-6 d-flex flex-column justify-content-center order-2 order-lg-1">
            <h3 class="fw-semibold mb-3">Visi & Misi</h3>
            <p><strong>Visi:</strong> Menjadi pusat keunggulan pendidikan yang inovatif dan berdaya saing global.</p>
            <p><strong>Misi:</strong></p>
            <ul>
                <li>Menyelenggarakan pendidikan yang mengintegrasikan kurikulum nasional dan internasional.</li>
                <li>Mendorong siswa untuk berkarakter, kreatif, dan peduli lingkungan.</li>
                <li>Membangun kerja sama dengan berbagai institusi pendidikan dan industri dunia.</li>
            </ul>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 mb-3 mb-lg-0 d-flex justify-content-center">
            <img src="https://images.unsplash.com/photo-1600880292089-90a7e086ee0c?auto=format&fit=crop&w=900&q=60"
                 class="img-fluid rounded shadow" alt="Visi Misi" style="max-width: 400px; width: 100%;">
        </div>
    </div>

    {{-- Fasilitas --}}
    <div class="mb-5">
        <h3 class="fw-semibold mb-4 text-center">Fasilitas Unggulan</h3>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=900&q=60"
                         class="card-img-top" alt="Lab Komputer">
                    <div class="card-body">
                        <h5 class="card-title">Laboratorium Komputer</h5>
                        <p class="card-text">Peralatan modern mendukung pembelajaran teknologi dan multimedia.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=900&q=60"
                         class="card-img-top" alt="Perpustakaan">
                    <div class="card-body">
                        <h5 class="card-title">Perpustakaan Modern</h5>
                        <p class="card-text">Ribuan koleksi buku dan area belajar yang nyaman bagi siswa dan guru.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=900&q=60"
                         class="card-img-top" alt="Ruang Praktik">
                    <div class="card-body">
                        <h5 class="card-title">Ruang Praktik Industri</h5>
                        <p class="card-text">Ruang praktik yang mensimulasikan lingkungan industri nyata.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


