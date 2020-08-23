@extends('layout.app')
@section('title', 'Subject')
@section('content')
<div class='container bg-light'>
    <h1>Create Exam</h1>

    <form action="/exams" method="POST" >
        @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Name : </label>
        <div class="col-sm-10">
            <input type="text" id="name" name="name" class="form-control" placeholder="Enter exam name" class="@error('name') is-required @enderror">
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
        <label for="select" class="col-sm-2 col-form-label">Subject : </label>
        <div class="col-sm-10">
        <select class="form-control" id="select" name="select" class="@error('select') is-required @enderror">
        <option selected disabled>Choose Subject</option>
    @foreach($sub as $p)
        <option value="{{$p->id}}">{{$p->subject_name}}</option>
    @endforeach
    </select>
        </div>
    </div>
    @error('select')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row">
        <label for="grade" class="col-sm-2 col-form-label">Grade : </label>
        <div class="col-sm-10">
        <select class="form-control" id="grade" name="grade" class="@error('grade') is-required @enderror">
        <option selected disabled>Choose Grade</option>
    @foreach($gd as $g)
        <option value="{{$g->id}}">{{$g->name}}</option>
    @endforeach
    </select>
        </div>
    </div>
    @error('grade')
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