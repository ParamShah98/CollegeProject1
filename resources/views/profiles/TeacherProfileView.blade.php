@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Your Profile:</div>

                <div class="panel-body">
                    <img src="uploads/avatars/{{ $user->avatar }}" style="width:150px; height: 150px; float:left; border-radius: 50%; margin-right: 25px;">
                    <h2>{{$teacher->firstname}}'s Profile: </h2>
                    <h4><b>Full Name: </b>{{$teacher->firstname}} {{$teacher->lastname}}</h4>
                    <h4><b>Gender: </b>{{$teacher->gender}}</h4>
                    <h4><b>Mobile Number: </b>{{$teacher->phone}}</h4>
                    <h4 style="margin-left: 175px"><b>Email-Id: </b>{{$teacher->email}}</h4>
                    <h4 style="margin-left: 175px"><b>Student Code: </b>{{$teacher->teacher_code}}</h4>
                    <h4 style="margin-left: 175px"><b>College: </b>{{$teacher->college}}</h4>
                    <h4 style="margin-left: 175px"><b>Department: </b>{{$teacher->department}}</h4>
                    <h4 style="margin-left: 175px"><b>Address: </b>{{$teacher->address}}</h4>
                    <h4 style="margin-left: 175px"><b>Qualification: </b>{{$teacher->qualification}}</h4>
                    <h4 style="margin-left: 175px"><b>Post: </b>{{$teacher->post}}</h4>
                    <h4 style="margin-left: 175px"><b>Subject: </b>{{$teacher->subject}}</h4>
                    <h4 style="margin-left: 175px"><b>Interests: </b>{{$teacher->interests}}</h4>
                    <h4 style="margin-left: 175px"><b>Year Assigned: </b>{{$teacher->year_assigned}}</h4>
                    <h4 style="margin-left: 175px"><b>Division Assigned: </b>{{$teacher->divisions_assigned}}</h4>
                    <form action="editTeacherProfile" style="margin-left: 175px">
                        <input type="submit" value="Edit this Profile" class="btn btn-primary"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
