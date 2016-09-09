@extends('layouts.main')
@section('content')
	<div class="large-12 columns">
		<h1>{{{$list->name}}}</h1>
		@foreach ($items as $item)
			<h4> {{{ $item->content }}} </h4>
		@endforeach
		{{ Form::open( array('route' => 'listitem.store') )}}
			@include('todoslistitem.partials._form')
		{{ Form::close() }}
		<p>{{ link_to_route('todos.show','back',array($list->id))}}</p>
	</div>

@stop