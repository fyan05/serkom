@extends('operator.template')
@section('content')
    <div class="container">
        <h2>Edit Guru</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('operator.guru.update', $guru->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Nama Guru</label>
                <input type="text" name="nama_guru" class="form-control" value="{{ old('nama_guru', $guru->nama_guru) }}">
            </div>
            <div class="mb-3">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="{{ old('nip', $guru->nip) }}">
            </div>
            <div class="mb-3">
                <label>Mata Pelajaran</label>
                <input type="text" name="mapel" class="form-control" value="{{ old('mapel', $guru->mapel) }}">
            </div>
            <div class="mb-3">
                <label>Foto</label><br>
                @if($guru->foto)
                    <img src="{{ asset('storage/fotoguru/'.$guru->foto) }}" width="100" class="mb-2"><br>
                @endif
                <input type="file" name="foto" class="form-control">
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
        </form>
    </div>
@endsection
