@extends('students.master')

@section('title')
    update-Student
@endsection

@section('content-title')
    <h1 class="text-center">Update Student</h1>
@endsection
@section('content')

    <form action="/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <input type="hidden" name="update_id" value="{{$student->id}}"  id="">
            <div class="col-12">
                <label for="">Name:</label>
                <input type="text" value="{{$student->name}}" name="name" class="form-control" placeholder="Name">
            </div>
            <div class="col-12">
                <label for="">Gender:</label>
                <select name="gender" id="" class="form-select">
                    <option value="Male" @if ($student->gender == "Male") selected @endif>Male</option>
                    <option value="Female" @if ($student->gender == "Female") selected @endif>Female</option>
                </select>
            </div>
            <div class="col-4">
                <label for="">Score1:</label>
                <input type="text" value="{{$student->score1}}" name="score1" class="form-control" placeholder="Score1">
            </div>
            <div class="col-4">
                <label for="">Score2:</label>
                <input type="text" value="{{$student->score2}}" name="score2" class="form-control" placeholder="Score2">
            </div>
            <div class="col-4">
                <label for="">Score3:</label>
                <input type="text" value="{{$student->score3}}" name="score3" class="form-control" placeholder="Score3">
            </div>
            <div class="col-12">
                <label for="">Profile:</label>
                <input type="file" name="profile" class="form-control">
                <img src="{{url('image/'.$student->profile)}}" alt="" width="100px" height="130px">
                <input type="hidden" name="old_profile" value="{{$student->profile}}" id="">
            </div>
            <div class="col-3 mx-auto">
                <button class="btn btn-outline-success w-100 rounded-0">Update</button>
            </div>
          </div>
    </form>
@endsection
