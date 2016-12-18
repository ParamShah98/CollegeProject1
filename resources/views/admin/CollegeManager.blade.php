@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{$college->college}} Admin!</div>

                <div class="panel-body">
                    <ul>
                    	<a href = "{{url()->current()}}/viewstudents"><li>View All Students in {{$college->college}}</li></a>
                    	<a href = "{{url()->current()}}/viewteachers"><li>View All Teachers in {{$college->college}}</li></a>
                    	<a href = "{{url()->current()}}/addStudents"><li>Add Students to {{$college->college}} database</li></a>
                    	<a href = "{{url()->current()}}/addTeachers"><li>Add Teachers to {{$college->college}} database</li></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection