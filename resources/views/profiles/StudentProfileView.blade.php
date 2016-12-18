@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your Profile:</div>

                <div class="panel-body">
                    <img src="uploads/avatars/{{ $user->avatar }}" style="width:150px; height: 150px; float:left; border-radius: 50%; margin-right: 25px;">
                    <h2>{{$student->firstname}}'s Profile: </h2>
                    <h4><b>Full Name: </b>{{$student->firstname}} {{$student->lastname}}</h4>
                    <h4><b>Parent's Name: </b>{{$student->parentname}}</h4>
                    <h4><b>Parent's contact number: </b>{{ $student->parentnumber }}</h4>
                    <h4 style="margin-left: 175px"><b>Gender: </b>{{$student->gender}}</h4>
                    <h4 style="margin-left: 175px"><b>Mobile Number: </b>{{$student->phone}}</h4>
                    <h4 style="margin-left: 175px"><b>Email-Id: </b>{{$student->email}}</h4>
                    <h4 style="margin-left: 175px"><b>Student Code: </b>{{$student->student_code}}</h4>
                    <h4 style="margin-left: 175px"><b>College: </b>{{$student->college}}</h4>
                    <h4 style="margin-left: 175px"><b>Department: </b>{{$student->department}}</h4>
                    <h4 style="margin-left: 175px"><b>Address: </b>{{$student->address}}</h4>
                    <h4 style="margin-left: 175px"><b>Division: </b>{{$student->division}}</h4>
                    <h4 style="margin-left: 175px"><b>Roll Number: </b>{{$student->roll}}</h4>
                    <form action="editStudentProfile" style="margin-left: 175px">
                        <input type="submit" value="Edit this Profile" class="btn btn-primary"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
