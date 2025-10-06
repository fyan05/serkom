@extends('admin.template')
@section('content')
<div class="container">
    <h2 class="mb-3">Daftar Profile Sekolah</h2>
    <a href="{{ route('admin.profile.create') }}" class="btn btn-primary mb-3">Tambah Profile</a>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Sekolah</th>
                <th>Kepala Sekolah</th>
                <th>NPSN</th>
                <th>Kontak</th>
                <th>Tahun Berdiri</th>
                <th>Logo</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $index => $profile)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $profile->nama_sekolah }}</td>
                    <td>{{ $profile->kepala_sekolah }}</td>
                    <td>{{ $profile->npsn }}</td>
                    <td>{{ $profile->kontak }}</td>
                    <td>{{ $profile->tahun_berdiri }}</td>
                    <td>
                        @if($profile->logo)
                            <img src="{{ asset('storage/'.$profile->logo) }}" width="60">
                        @endif
                    </td>
                    <td>
                        @if($profile->foto)
                            <img src="{{ asset('storage/'.$profile->foto) }}" width="60">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.profile.edit', $profile->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
