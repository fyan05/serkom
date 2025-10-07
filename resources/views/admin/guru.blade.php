@extends('admin.template')
@section('content')
<div class="container">
        <h2>Daftar Guru</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <a href="{{ route('admin.guru.create') }}" class="btn btn-primary mb-3">+ Tambah Guru</a>
 <div class="bg-light p-3 rounded">
        <div class="table-responsive min-vh-100">
            <table id="example" class="table table-bordered w-100">
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
    </div>
</div>
<!-- Pastikan sudah mengimpor DataTables dan plugin responsive di template Anda -->
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

<script>
$(document).ready(function() {
    $('#example').DataTable({
        responsive: true
    });
});
</script>
@endsection
