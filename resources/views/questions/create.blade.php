@extends('layout.app')
@section('title', 'Subject')
@section('content')
<div class='container bg-light'>
    <h1>Create Question</h1>

    <form action="/questions" method="POST" >
        @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name : </label>
        <div class="col-sm-10">
        <textarea class="form-control rounded-0" id="name" name="name" rows="3" class="@error('name') is-required @enderror">
        </textarea>
        </div>
    </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row">
        <label for="mark" class="col-sm-2 col-form-label">Total Mark : </label>
        <div class="col-sm-10">
            <input type="text" id="mark" name="mark" class="form-control" placeholder="Enter total mark" class="@error('mark') is-required @enderror">
        </div>
    </div>
    @error('mark')
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