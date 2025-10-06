@extends('admin.template')

@section('content')
<div class="container">
    <h2>Tambah Siswa</h2>

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>NISN</label>
            <input type="text" name="nisn" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Siswa</label>
            <input type="text" name="nama_siswa" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Tahun Masuk</label>
            <input type="number" name="tahun_masuk" class="form-control" required placeholder="Contoh: 2023">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.siswa') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
