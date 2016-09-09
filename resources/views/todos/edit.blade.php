@extends('layouts.main')
@section('content')

<h1> Update To Do List</h1>

<form action="../../todos/update/{{ $list->id }}" method="post">

      {{ method_field('PATCH')}}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <input type="text" name="name" value="{{ $list->name }}">

  </div>

  Last Updated: {{ $list->updated_at }} <br><br>


	<div class="form-group">
        <button type="submit" class="btn btn-primary">Update post</button> <!-- name based on the  table field  -->

      </div>
</form>

	@if(count($errors))
        <ul>
          @foreach($errors->all() as $error)
          <li> <font color="red">{{ $error }}</font></li>
          @endforeach
        </ul>
      @endif

@stop