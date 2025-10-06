@extends('admin.template')
@section('content')
<div class="container">
    <h2>Daftar Ekstrakurikuler</h2>
    <a href="{{ route('admin.ekstrakulikuler.add') }}" class="btn btn-primary mb-3">+ Tambah Eskul</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Ekstrakurikuler</th>
                <th>Pembina</th>
                <th>Jadwal</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($eskuls as $i => $eskul)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $eskul->nama_eskul }}</td>
                <td>{{ $eskul->pembina }}</td>
                <td>{{ $eskul->jadwal }}</td>
                <td>{{ Str::limit($eskul->deskripsi, 50) }}</td>
                <td>
                    @if($eskul->foto)
                        <img src="{{ asset('storage/fotoextra/'.$eskul->foto) }}" width="80">
                    @else
                        <span class="text-muted">-</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('admin.ekstrakuliker.edit', $eskul->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.ekstrakulikuler.delete', $eskul->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
