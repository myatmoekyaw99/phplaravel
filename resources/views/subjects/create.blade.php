@extends('layout.app')
@section('title', 'Subject')
@section('content')
<div class='container bg-light'>
    <h1>Create Subject</h1>

    <form action="/subjects" method="POST" >
        @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-1 col-form-label">Name : </label>
        <div class="col-sm-11">
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter subject name" class="@error('name') is-required @enderror">
        </div>
    </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row">
        <label for="select" class="col-sm-1 col-form-label">Grade : </label>
        <div class="col-sm-11">
        <select class="form-control" id="select" name="select" class="@error('select') is-required @enderror">
        <option selected disabled>Choose Grade</option>
    @foreach($sub as $p)
        <option value="{{$p->id}}">{{$p->name}}</option>
    @endforeach
    </select>
        </div>
    </div>
    @error('select')
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