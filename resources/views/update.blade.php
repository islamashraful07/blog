@extends('layout')

@section('content')

<div class="row">
<div class="col-lg-16 ">
     <form action="/todo/save/{{  $todo->id  }}" method="post">
     {{ csrf_field() }}
     <input type="text" class="form-control input-lg" value="{{ $todo->todo }}" placeholder="Create a new todo" name="todo">
     </form>   
</div>
</div>
<hr>

@stop