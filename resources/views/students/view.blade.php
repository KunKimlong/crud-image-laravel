@extends('students.master')

@section('title')
    View-Student
@endsection

@section('content-title')
    <h1 class="text-center">View Student</h1>
@endsection

@section('content')
{{-- {{$students}} --}}
    <div class="container">
        <table class="table align-middle table-hover table-dark text-center-align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Score1</th>
                    <th>Score2</th>
                    <th>Score3</th>
                    <th>Total</th>
                    <th>Average</th>
                    <th>Grade</th>
                    <th>Profile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($students as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->gender}}</td>
                        <td>{{$item->score1}}</td>
                        <td>{{$item->score2}}</td>
                        <td>{{$item->score3}}</td>
                        <td>{{$item->total}}</td>
                        <td>{{$item->average}}</td>
                        <td>{{$item->grade}}</td>
                        <td><img src="{{url('image/'.$item->profile)}}" alt="" width="100px" height="130px"></td>
                        <td>
                            <a href="/update/{{$item->id}}" class="btn btn-warning">Update</a>
                            <button id="btn-delete" remove="{{$item->id}}"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @empty
                    <h1>No Student...!</h1>
                @endforelse
            </tbody>
        </table>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/delete" method="post">
            @csrf
            @method('DELETE')
            <h4>Are you sure that you want to delete?</h4>
            <input type="hidden" name="deleteID" id="remove_id">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>
    </div>
@endsection
