@extends('admin.template')
@section('content')

{{-- Statistik singkat --}}
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card shadow-sm text-center p-3">
            <i class="fa-solid fa-user-graduate fa-2x text-primary mb-2"></i>
            <h4>{{ $siswa->count() }}</h4>
            <p>Total Students</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm text-center p-3">
            <i class="fa-solid fa-chalkboard-teacher fa-2x text-success mb-2"></i>
            <h4>{{ $guru->count() }}</h4>
            <p>Total Teachers</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm text-center p-3">
            <i class="fa-solid fa-basketball-ball fa-2x text-warning mb-2"></i>
            <h4>{{ $eks->count() }}</h4>
            <p>Total Extracurriculars</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm text-center p-3">
            <i class="fa-solid fa-images fa-2x text-danger mb-2"></i>
            <h4>{{ $galeri->count() }}</h4>
            <p>Total Galleries</p>
        </div>
    </div>
</div>

{{-- Tabel Guru --}}
<div class="card shadow-sm mb-4">
    <div class="card-header">
        <h5>Daftar Guru</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Mata Pelajaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($guru as $index => $g)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <img src="{{ $g->foto ? asset('storage/fotoguru/'.$g->foto) : 'https://i.pravatar.cc/40?img='.$index }}" class="rounded-circle" alt="" width="40" style="object-fit: cover; height: 40px;">
                    </td>
                    <td>{{ $g->nama_guru }}</td>
                    <td>{{ $g->mapel }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Tabel Siswa --}}
<div class="card shadow-sm mb-4">
    <div class="card-header">
        <h5>Daftar Siswa</h5>
    </div>
    <div class="table-responsive">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Tahun Masuk</th>
                    <th>Jenis Kelamin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $index => $s)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        <img src="{{ $s->foto ? asset('storage/siswa/'.$s->foto) : 'https://i.pravatar.cc/40?img='.$index }}" class="rounded-circle" alt="" width="40">
                    </td>
                    <td>{{ $s->nama_siswa }}</td>
                    <td>{{ $s->tahun_masuk }}</td>
                    <td>{{ $s->jenis_kelamin }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Daftar Ekstrakurikuler --}}
<div class="card shadow-sm mb-4">
    <div class="card-header">
        <h5>Ekstrakurikuler</h5>
    </div>
    <div class="card-body">
        <ul>
            @foreach($eks as $e)
            <li>{{ $e->nama_eskul }} - {{ $e->jadwal }}</li>
            @endforeach
        </ul>
    </div>
</div>


@endsection
