@extends('admin.template')
@section('content')
<div class="container">
    <h2>Tambah User</h2>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="{{ $user->username }}" required>
        </div>

        <div class="mb-3">
            <label>Password (kosongkan jika tidak ingin ubah)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="operator" {{ $user->role == 'operator' ? 'selected' : '' }}>Operator</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>

</div>
@endsection
