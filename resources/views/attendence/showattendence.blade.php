@extends('layout.app')
@section('title', 'Attendence')
@section('content')
    <h1>Show Attendence</h1>

    <table class="table table-stripped">
        <thead class="bg-primary">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Attendence</th>
            <th scope="col">Date</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
            <tbody>
            <?php $i=1; ?>
            @foreach($sub as $gs)
                <tr><td>{{$i}}</td><td>{{$gs->name}}</td><td>{{$gs->student_attendence}}</td><td>{{$gs->date}}</td>
                <td>
                <form action="/attendence/{{$gs->id}}" method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" value="Delete"/>&nbsp;&nbsp;&nbsp;
                </form>
                <a class="btn btn-primary" href="/attendence/{{$gs->id}}/edit">Edit</a></td></tr>
                <?php $i++; ?>
            @endforeach
            </tbody>
    </table>
    @if(session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
    @endif
@endsection 