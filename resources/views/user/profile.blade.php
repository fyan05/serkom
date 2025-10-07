@extends('user.template')

@section('content')
{{-- HERO HEADER --}}
<div id="home" class="container-fluid hero-header"
     style="background: url('{{ asset('asset/foto/Quality Restoration-Ultra HD-welcomesmkypc-scaled.jpeg') }}') center center/cover no-repeat;">
    <div class="container hero-header-inner"
         style="background: rgba(0,0,0,0.4); border-radius: 10px; padding: 50px 20px;">
        <div class="row">
            <div class="col-12 col-lg-7 text-center text-lg-start text-white">
                <h1 class="display-4 mb-3">Profile Sekolah<h1>
                <p class="fs-5">SMK YPC Tasikmalaya</p>
            </div>
        </div>
    </div>
</div>

{{-- INFORMASI SEKOLAH --}}
<div class="container my-5">

    {{-- Kartu Informasi Sekolah --}}
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <div class="row g-0">
            {{-- Gambar Samping --}}
            <div class="col-lg-5">
                <img src="{{ asset('asset/foto/Quality Restoration-Ultra HD-smks-ypc-tasikmalaya (1).jpeg') }}"
                     alt="Foto Sekolah"
                     class="img-fluid h-100 object-fit-cover">
            </div>

            {{-- Isi Informasi --}}
            <div class="col-lg-7 p-4 p-lg-5 bg-light">
                <h4 class="fw-semibold mb-4 text-primary">Informasi Sekolah</h4>

                <table class="table table-bordered align-middle">
                    <tbody>
                        <tr>
                            <th style="width: 30%;">Nama Sekolah</th>
                            <td>{{ $profil->nama_sekolah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tahun Berdiri</th>
                            <td>{{ $profil->tahun_berdiri ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Kepala Sekolah</th>
                            <td>{{ $profil->kepala_sekolah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $profil->alamat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Kontak</th>
                            <td>{{ $profil->kontak ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- VISI & MISI --}}
    <div class="card shadow-sm border-0 rounded-4 mt-5">
        <div class="card-body p-4">
            <h4 class="fw-semibold text-center text-primary mb-4">Visi & Misi</h4>

            @php
                $visi = '';
                $misi = [];
                if(!empty($profil->visi_misi)){
                    $parts = explode('Misi:', $profil->visi_misi);
                    $visi = trim(str_replace('Visi:', '', $parts[0]));
                    if(isset($parts[1])){
                        $misi = array_map('trim', explode("\n", $parts[1]));
                        $misi = array_filter($misi);
                    }
                }
            @endphp
    
            <div class="mb-3">
                <h5 class="fw-semibold">Visi:</h5>
                <p class="text-muted">{{ $visi ?: 'Belum ada visi.' }}</p>
            </div>

            <div>
                <h5 class="fw-semibold">Misi:</h5>
                @if(!empty($misi))
                    <ul class="text-muted">
                        @foreach($misi as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Belum ada misi.</p>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection
