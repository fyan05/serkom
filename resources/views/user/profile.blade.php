@extends('user.template')

@section('content')
{{-- Hero Header --}}
<div id="home" class="container-fluid hero-header"
     style="background: url('{{ asset('asset/foto/Quality Restoration-Ultra HD-welcomesmkypc-scaled.jpeg') }}') center center/cover no-repeat;">
    <div class="container hero-header-inner" style="background: rgba(0,0,0,0.4); border-radius: 10px; padding: 50px 20px;">
        <div class="row">
            <div class="col-12 col-lg-7 text-center text-lg-start text-white">
                <h1 class="display-4 mb-3">{{ $profil->nama_sekolah ?? 'Nama Sekolah' }}</h1>
                <p class="fs-5">{{ $profil->tahun_berdiri ? 'Didirikan tahun ' . $profil->tahun_berdiri : '' }}</p>
                @if(!empty($profil->deskripsi))
                    <p class="mt-3">{{ $profil->deskripsi }}</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="container my-5">

    {{-- Visi & Misi --}}
    <div class="row mb-5 align-items-center">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
            <h3 class="fw-semibold mb-3">Visi & Misi</h3>
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
            <p><strong>Visi:</strong> {{ $visi ?: 'Belum ada visi.' }}</p>
            <p><strong>Misi:</strong></p>
            <ul>
                @if(!empty($misi))
                    @foreach($misi as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                @else
                    <li>Belum ada misi.</li>
                @endif
            </ul>
        </div>
        <div class="col-lg-6 d-flex justify-content-center mb-3 mb-lg-0">
            <img src="{{ asset('asset/foto/Quality Restoration-Ultra HD-smks-ypc-tasikmalaya (1).jpeg') }}"
                 class="img-fluid rounded shadow" alt="Sekolah" style="max-width: 400px; width: 100%;">
        </div>
    </div>



    {{-- Kontak & Alamat --}}
    <div class="text-center mt-5">
        <h3 class="fw-semibold mb-3">Kontak Kami</h3>
        <p><strong>Alamat:</strong> {{ $profil->alamat ?? '-' }}</p>
        <p><strong>Kepala Sekolah:</strong> {{ $profil->kepala_sekolah ?? '-' }}</p>
        <p><strong>Telepon / Email:</strong> {{ $profil->kontak ?? '-' }}</p>
    </div>
</div>
@endsection
