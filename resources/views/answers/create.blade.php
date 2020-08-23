@extends('layout.app')
@section('title', 'Subject')
@section('content')
<div class='container bg-light'>
    <h1>Create Answer</h1>

    <form action="/answers" method="POST" >
        @csrf
    <div class="form-group row">
        <label for="name" class="col-sm-3 col-form-label">Answer Name : </label>
        <div class="col-sm-9">
        <textarea class="form-control rounded-0" id="name" name="name" rows="2" class="@error('name') is-required @enderror">
        </textarea>
        </div>
    </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row">
        <label for="stat" class="col-sm-3 col-form-label">Status    : </label>
        <div class="col-sm-9">
            <select class="form-control" id="stat" name="stat" class="@error('stat') is-required @enderror">
                <option selected disabled>Choose Status</option>
                <option value=1>True</option>
                <option value=0>False</option>
            </select>
        </div>
    </div>
    @error('stat')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row">
        <label for="question" class="col-sm-3 col-form-label">Question : </label>
        <div class="col-sm-9">
        <select class="form-control" id="question" name="question" class="@error('question') is-required @enderror">
        <option selected disabled>Choose Question</option>
    @foreach($sub as $p)
        <option value="{{$p->id}}">{{$p->question_name}}</option>
    @endforeach
    </select>
        </div>
    </div>
    @error('question')
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