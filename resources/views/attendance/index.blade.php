@extends('layouts.main')
@section('content')

<div class="container">
  <h2 class="subheader">Annual Leave</h2>
  <p></p>
  <table class="table table-striped" style="width:100%;">
    <thead>
      <tr>
        <th><center>Employee Name</center></th>
        <th><center>Status</center></th>
        <th><center>Leave Category</center></th>
        <th><center>Leave Date</center></th>
        <th><center>Total Leave</center></th>
        <th><center>Action</center></th>
      </tr>
    </thead>
    <tbody>
    @foreach($list as $employee)
      <tr>
        <td><center>{{ $employee->name }}</center></td>
        <td><center>{{ $employee->attend }}</center></td>
        <td><center>{{ $employee->leave_type }}</center></td>
        <td><center>#</center></td>
        <td><center>{{ $employee->day }}</center></td>
        <td>
        <center>
        <form method="get" action="employee/{{ $employee->id }}/edit" class="form-control">
			 
			 <input type="submit" value="UPDATE" class="tiny button success">
        </form>
        </center>
        </td>
      </tr> 
      @endforeach
    </tbody>
  </table>
</div>


@stop