@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Select from the following 2 lists: </div>
                <div class="panel-body">
                    <form action="{{url()->current()}}/Update" method="POST">
                        {{ csrf_field() }}
                        Teachers:
                        <br/>
                        <table border =1>
                            <col width="130">
                            <col width="80">
                            <tr>
                                <th style="text-align: center">Name</th>
                                <th style="text-align:center">Email</th>
                                <th style="text-align:center">Teacher Code</th>
                                <th style="text-align:center">Add as College Admin</th>
                            </tr>   
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td align="center">{{$teacher->firstname}} {{$teacher->lastname}}</td>
                                    <td align="center">{{$teacher->email}}</td>
                                    <td align="center">{{$teacher->teacher_code}}</td>
                                    <td align="center"><input type="checkbox" name="teacher_email[]" value="{{ $teacher->email }}" <?php if(isset($teacher->user->admin->id)){echo "checked=checked";} ?>/></td>
                                </tr>
                            @endforeach 
                        </table>
                        <br/>
                        <br/>
                        Students:
                        <br/>
                        <table border =1>
                            <col width="130">
                            <col width="80">
                            <tr>
                                <th style="text-align: center">Name</th>
                                <th style="text-align:center">Email</th>
                                <th style="text-align:center">Student Code</th>
                                <th style="text-align:center">Add as College Admin</th>
                            </tr>   
                            @foreach($students as $student)
                                <tr>
                                    <td align="center">{{$student->firstname}} {{$student->lastname}}</td>
                                    <td align="center">{{$student->email}}</td>
                                    <td align="center">{{$student->student_code}}</td>
                                    <td align="center"><input type="checkbox" name="student_email[]" value="{{ $student->email }}" <?php if(isset($student->user->admin->id)){echo "checked=checked";} ?>/></td>
                                </tr>
                            @endforeach 
                        </table>
                        <br/>
                        <input class="btn btn-success" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
