@extends('user.template')
@section('content')
<style>
    /* efek bg guru */
.parallax-section {
    background-image: linear-gradient(rgba(52, 120, 200, 0.55), rgba(52, 120, 200, 0.55)), url({{ asset('asset/foto/slide2.jpg') }});
    background-attachment: fixed;   /* inti parallax */
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
    padding-top: 80px;   /* jarak atas */
    padding-bottom: 80px;
}

.parallax-section::before {
    /* Overlay gelap agar teks dan card terlihat jelas */
    content: "";
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.5);
}

.parallax-section > .container {
    position: relative;  /* supaya konten di atas overlay */
    z-index: 1;
}

.parallax-section .card {
    background: #fff;
    border-radius: .5rem;
}
/* Card guru */
.teacher-card {
    height: 300px; /* bisa diubah sesuai kebutuhan */
    transition: transform 0.4s ease, box-shadow 0.4s ease;
    cursor: pointer;
}

/* Hover card */
.teacher-card:hover {
    transform: translateY(-5px) scale(1.03);
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
}

/* Gambar guru */
.teacher-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

/* Zoom gambar saat hover */
.teacher-card:hover img {
    transform: scale(1.05);
}

/* Overlay */
.teacher-overlay {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.6); /* transparan gelap */
    opacity: 0;
    transition: opacity 0.4s ease;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}

/* Muncul saat hover */
.teacher-card:hover .teacher-overlay {
    opacity: 1;
}

/* Icon hover effect */
.teacher-icons a {
    transition: transform 0.3s ease, color 0.3s ease;
}

.teacher-icons a:hover {
    transform: scale(1.2);
    color: #ffc107; /* warna kuning saat hover */
}
</style>
  <div id="heroCarousel" class="carousel slide carousel-fade"
         data-bs-ride="carousel"
         data-bs-interval="3000">

        <div class="carousel-inner">

            <div class="carousel-item active">
                <div class="container-fluid hero-header"
                     style="background-image: url('{{ asset('asset/foto/Quality Restoration-Ultra HD-Heroweb-hariguru.jpeg') }}');">
                    <div class="container hero-header-inner d-flex align-items-center h-100">
                        <div class="row w-100">
                            <div class="col-12 col-lg-7 text-center text-lg-start">
                                <p class="fs-5 fs-lg-4 mb-2">Welcome to Sekolah Ciputra</p>
                                <h1 class="display-4 display-lg-1 mb-3 mb-lg-4">
                                    Centre of Excellence for Education in Indonesia
                                </h1>
                                <div class="mt-4">
                                    <a href="#" class="btn btn-primary btn-lg me-2">
                                        <i class="fa fa-info-circle me-1"></i> Learn More
                                    </a>
                                    <a href="#" class="btn btn-warning btn-lg">
                                        <i class="fa fa-user-plus me-1"></i> Enrolment
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="carousel-item">
                <div class="container-fluid hero-header"
                     style="background-image: url('{{ asset('asset/foto/Quality Restoration-Ultra HD-smks-ypc-tasikmalaya (1).jpeg') }}');">
                    <div class="container hero-header-inner d-flex align-items-center h-100">
                        <div class="row w-100">
                            <div class="col-12 col-lg-7 text-center text-lg-start">
                                <p class="fs-5 fs-lg-4 mb-2">Welcome to Sekolah Ciputra</p>
                                <h1 class="display-4 display-lg-1 mb-3 mb-lg-4">
                                    Achieve Your Dreams with Us
                                </h1>
                                <div class="mt-4">
                                    <a href="#" class="btn btn-primary btn-lg me-2">
                                        <i class="fa fa-info-circle me-1"></i> Learn More
                                    </a>
                                    <a href="#" class="btn btn-warning btn-lg">
                                        <i class="fa fa-user-plus me-1"></i> Enrolment
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
{{-- sambutan --}}

