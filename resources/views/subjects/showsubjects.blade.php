@extends('layout.app')
@section('title', 'Subject')
@section('content')
    <h1>Show Grade</h1>

    <table class="table table-stripped">
        <thead class="bg-primary">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Grade</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
            <tbody>
            @foreach($sub as $gs)
                <tr><td>{{$gs->id}}</td><td>{{$gs->subject_name}}</td><td>{{$gs->name}}</td>
                <td>
                <form action="/subjects/{{$gs->id}}" method="POST" class="d-inline">
                    @csrf
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" value="Delete"/>&nbsp;&nbsp;&nbsp;
                </form>
                <a class="btn btn-primary" href="/subjects/{{$gs->id}}/edit">Edit</a></td></tr>
            @endforeach
            </tbody>
    </table>
    @if(session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
    @endif
@endsection 