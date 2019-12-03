@extends('layouts.app')

@section('content')
<div class="container mt-3">
  <h2>Laravel 6 Students CRUD Tutorial</h2>
             
            
             <div class="clearfix"></div>

@if(Session::has('errors'))

  @foreach($errors->all() as $value)
  <p class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert">&times;</button> {{$value}}</p>
  @endforeach

@endif

@if(Session::has('success'))
<p class="alert {{ Session::get('alert-class', 'alert-success') }}"><button type="button" class="close" data-dismiss="alert">&times;</button> {{ Session::get('success') }}</p>
@endif
  <form action="{{route('students.store')}}" method="post" >
        @csrf
              <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="create-name" name="name" placeholder='Enter Student Name' value="{{ old('name') }}">
              </div>
              <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="create-email" name="email" placeholder='Enter Student Email' value="{{ old('email') }}">
              </div>
              <div class="form-group">
                <label for="name">Location:</label>
                <input type="text" class="form-control" id="create-location" name="location" placeholder='Enter Student Location' value="{{ old('location') }}">
              </div>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </form>
</div>
@endsection