@extends('operator.template')
{{-- Menggunakan template utama admin --}}

@section('content')
<div class="container py-4">

    {{-- 🔹 Header halaman --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0">
            <i class="bi bi-megaphone-fill text-primary me-2"></i> Daftar Berita
        </h2>
        <a href="{{ route('operator.berita.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle"></i> Tambah Berita
        </a>
    </div>

    {{-- 🔹 Cek apakah ada data berita --}}
    @if ($beritas->count() > 0)

        {{-- 🔹 Grid Bootstrap: tampilkan berita dalam kolom --}}
        <div class="row g-4">
            @foreach ($beritas as $berita)
                <div class="col-md-6 col-lg-4 col-xl-3">

                    {{-- 🔹 Card berita (klik card untuk buka modal detail) --}}
                    <div class="card border-0 shadow-sm h-100 hover-card"
                         style="cursor:pointer"
                         data-bs-toggle="modal"
                         data-bs-target="#beritaModal{{ $berita->id }}">

                        {{-- 🔸 Menampilkan foto berita --}}
                        @if ($berita->foto && file_exists(public_path('storage/' . $berita->foto)))
                            <img src="{{ asset('storage/' . $berita->foto) }}"
                                 class="card-img-top rounded-top"
                                 alt="{{ $berita->judul }}"
                                 style="height: 180px; object-fit: cover;">
                        @else
                            {{-- 🔸 Jika tidak ada foto, tampilkan placeholder --}}
                            <img src="https://via.placeholder.com/400x200?text=No+Image"
                                 class="card-img-top rounded-top"
                                 alt="No Image"
                                 style="height: 180px; object-fit: cover;">
                        @endif

                        {{-- 🔸 Isi singkat berita --}}
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-1">{{ $berita->judul }}</h5>
                            <small class="text-muted d-block mb-2">
                                {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                                | by {{ $berita->user->name ?? 'Admin'??'Operator' }}
                            </small>
                            <p class="card-text text-secondary">{{ Str::limit($berita->isi, 100) }}</p>
                        </div>

                        {{-- 🔸 Tombol Edit dan Hapus --}}
                        <div class="card-footer bg-white border-0 d-flex justify-content-between">
                            <a href="{{ route('operator.berita.edit', $berita->id) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('operator.berita.delete', $berita->id) }}" method="POST" onsubmit="return confirm('Yakin hapus berita ini?')">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- 🔹 Modal detail berita (pop-up) --}}
                <div class="modal fade" id="beritaModal{{ $berita->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $berita->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content border-0 shadow-lg">
                            <div class="modal-header bg-primary text-white">
                                <h5 class="modal-title" id="modalLabel{{ $berita->id }}">
                                    <i class="bi bi-newspaper me-2"></i> {{ $berita->judul }}
                                </h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">
                                {{-- 🔸 Gambar besar --}}
                                @if ($berita->foto && file_exists(public_path('storage/berita/' . $berita->foto)))
                                    <img src="{{ asset('storage/' . $berita->foto) }}"
                                         class="img-fluid rounded mb-3"
                                         alt="{{ $berita->judul }}">
                                @endif

                                {{-- 🔸 Info tanggal dan penulis --}}
                                <p class="text-muted mb-2">
                                    <i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                                    | <i class="bi bi-person-circle"></i> {{ $berita->user->name ?? 'Admin'??'operator' }}
                                </p>

                                {{-- 🔸 Isi lengkap berita --}}
                                <p style="text-align: justify;">{{ $berita->isi }}</p>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Akhir Modal --}}
            @endforeach
        </div>

        {{-- 🔹 Pagination --}}
        <div class="mt-4">
            {{ $beritas->links() }}
        </div>

    @else
        <div class="alert alert-info">Belum ada berita yang ditambahkan.</div>
    @endif
</div>

{{-- 🔹 Efek hover untuk card --}}
<style>
.hover-card {
    transition: all 0.3s ease;
}
.hover-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.15);
}
</style>
@endsection
