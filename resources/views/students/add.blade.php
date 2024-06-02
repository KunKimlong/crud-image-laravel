@extends('students.master')

@section('title')
    Add-Student
@endsection

@section('content-title')
    <h1 class="text-center">Add Student</h1>
@endsection
@section('content')

    @if (Session::has('success'))
    <script>
        Swal.fire({
        title: "Success",
        text: "Student insert sucess",
        icon: "success"
        });
    </script>
    @endif

    @if (Session::has('unsuccess'))
        <script>
            Swal.fire({
            title: "Error",
            text: "Please fill all data",
            icon: "error"
            });
        </script>
    @endif

    <form action="/add" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            <div class="col-12">
                <label for="">Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="col-12">
                <label for="">Gender:</label>
                <select name="gender" id="" class="form-select">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="col-4">
                <label for="">Score1:</label>
                <input type="text" name="score1" class="form-control" placeholder="Score1">
            </div>
            <div class="col-4">
                <label for="">Score2:</label>
                <input type="text" name="score2" class="form-control" placeholder="Score2">
            </div>
            <div class="col-4">
                <label for="">Score3:</label>
                <input type="text" name="score3" class="form-control" placeholder="Score3">
            </div>
            <div class="col-12">
                <label for="">Profile:</label>
                <input type="file" name="profile" class="form-control">
            </div>
            <div class="col-3 mx-auto">
                <button class="btn btn-outline-success w-100 rounded-0">Submit</button>
            </div>
          </div>
    </form>
@endsection
