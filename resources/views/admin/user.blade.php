@extends('admin.template')
@section('content')
<div class="container">
    <h2>Data User</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Tambah User</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="bg-light p-3 rounded">
        <div class="table-responsive min-vh-100">
            <table id="example" class="table table-bordered w-100">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>username</th>
                        <th>password</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('users.delete', $user->id) }}" method="POST" class="d-inline">
                                @csrf
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
