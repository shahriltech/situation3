@extends('layouts.main')
@section('content')

	<h1>Edit Task</h1>




<form action="../../listitem/update/{{ $itemmark->id }}" method="post">

      {{ method_field('PATCH')}}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

<div class="form-group">
    <input type="text" name="content" value="{{ $itemmark->content }}">

  </div>

  Last Updated: {{ $itemmark->updated_at }} <br><br>


	<div class="form-group">
        <button type="submit" class="btn btn-primary">Update post</button> <!-- name based on the  table field  -->

      </div>
</form>


	<p>{{ link_to_route('todos.show','back',array($itemmark->id))}}</p>


  @if(count($errors))
        <ul>
          @foreach($errors->all() as $error)
          <li> <font color="red">{{ $error }}</font></li>
          @endforeach
        </ul>
      @endif

@if (session('status'))
    <div class="alert alert-success">
        <font color="green">{{ session('status') }}</font>
    </div>
@endif


@stop