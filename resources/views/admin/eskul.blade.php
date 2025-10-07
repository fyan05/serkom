@extends('admin.template')
@section('content')
<div class="container">
    <h2>Daftar Ekstrakurikuler</h2>
    <a href="{{ route('admin.ekstrakulikuler.add') }}" class="btn btn-primary mb-3">+ Tambah Eskul</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="bg-light p-3 rounded">
        <div class="table-responsive min-vh-100">
            <table id="example" class="table table-bordered w-100">
                <thead class="table-light">
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
                                <a href="{{ route('admin.ekstrakuliker.edit', Crypt::encrypt($eskul->id))}}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.ekstrakulikuler.delete',Crypt::encrypt($eskul->id))}}" method="POST" style="display:inline-block">
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
  </div>
</div>
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
