@extends('layouts.app')

@section('content')
<div class="container mt-3">
  <h2>Laravel 6 AJAX Students CRUD Tutorial</h2>
             
             <a href="{{route('students.create')}}"  class="btn btn-primary float-right" >
  Add New Student
</a>
             <div class="clearfix"></div>
             @if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }} mt-2"><button type="button" class="close" data-dismiss="alert">&times;</button> {{ Session::get('success') }}</p>
@endif
  <table class="table table-striped mt-5">
    <thead>
      <tr>
        <th>S.No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Location</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody id="studData">
    @forelse($students as $student)
      <tr id="stud{{$student->id}}">

        <td>{{$student->id}}</td>
        <td>{{$student->name}}</td>
        <td>{{$student->email}}</td>
        <td>{{$student->location}}</td>
        <td><a href="{{route('students.edit',['student'=>$student->id])}}"   class="btn btn-warning editBtn">Edit</a> 

<form method="POST" action="{{route('students.destroy',['student'=>$student->id])}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}

       
            <input type="submit" class="btn btn-danger mt-2" value="Delete">
     
    </form>
          </tr>
      @empty
      <tr id='noStudData'><td colspan="5" class="text-center">Sorry No Students</td></tr>
      @endforelse
    </tbody>
  </table>
  {{ $students->links() }}
</div>
@endsection

@section('scripts')

@endsection