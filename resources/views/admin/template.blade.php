<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Meta tags dan link CSS --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/v/dt/dt-2.0.2/datatables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.0/js/responsive.bootstrap5.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/3.0.0/css/responsive.bootstrap5.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('bootstrap1/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/fontawesome-free-6.7.2-web/css/all.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Sekolah Ciputra</title>
    <style>
        /* {{-- CSS custom untuk layout dan sidebar --}} */
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        .sidebar {
            background-color: #343a40;
            min-height: 100vh;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        @media (max-width: 991.98px) {
            .sidebar {
                min-height: auto;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        {{-- Tombol toggle sidebar untuk mobile --}}
        <nav class="navbar navbar-dark bg-dark d-md-none">
            <div class="container-fluid">
            <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
                <i class="fas fa-bars"></i>
            </button>
            <span class="navbar-brand mx-auto fw-bold">
                <i class="fas fa-school me-2"></i>
                SMK YPC Tasikmalaya
            </span>
            </div>
        </nav>
        {{-- Sidebar desktop --}}
        <nav class="col-md-2 sidebar d-none d-md-block position-fixed">
            <div class="py-4 text-center">
                <h4 class="text-white">
                    <i class="fas fa-school me-2"></i>
                    SMK YPC Tasikmalaya
                </h4>
            </div>
            <ul class="navbar-nav me-auto">
                {{-- Menu sidebar desktop --}}
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link d-flex align-items-center" href="/admin/home">
                        <i class="fas fa-home me-2" style="font-size: 1rem;"></i>
                        Dashboard
                    </a>
                </li>
                {{-- ...menu lainnya... --}}
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link d-flex align-items-center" href="{{ route('users.index') }}">
                        <i class="fas fa-user me-2" style="font-size: 1rem;"></i>
                        User
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link d-flex align-items-center" href="{{ route('admin.siswa') }}">
                        <i class="fas fa-users me-2" style="font-size: 1rem;"></i>
                        Daftar Siswa
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link d-flex align-items-center" href="{{route('admin.guru')}}">
                        <i class="fas fa-user-tie me-2" style="font-size: 1rem;"></i>
                        Daftar Guru
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link d-flex align-items-center" href="{{ route('admin.berita') }}">
                        <i class="fas fa-newspaper me-2" style="font-size: 1rem;"></i>
                        Berita
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link d-flex align-items-center" href="{{ route('admin.profile') }}">
                        <i class="fas fa-school me-2" style="font-size: 1rem;"></i>
                        Porfile
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link d-flex align-items-center" href="{{ route('admin.ekstrakulikuler') }}">
                        <i class="fas fa-futbol me-2" style="font-size: 1rem;"></i>
                        Ekstrakurikuler
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link d-flex align-items-center" href="{{ route('admin.galeri') }}">
                        <i class="fas fa-images me-2" style="font-size: 1rem;"></i>
                        Galeri
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a class="nav-link d-flex align-items-center" href="{{ route('admin.logout') }}">
                        <i class="fas fa-sign-out-alt me-2" style="font-size: 1rem;"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </nav>
        {{-- Sidebar mobile (offcanvas) --}}
        <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="offcanvasSidebar" aria-labelledby="offcanvasSidebarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-dark" id="offcanvasSidebarLabel"><i class="fas fa-school me-2"></i>Sekolah Ciputra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body p-0">
                <ul class="navbar-nav me-auto">
                    {{-- Menu sidebar mobile --}}
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link d-flex align-items-center" href="/admin/home">
                            <i class="fas fa-home me-2" style="font-size: 1rem;"></i>
                            Dashboard
                        </a>
                    </li>
                    {{-- ...menu lainnya... --}}
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link d-flex align-items-center" href="{{ route('users.index') }}">
                            <i class="fas fa-user me-2" style="font-size: 1rem;"></i>
                            User
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link d-flex align-items-center" href="{{ route('admin.siswa') }}">
                            <i class="fas fa-users me-2" style="font-size: 1rem;"></i>
                            Daftar Siswa
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link d-flex align-items-center" href="{{route('admin.guru')}}">
                            <i class="fas fa-user-tie me-2" style="font-size: 1rem;"></i>
                            Daftar Guru
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link d-flex align-items-center" href="{{ route('admin.berita') }}">
                            <i class="fas fa-newspaper me-2" style="font-size: 1rem;"></i>
                            Berita
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link d-flex align-items-center" href="{{ route('admin.profile') }}">
                            <i class="fas fa-school me-2" style="font-size: 1rem;"></i>
                            Porfile
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link d-flex align-items-center" href="{{ route('admin.ekstrakulikuler') }}">
                            <i class="fas fa-futbol me-2" style="font-size: 1rem;"></i>
                            Ekstrakurikuler
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link d-flex align-items-center" href="{{ route('admin.galeri') }}">
                            <i class="fas fa-images me-2" style="font-size: 1rem;"></i>
                            Galeri
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a class="nav-link d-flex align-items-center" href="{{ route('admin.logout') }}">
                            <i class="fas fa-sign-out-alt me-2" style="font-size: 1rem;"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        {{-- Main content --}}
        <main class="col-md-10 ms-sm-auto px-4 py-4 offset-md-2">
            <h2 class="mb-4">@yield('title')</h2>
            @yield('content')
        </main>
    </div>
</div>
{{-- Footer --}}
<footer class="footer py-3 bg-light mt-auto">
    <div class="container text-center">
        <span>&copy; {{ date('Y') }} SMK YPC Tasikmalaya. Sekolah unggulan</span>
    </div>
</footer>
{{-- Script JS Bootstrap --}}
<script src="{{asset('bootstrap1/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
