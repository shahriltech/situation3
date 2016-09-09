@extends('layouts.main')
@section('content')


<fieldset data-role="controlgroup">
<h1> Towing Truck </h1>
</fieldset>

<form action="towtruck/update/{{ $towtruck->id }}" method="post">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
{{ method_field('PATCH')}}

    <!--  radio button got problem, can't get input from db -->
      <fieldset data-role="controlgroup">
      <legend>Seen</legend>
        
        <input type="radio" name="seen" id="Yes" value="Yes" checked="{{ $towtruck->seen }}">
        <label for="Yes">Yes</label>

        
        <input type="radio" name="seen" id="No" value="No" checked="{{ $towtruck->seen }}">
        <label for="No">No</label>
      </fieldset>

  
    <legend>Location</legend>
    <input type="text" name="location" value="{{ $towtruck->location }}" id="reason">
    </fieldset>
  

  Last Updated: {{ $towtruck->updated_at }} <br><br>


	<input type="submit" value="Submit" >
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