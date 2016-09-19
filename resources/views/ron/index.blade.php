@extends('layouts.main')
@section('content')


<h1>Update Site</h1>
<h2>Ron</h2>

<form action="bigboss/update/{{ $ron->id }}" method="post">

      {{ method_field('PATCH')}}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">


      <fieldset data-role="controlgroup">
      <legend>Seen</legend>
      
      @if ($ron->attend === "Yes")
        <input type="radio" name="attend" id="Yes" value="Yes" checked="checked">
        <label for="Yes">Yes</label>

        <input type="radio" name="attend" id="No" value="No">
        <label for="No">No</label>

      @else

        <input type="radio" name="attend" id="Yes" value="Yes" >
        <label for="Yes">Yes</label>

        <input type="radio" name="attend" id="No" value="No" checked="checked">
        <label for="No">No</label>

      @endif
      </fieldset>


      <div class="form-group">
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