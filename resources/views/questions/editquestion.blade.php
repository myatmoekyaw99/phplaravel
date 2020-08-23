@extends('layout.app')
@section('title', 'Subject')
@section('content')
<div class='container bg-light'>
    <h1>Edit Question</h1>

    <form action="/questions/{{$s->id}}" method="POST" >
        @csrf
        <input type="hidden" name="_method" value="PUT">
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name : </label>
        <div class="col-sm-10">
        <textarea class="form-control rounded-0" id="name" name="name" rows="3" class="@error('name') is-required @enderror">{{$s->question_name}}</textarea>
        </div>
    </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row">
        <label for="mark" class="col-sm-2 col-form-label">Total Mark : </label>
        <div class="col-sm-10">
            <input type="text" id="mark" name="mark" class="form-control"  value="{{$s->mark}}" class="@error('mark') is-required @enderror">
        </div>
    </div>
    @error('mark')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row">
        <div class="col-sm-10 offset-sm-1">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
    </form>
</div>
@endsection 
@if(session('status'))
<p class="alert alert-success">{{session('status')}}</p>
@endif