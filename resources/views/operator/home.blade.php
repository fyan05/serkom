@extends('admin.template')
@section('content')
<div class="row g-3 mb-4">
    @csrf
    <div class="col-md-3">
        <div class="card shadow-sm text-center p-3">
            <i class="fa-solid fa-user-graduate fa-2x text-primary mb-2"></i>
            <h4>35,000</h4>
            <p>Total Students</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm text-center p-3">
            <i class="fa-solid fa-file-alt fa-2x text-success mb-2"></i>
            <h4>19,050</h4>
            <p>Total Exams</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm text-center p-3">
            <i class="fa-solid fa-graduation-cap fa-2x text-warning mb-2"></i>
            <h4>23,890</h4>
            <p>Graduate Studies</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm text-center p-3">
            <i class="fa-solid fa-dollar-sign fa-2x text-danger mb-2"></i>
            <h4>$21,020,50</h4>
            <p>Total Income</p>
        </div>
    </div>
</div>

{{-- Tabel My Students --}}
<div class="card shadow-sm">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">My Students</h5>
        <div class="d-flex">
            <input type="text" class="form-control me-2" placeholder="Search by Name">
            <button class="btn btn-primary"><i class="fa-solid fa-search"></i></button>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>Roll</th><th>Photo</th><th>Name</th><th>Gender</th>
                    <th>Class</th><th>Section</th><th>Parents</th>
                    <th>Address</th><th>Date Of Birth</th><th>Phone</th><th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                @for($i=1;$i<=10;$i++)
                <tr>
                    <td>#{{sprintf("%04d",$i)}}</td>
                    <td><img src="https://i.pravatar.cc/40?img={{$i}}" class="rounded-circle" alt=""></td>
                    <td>Mark Willy</td>
                    <td>Male</td>
                    <td>2</td>
                    <td>A</td>
                    <td>Jack Sparrow</td>
                    <td>TA-107 Newyork</td>
                    <td>02/05/2001</td>
                    <td>+123 9988568</td>
                    <td>email@example.com</td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>

@endsection
