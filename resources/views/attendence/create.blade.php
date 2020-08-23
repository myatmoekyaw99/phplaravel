@extends('layout.app')
@section('title', 'Result')
@section('content')
<div class='container bg-light'>
    <h1>Create Attecdence</h1>

    <form action="/attendence" method="POST" >
        @csrf

        <ol type="1">
            @foreach($student as $q)
                <li class="font-weight-bold">
                <div class="form-group row">
                <div class="col-sm-3">
                    <label for="student" name="student" class="font-weight-bold">{{$q->name}}
                    <input type="hidden" name="attlist[{{$loop->index}}][student_id]" value="{{$q->student_id}}"/>
                    </label>
                </div>

                <div class="col-sm-3">
                    <select class="form-control" id="attend" name="attend" class="@error('attend') is-required @enderror">
                        <option selected disabled>Choose Attendence</option>
                        <option value="Present">Present</option>
                        <option value="Absent">Absent</option>
                    </select>
                    @error('attend')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-sm-3">
                    <input type="date" class="form-control" name="d" class="@error('d') is-required @enderror">
                    @error('d')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror                   
                </div>
                </div>
                </li>
            @endforeach 
        </ol>
    
    <div class="form-group float-right">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
@endsection 
@if(session('status'))
<p class="alert alert-success">{{session('status')}}</p>
@endif