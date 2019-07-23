@extends('layout')

@section('content')

<div class="row">
<div class="col-lg-6 col-lg-offset-3">
     <form action="/create/todo" method="post">
     {{ csrf_field() }}
     <input type="text" class="form-control input-lg" placeholder="Create a new todo" name="todo">
     </form>   
</div>
</div>
<hr>

@foreach($todos as $v)

    {{ $v->todo }} 
    <a href="/todo/delete/{{ $v->id }}" class="btn btn-danger">x</a>
    <a href="/todo/update/{{ $v->id }}" class="btn btn-info btn-xs">Update</a>

    @if(!$v->completed)

    <a href="/todo/completed/{{ $v->id }}" class="btn btn-success btn-xs">Mark as completed</a>
    @else
        <span class="text-Success">Completed!</span>


    @endif
    
    <hr>


@endforeach

@stop