@extends('layout.app')
@section('title', 'Result')
@section('content')
<div class='container bg-light'>
    <h1>Create Result</h1>

    <form action="/results" method="POST" >
        @csrf

    <div class="form-group row">
        <label for="student" class="col-sm-1 col-form-label">Student : </label>
        <div class="col-sm-5">
        <select class="form-control" id="student" name="student" class="@error('question') is-required @enderror">
        <option selected disabled>Choose student</option>
    @foreach($stu as $p)
        <option value="{{$p->id}}">{{$p->name}}</option>
    @endforeach
    </select>
        </div>
    <!-- </div> -->
    @error('student')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <!-- <div class="form-group row"> -->
        <label for="exam" class="col-sm-1 col-form-label">Student : </label>
        <div class="col-sm-5">
        <select class="form-control" id="exam" name="exam" class="@error('exam') is-required @enderror">
        <option selected disabled>Choose exam</option>
    @foreach($exam as $p)
        <option value="{{$p->id}}">{{$p->exam_name}}</option>
    @endforeach
    </select>
        </div>
    </div>
    @error('student')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br><br>
    <div class="form-group">
        <?php $i=0; ?>
        <ol type="1">
            @foreach($question as $q)
                <li>
                    <label for="question" name="question">{{$q->question_name}}
                    <input type="hidden" name="result[{{$loop->index}}][question_id]" value="{{$q->question_id}}"/>
                    </label>
                </li>
                <div class="form-group">
                    <ol type="a">
                        @foreach($answer as $a)
                            @if($a->question_id == $q->question_id)
                            <li>
                                <input type="radio" id="answer" name="result[{{$i}}][answer_id]" value="{{$a->answer_id}}"/>
                                <label for="answer">
                                    {{$a->answer_name}}
                                </label>
                            </li>
                            @endif
                        @endforeach
                    </ol>
                    <?php $i++; ?>
                </div>
            @endforeach 
        </ol>
    </div>
    <div class="form-group float-right">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
    </form>
</div>
@endsection 
@if(session('status'))
<p class="alert alert-success">{{session('status')}}</p>
@endif