<div id="about" class="container-fluid py-5">
  <div class="container py-4 py-md-5">
    <div class="row g-4 g-md-5 align-items-center">
      <div class="col-12 col-md-6 mb-3 mb-md-0">
        <div class="about-images">
          <img src="{{ asset('asset/foto/Foto-Kepala2-400x400.jpg') }}" class="img-fluid" alt="">
        </div>
      </div>
      <div class="col-12 col-md-6 about-text">
        <h1 class="fs-6 fs-md-5 text-uppercase text-primary"><b>Sambutan Kepala Sekolah</b></h1>
        <p>
          Assalamu’alaikum warahmatullahi wabarakatuh.

          Selamat datang di website resmi Sekolah Ciputra. Kami berkomitmen untuk menjadi pusat keunggulan pendidikan di Indonesia, membekali siswa dengan pengetahuan, karakter, dan keterampilan abad 21. Melalui lingkungan belajar yang inspiratif, kami mendorong setiap peserta didik untuk meraih prestasi terbaik dan mengembangkan potensi diri secara optimal.

          Terima kasih atas kepercayaan dan dukungan dari seluruh orang tua, guru, serta masyarakat. Mari bersama-sama kita wujudkan generasi penerus bangsa yang unggul, berakhlak mulia, dan siap menghadapi tantangan global.

          Wassalamu’alaikum warahmatullahi wabarakatuh.
        </p>
      </div>
    </div>
  </div>
</div>

{{-- Stats Section --}}
<section class="py-5 text-white" style="background-color: #205375;">
<div class="container">
    <div class="row text-center">
        <div class="col-6 col-md-3 mb-4 mb-md-0">
        <h2 class="display-5">56</h2>
        <p class="mb-0">Teachers</p>
        </div>
        <div class="col-6 col-md-3 mb-4 mb-md-0">
        <h2 class="display-5">1288</h2>
        <p class="mb-0">Students</p>
        </div>
        <div class="col-6 col-md-3 mb-4 mb-md-0">
        <h2 class="display-5">102</h2>
        <p class="mb-0">Awards</p>
        </div>
        <div class="col-6 col-md-3 mb-4 mb-md-0">
        <h2 class="display-5">30+</h2>
        <p class="mb-0">Years of Excellence</p>
        </div>
    </div>
</div>
</section>
{{-- news --}}
<div class="container my-5">
    <h2 class="mb-4 text-center">Berita Terbaru</h2>
    <div class="row g-4">
        @foreach ($beritas->take(6) as $berita) {{-- Ambil maksimal 6 --}}
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ asset('storage/' . $berita->foto) }}" class="card-img-top object-fit-cover" alt="{{ $berita->judul }}" style="width:100%; height:220px; aspect-ratio: 4/3; object-fit: cover;">
                        <span class="badge bg-success position-absolute top-0 start-0 m-2 px-3 py-2">
                            {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                        </span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $berita->judul }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($berita->isi,100) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
{{-- daftar guru --}}
<div class="parallax-section py-5" style="background: url('{{ asset('asset/bg-guru.jpg') }}') center/cover fixed no-repeat;">
    <div class="container text-center text-white mb-5">
        <h2 class="fw-bold mb-3">Daftar Guru</h2>
        <p class="lead">SMK YPC Tasikmalaya</p>
    </div>

    <div class="container">
        <div class="row g-4">
            {{-- Looping data guru --}}
            @foreach($gurus as $g)
                <div class="col-md-4 col-lg-3">
                    <div class="teacher-card position-relative overflow-hidden rounded">
                        {{-- Foto guru --}}
                        <img src="{{ asset('asset/foto/Quality Restoration-Ultra HD-slide2.jpeg') : 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=400&q=60' }}"
                             alt="{{ $g->nama_guru }}" class="w-100 h-100 object-fit-cover">

                        {{-- Overlay muncul saat hover --}}
                        <div class="teacher-overlay d-flex flex-column justify-content-center align-items-center text-center text-white">
                            <h5 class="fw-bold">{{ $g->nama_guru }}</h5>
                            <p>{{ $g->mapel }}</p>
                            <div class="teacher-icons mt-2">
                                <a href="#" class="text-white mx-2 fs-5"><i class="bi bi-envelope-fill"></i></a>
                                <a href="#" class="text-white mx-2 fs-5"><i class="bi bi-telephone-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


 {{-- extrakurikuler --}}
<div class="container my-5">
    <h2 class="mb-4 text-center">Extrakurikuler</h2>
    <div id="scrollBox">
        <div id="scrollContent">
            @foreach($eskuls as $item) {{-- Ambil semua --}}
                <div class="card card-news">
                    <img src="{{ asset('storage/fotoextra/'.$item->foto) }}" alt="news">
                    <div class="card-body">
                        <small>{{ \Carbon\Carbon::parse($item->time)->format('d M Y') }}</small>
                        <h5>{{ $item->title }}</h5>
                        <p class="mb-2">{{ $item->body }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <a href="{{ route('user.eskul') }}">Lihat Selengkapnya</a>
    </div>
</div>
@endsection
