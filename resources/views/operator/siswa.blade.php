@extends('admin.template')

@section('content')
<div class="container">
    <h2>Data Siswa</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">+ Tambah Siswa</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Jenis Kelamin</th>
                <th>Tahun Masuk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($siswa as $key => $item)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->nama_siswa ?? $item->nama }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->tahun_masuk }}</td>
                    <td>
                        <a href="{{ route('siswa.edit', Crypt::encrypt($item->id)) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('siswa.delete', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Data siswa belum ada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
