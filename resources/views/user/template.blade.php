<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title','SMK YPC Tasikmalaya')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('bootstrap1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/fontawesome-free-6.7.2-web/css/all.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body { font-family: 'Open Sans', sans-serif; }

    /* Navbar Style */
       .navbar {
      transition: all .4s ease-in-out;
    }
    .navbar-transparent {
      background: transparent !important;
    }
    .navbar-scrolled {
      background: #fff !important;
      box-shadow: 0 2px 8px rgba(0,0,0,.1);
    }
    .navbar .container{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .navbar-nav .nav-link {
      font-weight: 500;
      transition: color 0.3s;
    }
        .navbar-nav .nav-link {
      font-weight: 500;
      transition: color 0.3s;
    }
    /* transparan ke putih */
    .navbar-transparent .nav-link,
    .navbar-transparent .navbar-brand {
      color: #fff !important;
    }
    /* discroll ke hitam */
    .navbar-scrolled .nav-link,
    .navbar-scrolled .navbar-brand {
      color: #000 !important;
    }
    /* Hover jadi hijau rumput */
    .navbar-nav .nav-link:hover,
    .navbar-brand:hover {
    color: #2563eb !important;
    }
    .navbar-nav .nav-link:hover::after {
      width: 60%;
    }

    /* Aktif (halaman yang sedang dikunjungi) */
    .nav-link.active {
      color: #2563eb !important;
      font-weight: 700;
    }

    /* Hero Section */
        .hero-header {
            min-height: 100vh;
            display: flex;
            align-items: center;
            color: #fff;
            position: relative;
            background-size: cover;
            background-position: center;
        }
        .hero-header::before {
            content:"";
            position:absolute;
            top:0;left:0;width:100%;height:100%;
            background:rgba(0,0,0,.5);

        }
        .hero-header-inner {
            position: relative;

        }

    /* kepsek kata kata */
    .about-images {
      display: grid;
      grid-template-columns: 2fr 1fr;
      grid-template-rows: 1fr 1fr;
      gap: 10px;
    }
    .about-images img {
      width:100%;
      height:100%;
      object-fit:cover;
      border-radius: .5rem;
    }
    .about-images img:first-child {
      grid-row: span 2;
    }

           /* --- Area scroll eskul --- */
#scrollBox {
    overflow: hidden;
    white-space: nowrap;
    position: relative;
}
#scrollContent {
    display: inline-flex;
    animation: scroll-left 15s linear infinite;/* kecepatan scroll diatur di sini */
}
@keyframes scroll-left {
    0%   { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}
#scrollBox:hover #scrollContent {
    animation-play-state: paused;
}
/* berita */
.card-news {
    width: 350px;
    margin: 0 1rem;
    background: #fff;
    border-radius: 1rem;
    box-shadow: 0 5px 15px rgba(0,0,0,.1);
    overflow: hidden;
}
.card-news img {
    height: 220px;
    width: 100%;
    object-fit: cover;
}
.card-body {padding:1.25rem;}
.card-body small {color:#666;}
.card-body h5 {font-weight:bold;margin-top:.5rem;}
.berita-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.berita-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}
.berita-card img {
    transition: transform 0.5s ease;
}
.berita-card:hover img {
    transform: scale(1.05);
}
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav id="mainNav" class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">
      <a href="{{ route('user.home') }}" class="navbar-brand fw-bold">
        SMK YPC<span class="text-primary"> Tasikmalaya</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div id="nav" class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.home') ? 'active' : '' }}" href="{{ route('user.home') }}">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.profile') ? 'active' : '' }}" href="{{ route('user.profile') }}">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.guru') ? 'active' : '' }}" href="{{ route('user.guru') }}">Guru</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.siswa') ? 'active' : '' }}" href="{{ route('user.siswa') }}">Siswa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.eskul') ? 'active' : '' }}" href="{{ route('user.eskul') }}">Extrakurikuler</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.galeri') ? 'active' : '' }}" href="{{ route('user.galeri') }}">Galeri</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('user.berita') ? 'active' : '' }}" href="{{ route('user.berita') }}">Berita</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main -->
  <main>
    @yield('content')
  </main>

  <!-- Footer -->
<footer class="text-white pt-5" style="background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);">
    <div class="container">
        {{-- info --}}
        <div class="row mb-4">
            <div class="col-md-4 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('asset/foto/images-removebg-preview.png') }}" alt="logo"
                         style="width:50px" class="me-2">
                    <h5 class="m-0 fw-bold">Smk YPC Tasikmalaya</h5>
                </div>
                <p><i class="fa fa-phone me-2 text-warning"></i>62265546717</p>
                <p><i class="fa fa-fax me-2 text-warning"></i>62265546717</p>
                <p><i class="fa fa-whatsapp me-2 text-warning"></i>08112224563</p>
                <p><i class="fa fa-envelope me-2 text-warning"></i>
                   smkypctasikmalaya@gmail.com</p>
            </div>

            <div class="col-md-2 mb-4">
                <h5 class="fw-bold">Profil</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Tentang Kami</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Visi dan Misi</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Sejarah</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Sambutan Kepala</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Video</a></li>
                </ul>
            </div>

            <div class="col-md-3 mb-4">
                <h5 class="fw-bold">Alamat</h5>
                <p class="mb-0">
                    Jl. Raya Mangunreja No.73, Cikunten Singaparna<br>
                    Tasikmalaya Jawa Barat 46414<br>Indonesia
                </p>
            </div>
        </div>

        <hr class="border-light">
        <div class="d-flex flex-column flex-md-row
                    justify-content-between align-items-center">
            <p class="mb-2 mb-md-0">
                Copyright © {{ date('Y') }} SMK YPC.
            </p>
            <ul class="nav">
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Privacy Policy</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Peta Situs</a></li>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Kontak</a></li>
            </ul>
        </div>

    </div>
</footer>

  <!-- Bootstrap JS -->
  <script src="{{ asset('bootstrap1/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Navbar Scroll Script -->
  <script>
    window.addEventListener("scroll", function() {
      const nav = document.getElementById("mainNav");
      if (window.scrollY > 50) {
        nav.classList.add("navbar-scrolled");
        nav.classList.remove("navbar-transparent");
      } else {
        nav.classList.add("navbar-transparent");
        nav.classList.remove("navbar-scrolled");
      }
    });
 document.addEventListener("DOMContentLoaded", function(){
    const box = document.getElementById("scrollBox");
    const content = document.getElementById("scrollContent");
    let step = 0.1;  // kecepatan
    const interval = 5; // jeda

    setInterval(function(){
        box.scrollLeft += step;
        // Jika sudah habis setengah konten, reset ke awal agar loop mulus
        if (box.scrollLeft >= content.scrollWidth/2) {
            box.scrollLeft = 0;
        }
    }, interval);
});
  </script>
</body>
</html>
