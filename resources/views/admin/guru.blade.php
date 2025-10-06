@extends('admin.template')
@section('content')
<div class="container">
        <h2>Daftar Guru</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.guru.create') }}" class="btn btn-primary mb-3">+ Tambah Guru</a>

        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Mapel</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($guru as $i => $guru)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $guru->nama_guru }}</td>
                    <td>{{ $guru->nip }}</td>
                    <td>{{ $guru->mapel }}</td>
                    <td>
                        @if($guru->foto)
                            <img src="{{ asset('storage/fotoguru/' . $guru->foto) }}" width="70" alt="Foto Guru">
                        @else
                            <span class="text-muted">Tidak ada</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.guru.edit', $guru->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.guru.delete', $guru->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
