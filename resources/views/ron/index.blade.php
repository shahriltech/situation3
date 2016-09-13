@extends('layouts.main')
@section('content')


<h1>Update Site</h1>
<h2>Ron</h2>

<form action="bigboss/update/{{ $ron->id }}" method="post">

      {{ method_field('PATCH')}}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group">
        <input type="text" name="attend" value="{{ $ron->attend }}">
        <input type="text" name="reason" value="{{ $ron->reason }}">

      </div>

      Last Updated: {{ $ron->updated_at }} <br><br>


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

@if (session('status'))
    <div class="alert alert-success">
        <font color="green">{{ session('status') }}</font>
    </div>
@endif




@stop