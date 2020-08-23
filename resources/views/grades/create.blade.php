@extends('layout.app')
@section('title', 'Grade')
@section('content')
<div class='container bg-light'>
    <h1>Create Grade</h1>

    <form action="/grades" method="POST" >
        @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-1 col-form-label">Name : </label>
        <div class="col-sm-11">
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter grade name" class="@error('name') is-required @enderror">
        </div>
    </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-1">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>
</div>
@endsection 
@if(session('status'))
<p class="alert alert-success">{{session('status')}}</p>
@endif