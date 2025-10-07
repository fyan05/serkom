@extends('admin.template')

@section('content')
<div class="container mt-4">
    <div class="card shadow-lg p-4">
        <h3 class="mb-4 text-center">Tambah User Baru</h3>

        {{-- Form Create User --}}
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            {{-- Username --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Username</label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                @error('username')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control" required>
                @error('password')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Role --}}
            <div class="mb-3">
                <label class="form-label fw-bold">Role</label>
                <select name="role" class="form-select" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>Operator</option>
                </select>
                @error('role')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            {{-- Tombol --}}
            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan User</button>
            </div>
        </form>
    </div>
</div>
@endsection
