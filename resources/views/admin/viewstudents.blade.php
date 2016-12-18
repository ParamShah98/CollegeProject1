@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="float: left;">
                <div class="panel-heading">All SKNCOE students are:</div>
                <br><br>
                    <table class="table-hover" border = 1 align="center" style="border-collapse: separate">
                        <tr>
                            <th style="white-space: nowrap">First Name</th>
                            <th style="white-space: nowrap">Last Name</th>
                            <th style="white-space: nowrap">Parent's Name</th>
                            <th style="white-space: nowrap">Parent's Mobile Number</th>
                            <th style="white-space: nowrap">Gender</th>
                            <th style="white-space: nowrap">Mobile Number</th>
                            <th style="white-space: nowrap">Email ID</th>
                            <th style="white-space: nowrap">Student Code</th>
                            <th style="white-space: nowrap">College</th>
                            <th style="white-space: nowrap">Department</th>
                            <th style="white-space: nowrap">Year</th>
                            <th style="white-space: nowrap">Address</th>
                            <th style="white-space: nowrap">Division</th>
                            <th style="white-space: nowrap">Roll Number</th>
                            <th style="white-space: nowrap">Is Accredited?</th>
                            <th style="white-space: nowrap">filled Feedback?</th>
                        </tr>
                        <?php $count = count($student); ?>
                        @for($i = 0;$i<$count;$i++)
                            <tr>
                                <td>{{ $student[$i]['firstname'] }}</td>
                                <td>{{ $student[$i]['lastname'] }}</td>
                                <td>{{ $student[$i]['parentname'] }}</td>
                                <td>{{ $student[$i]['parentnumber'] }}</td>
                                <td>{{ $student[$i]['gender'] }}</td>
                                <td>{{ $student[$i]['phone'] }}</td>
                                <td>{{ $student[$i]['email'] }}</td>
                                <td>{{ $student[$i]['student_code'] }}</td>
                                <td>{{ $student[$i]['college'] }}</td>
                                <td>{{ $student[$i]['department'] }}</td>
                                <td>{{ $student[$i]['year'] }}</td>
                                <td>{{ $student[$i]['address'] }}</td>
                                <td>{{ $student[$i]['division'] }}</td>
                                <td>{{ $student[$i]['roll'] }}</td>
                                <td>{{ $student[$i]['accredited'] }}</td>
                                <td>{{ $student[$i]['feedback'] }}</td>
                            </tr>
                        @endfor
                    </table>
                
            </div>
        </div>
    </div>
</div>
@endsection
