@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Aww Yeahh! Welcome back <span style="color:blue">{{ Auth::user()->name }} </span></div>

                <div class="panel-body">
                    <div class="col-sm-12">
                        <h3>To Do List</h3>   
                    </div>
                </div>

                <div class="panel-body">
                    <div class="col-sm-6">
                        <a href="{{ url('/todos') }}" role="button" class="btn btn-primary btn-block">To Do List</a>   
                    </div>
                    <div class="col-sm-6">
                        
                        <a href="towtruck" role="button" class="btn btn-info btn-block">Tow Trucks</a>
                    </div>
                </div>

                <div class="panel-body">
                    <div class="col-sm-6">
                        <a href="bigboss" role="button" class="btn btn-warning btn-block">Boss</a>
                    </div>
                    <!--<div class="col-sm-6">
                        <a href="employee" role="button" class="btn btn-danger btn-block">Attendance</a>
                    </div>-->
                </div>
                <br><br>

            </div>
        </div>
    </div>
</div>
@endsection
