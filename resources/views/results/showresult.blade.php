@extends('layout.app')
@section('title', 'Result')
@section('content')
    <h1>Show Result</h1>

    <table class="table table-stripped">
        <thead class="bg-primary">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Student</th>
            <th scope="col">Exam</th>
            <th scope="col">Question</th>
            <th scope="col">Answer</th>
            <th scope="col">Mark</th>
            </tr>
        </thead>
            <tbody>
            @foreach($result as $r)
                <tr>
                <td>{{$r->id}}</td>
                @foreach($stu as $s)
                    @if($s->id == $r->student_id)
                        <td>{{$s->name}}</td>             
                    @endif
                @endforeach

                @foreach($exam as $e)
                    @if($e->id == $r->exam_id)
                        <td>{{$e->exam_name}}</td>             
                    @endif
                @endforeach

                @foreach($question as $q)
                    @if($q->id == $r->question_id)
                        <td>{{$q->question_name}}</td>             
                    @endif
                @endforeach

                @foreach($answer as $a)
                    @if($a->id == $r->answer_id)
                        <td>{{$a->answer_name}}</td>             
                    @endif
                @endforeach
                <td>{{$r->mark}}</td>
                </tr>
            @endforeach
            </tbody>
    </table>
    @if(session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
    @endif
@endsection 