@extends('admin.template')

@section('content')
<div class="container">
    <h2>Edit Data Siswa</h2>

    <form action="{{ route('siswa.update', Crypt::encrypt($siswa->id)) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>NISN</label>
            <input type="text" name="nisn" value="{{ $siswa->nisn }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Siswa</label>
            <input type="text" name="nama_siswa" value="{{ $siswa->nama ?? $siswa->nama_siswa }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Tahun Masuk</label>
            <input type="number" name="tahun_masuk" value="{{ $siswa->tahun_masuk }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.siswa') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
