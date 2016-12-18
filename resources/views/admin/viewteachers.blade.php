@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default" style="float: left;">
                <div class="panel-heading">All SKNCOE teachers are:</div>
                <br><br>
                    <table class="table-hover" border = 1 align="center" style="border-collapse: separate">
                        <tr>
                            <th style="white-space: nowrap">First Name</th>
                            <th style="white-space: nowrap">Last Name</th>
                            <th style="white-space: nowrap">Gender</th>
                            <th style="white-space: nowrap">Mobile Number</th>
                            <th style="white-space: nowrap">Email ID</th>
                            <th style="white-space: nowrap">Teacher Code</th>
                            <th style="white-space: nowrap">College</th>
                            <th style="white-space: nowrap">Department</th>
                            <th style="white-space: nowrap">Address</th>
                            <th style="white-space: nowrap">Qualification</th>
                            <th style="white-space: nowrap">Post</th>
                            <th style="white-space: nowrap">Subject</th>
                            <th style="white-space: nowrap">Interests</th>
                            <th style="white-space: nowrap">Year Assigned</th>
                            <th style="white-space: nowrap">Division Assigned</th>
                            <th style="white-space: nowrap">Is Accredited?</th>
                        </tr>
                        <?php $count = count($teacher); ?>
                        @for($i = 0;$i<$count;$i++)
                            <tr>
                                <td>{{ $teacher[$i]['firstname'] }}</td>
                                <td>{{ $teacher[$i]['lastname'] }}</td>
                                <td>{{ $teacher[$i]['gender'] }}</td>
                                <td>{{ $teacher[$i]['phone'] }}</td>
                                <td>{{ $teacher[$i]['email'] }}</td>
                                <td>{{ $teacher[$i]['teacher_code'] }}</td>
                                <td>{{ $teacher[$i]['college'] }}</td>
                                <td>{{ $teacher[$i]['department'] }}</td>
                                <td>{{ $teacher[$i]['address'] }}</td>
                                <td>{{ $teacher[$i]['qualification'] }}</td>
                                <td>{{ $teacher[$i]['post'] }}</td>
                                <td>{{ $teacher[$i]['subject'] }}</td>
                                <td>{{ $teacher[$i]['interests'] }}</td>
                                <td>{{ $teacher[$i]['year_assigned'] }}</td>
                                <td>{{ $teacher[$i]['divisions_assigned'] }}</td>
                                <td>{{ $teacher[$i]['accredited'] }}</td>
                                <td>{{ $teacher[$i]['feedback'] }}</td>
                            </tr>
                        @endfor
                    </table>
                
            </div>
        </div>
    </div>
</div>
@endsection
