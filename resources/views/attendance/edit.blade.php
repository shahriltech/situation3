@extends('layouts.main')
@section('content')


<h1> Employee Name</h1>
<h2> {{ $attendance->name }}</h2>

<form method="POST" action="http://localhost:8000/employee/update/{{ $attendance->id }}">  <!-- it takes id from url myproject/clients/2   id=2   & myproject/clients/ is the route--> 
                                  <!-- /posts/ take it to the posts function in client model-->
      
      {{ method_field('PATCH')}}
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group">
        On Leave <input type="text" name="attend" value="{{ $attendance->attend }}">
        Leave Type <input type="text" name="leave_type" value="{{ $attendance->leave_type }}">
        Leave Duration <input type="text" name="day" value="{{ $attendance->day }}"><!-- name based on the  table field  -->

      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Update post</button> <!-- name based on the  table field  -->

      </div>

      Last Updated: {{ $attendance->updated_at }} <br><br>
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