@extends('layouts.main')
@section('content')
	<h2>Show all Todo Lists</h2>
	
	@foreach ($todo_lists as $list)
		@if (($list->todo_list_featured) == 1)  <!-- to do list's task in progress (featured) = add *  -->
			<h4>* {{ link_to_route('todos.show',$list->name, [$list->id]) }}</h4>
		@else 
			<h4>{{ link_to_route('todos.show',$list->name, [$list->id]) }}</h4>
		@endif

		<ul class="no-bullet button-group">
			<li>
				@if (($list->todo_list_featured) == 1)  
					{{ link_to_route('todos.itemfeature','unfeature',[$list->id,0],['class'=>'tiny button','style'=>'background-color:#673ab7'])}}
				@else
					{{ link_to_route('todos.itemfeature','feature',[$list->id,1],['class'=>'tiny button','style'=>'background-color:#673ab7'])}}
				@endif
			</li>
			<li>
				{{ link_to_route('todos.edit','edit',[$list->id],['class'=>'tiny button'])}}
			</li>
			<li>
				{{ Form::model($list, ['route'=> ['todos.destroy',$list->id],"method"=>"DELETE"]) }}
				{{ Form::button('destroy', ['type' => 'submit','class'=>'tiny alert button'])}}
				{{ Form::close() }}				
			</li>
		</ul>
	@endforeach
	{{ link_to_route('todos.create',"Create New List",null,array("class"=>"success button")) }}	


	@if (session('status'))
    <div class="alert alert-success">
        <font color="green">{{ session('status') }}</font>
    </div>
	@endif

@stop