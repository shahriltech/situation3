@extends('layouts.main')
@section('content')
	<div class="large-12 columns">
		<h1>{{{$list->name}}}</h1>
		@foreach ($items as $item)
			<h4> {{{ $item->content }}} </h4>
			<ul class="no-bullet button-group">
			<li>
				{{ link_to_route('listitem.itemchecked','Check',[$item->id,1],['class'=>'tiny success button'])}}
			</li>
			<li>
				{{ link_to_route('listitem.edit','edit',[$item->id],['class'=>'tiny button'])}}
			</li>
			<li>
				{{ Form::model($item, ['route'=> ['listitem.destroy',$item->id],"method"=>"DELETE"]) }}
				{{ Form::button('destroy', ['type' => 'submit','class'=>'tiny alert button'])}}
				{{ Form::close() }}				
			</li>
			</ul>
		@endforeach
		@foreach ($citems as $item)
			<h4> *{{{ $item->content }}} </h4>
			<ul class="no-bullet button-group">
			<li>
				{{ link_to_route('listitem.itemchecked','Uncheck',[$item->id,0],['class'=>'tiny button'])}}
			</li>			
			</ul>
		@endforeach		
		{{ link_to_route('listitem.create',"Create New Item",null,array("class"=>"success button")) }}
		<p>{{ link_to_route('todos.index','back')}}</p>
	</div>

@if (session('status'))
    <div class="alert alert-success">
        <font color="green">{{ session('status') }}</font>
    </div>
@endif

@stop