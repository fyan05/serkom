@extends('user.template')
@section('content')
<style>
.parallax-section {
    background-image: linear-gradient(rgba(44, 130, 89, 0.55), rgba(44, 130, 89, 0.55)), url({{ asset('asset/foto/SCK-Makassar-1.jpg') }});
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
</style>
  <div id="heroCarousel" class="carousel slide carousel-fade"
         data-bs-ride="carousel"
         data-bs-interval="3000">

        <div class="carousel-inner">

            <div class="carousel-item active">
                <div class="container-fluid hero-header"
                     style="background-image: url('{{ asset('asset/foto/YSIN0200-e1470191290176.jpg') }}');">
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
                     style="background-image: url('{{ asset('asset/foto/slide3.jpg') }}');">
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
          <img src="{{ asset('asset/foto/WhatsApp Image 2025-09-23 at 11.01.51_2501e16a.jpg') }}" class="img-fluid" alt="">
        </div>
      </div>
      <div class="col-12 col-md-6 about-text">
        <h1 class="fs-6 fs-md-5 text-uppercase text-success"><b>Sambutan Kepala Sekolah</b></h1>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias minima quaerat recusandae doloremque quae,
          natus, aliquid repudiandae reprehenderit accusantium aspernatur necessitatibus quo ab voluptatibus error?
          Voluptatem magni hic iste aperiam quo, at temporibus ea voluptate ipsum provident error impedit, excepturi
          inventore distinctio numquam sit ipsa dignissimos suscipit veritatis ad quam repellendus maiores molestias
          aliquam. Reprehenderit, aspernatur. Expedita voluptatum, velit mollitia quibusdam aliquam in deserunt eligendi
          fugiat modi quis, laborum consectetur quaerat maxime iusto labore vitae dolorum saepe sint harum consequatur.
          Et, esse mollitia reiciendis, iure illo consequuntur voluptatum ratione nisi ducimus atque possimus tempora
          quibusdam repellendus corporis, doloremque voluptate ut.
        </p>
      </div>
    </div>
  </div>
</div>

{{-- Stats Section --}}
<section class="py-5 text-white" style="background-color:#2b7444;">
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
    <h2 class="mb-4 text-center" >Berita Terbaru</h2>
    <div class="row g-4">
        @foreach ($beritas as $berita)
            <div class="col-md-4">
                <div class="card berita-card shadow-sm h-100">
                    <div class="position-relative overflow-hidden">
                        <img src="{{ $berita['gambar'] }}" class="card-img-top" alt="{{ $berita['judul'] }}">
                        <span class="badge bg-success position-absolute top-0 start-0 m-2 px-3 py-2">
                            {{ $berita['tanggal'] }}
                        </span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $berita['judul'] }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($berita['isi'],100) }}</p>
                        <a href="#" class="btn btn-outline-success">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
{{-- daftar guru --}}
<div class="parallax-section py-5">
    <div class="container text-center text-white mb-5">
        <h2 class="fw-bold mb-3">Daftar Guru</h2>
        <p class="lead">Ciputra</p>
    </div>

    <div class="container">
        <div class="row g-4">
            @php
                $guru = [
                    [
                        'nama'  => 'Dadan Romansyah, S.Pd., M.Ak.',
                        'mapel'=> 'Sejarah',
                        'foto'  => 'https://picsum.photos/id/1011/400/400'
                    ],
                    [
                        'nama'  => 'Andri Aliraksa, S.Pd.',
                        'mapel'=> 'Bahasa Indonesia',
                        'foto'  => 'https://picsum.photos/id/1012/400/400'
                    ],
                    [
                        'nama'  => 'Dewi Mariati, S.H., M.Ak.',
                        'mapel'=> 'Pendidikan Pancasila dan Kewarganegaraan',
                        'foto'  => 'https://picsum.photos/id/1013/400/400'
                    ],
                    [
                        'nama'  => 'Jaenal, S.Pd.',
                        'mapel'=> 'Sejarah Indonesia',
                        'foto'  => 'https://picsum.photos/id/1014/400/400'
                    ],
                ];
            @endphp

            @foreach ($guru as $g)
                <div class="col-md-3 col-sm-6 d-flex justify-content-center">
                    <div class="card shadow-sm border-0 h-100">
                        <img src="{{ $g['foto'] }}" class="card-img-top" alt="Foto {{ $g['nama'] }}">
                        <div class="card-body text-center">
                            <h5 class="card-title fw-bold">{{ $g['nama'] }}</h5>
                            <p class="card-text text-muted mb-0">{{ $g['mapel'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="#" class="btn btn-success btn-lg px-4 rounded shadow">
                Lihat Semua Guru
            </a>
        </div>
    </div>
</div>
 {{-- extrakurikuler --}}
  <div class="container my-5 justify-content-center">
    <h2 class="mb-4 text-center">Extrakurikuler</h2>
    <div id="scrollBox">
        @php
            $eskul = [
            [
                'img'  => 'https://picsum.photos/id/237/400/250',
                'time' => '27 September 2025',
                'title'=> 'Ekskul Basket SMK YPC',
                'body' => 'Kegiatan rutin latihan basket setiap hari Sabtu untuk meningkatkan skill dan kekompakan tim.'
            ],
            [
                'img'  => 'https://picsum.photos/id/238/400/250',
                'time' => '20 September 2025',
                'title'=> 'Ekskul Paskibra',
                'body' => 'Latihan baris-berbaris dan persiapan upacara bendera setiap minggu pagi.'
            ],
            [
                'img'  => 'https://picsum.photos/id/239/400/250',
                'time' => '18 September 2025',
                'title'=> 'Ekskul Seni Musik',
                'body' => 'Belajar memainkan alat musik band dan persiapan pentas seni sekolah.'
            ],
            [
                'img'  => 'https://picsum.photos/id/240/400/250',
                'time' => '10 September 2025',
                'title'=> 'Ekskul Pramuka',
                'body' => 'Kegiatan pramuka untuk melatih kemandirian dan jiwa kepemimpinan.'
            ],
            [
                'img'  => 'https://picsum.photos/id/241/400/250',
                'time' => '05 September 2025',
                'title'=> 'Ekskul Futsal',
                'body' => 'Latihan futsal setiap Rabu sore untuk persiapan turnamen antar sekolah.'
            ],
        ];
        @endphp
        <div id="scrollContent">
            @for($i=0;$i<2;$i++)
                @foreach($eskul as $item)
                    <div class="card card-news">
                        <img src="{{ $item['img'] }}" alt="news">
                        <div class="card-body">
                            <small>{{ $item['time'] }}</small>
                            <h5>{{ $item['title'] }}</h5>
                            <p class="mb-2">{{ $item['body'] }}</p>
                        </div>
                    </div>
                @endforeach
            @endfor
        </div>
        <a href="">lihat selengkapnya</a>
    </div>
</div>
@endsection
