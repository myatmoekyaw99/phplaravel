@extends('layout.app')
@section('title', 'Subject')
@section('content')
<div class='container bg-light'>
    <h1>Edit Students</h1>

    <form action="/students/{{$s->id}}" method="POST" >
        @csrf
        <input type="hidden" name="_method" value="PUT">
    <div class="form-group row">
        <label for="name" class="col-sm-1 col-form-label">Name : </label>
        <div class="col-sm-11">
            <input type="text" id="name" name="name" class="form-control" value="{{$s->name}}" class="@error('name') is-required @enderror">
        </div>
    </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row">
        <label for="rolno" class="col-sm-1 col-form-label">Roll No : </label>
        <div class="col-sm-11">
            <input type="text" id="rolno" name="rolno" class="form-control" value="{{$s->rollno}}" class="@error('rolno') is-required @enderror">
        </div>
    </div>
    @error('rolno')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row">
        <label for="gender" class="col-sm-1 col-form-label">Gender : </label>
        <div class="col-sm-11">
            <select class="form-control" id="gender" name="gender" value="{{$s->gender}}" class="@error('email') is-required @enderror">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
    </div>
    @error('gender')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row">
        <label for="phone" class="col-sm-1 col-form-label">Phone : </label>
        <div class="col-sm-11">
            <input type="text" id="phone" name="phone" class="form-control" value="{{$s->phone}}" class="@error('phone') is-required @enderror">
        </div>
    </div>
    @error('phone')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row">
        <label for="email" class="col-sm-1 col-form-label">E-mail : </label>
        <div class="col-sm-11">
            <input type="text" id="email" name="email" class="form-control" value="{{$s->email}}" class="@error('email') is-required @enderror">
        </div>
    </div>
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <div class="form-group row">
        <label for="address" class="col-sm-1 col-form-label">Address : </label>
        <div class="col-sm-11">
        <textarea class="form-control rounded-0" id="address" name="address" rows="3" class="@error('address') is-required @enderror" >{{$s->address}}</textarea>
        </div>
    </div>
    @error('address')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group row">
        <label for="select" class="col-sm-1 col-form-label">Grade : </label>
        <div class="col-sm-11">
        <select class="form-control" id="select" name="select" class="@error('select') is-required @enderror">
        <option selected disabled>Choose Grade</option>
        @foreach($sub as $p) 
       
        <option value="{{$p->id}}"
           @if($p->id==$s->grade_id)
           selected = "selected";
           @endif
       >{{$p->name}}</option>

        @endforeach
    </select>
        </div>
    </div>
    @error('select')
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