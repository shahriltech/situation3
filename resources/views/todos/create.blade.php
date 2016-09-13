@extends('layouts.main')
@section('content')

<h1> Create New To Do List</h1>

	{{ Form::open( array('route' => 'todos.store') )}}
		@include('todos.partials._form')
	{{ Form::close() }}


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