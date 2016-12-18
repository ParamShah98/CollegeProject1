@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Student Profile Form</div>

                <div class="panel-body">
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('/editSPsubmit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ $student->firstname }}">

                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="lastname" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ $student->lastname }}">

                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <select id="gender" class="form-control" name="gender" value="{{$student->gender }}">
                                    <option value="male" <?php if ($student->gender == "male") echo "selected='selected'";?> >Male</option>
                                    <option value="female" <?php if ($student->gender == "female") echo "selected='selected'";?> >Female</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Mobile Number</label>

                            <div class="col-md-6">
                                <input type="text" id="phone" class="form-control" name="phone" value="{{$student->phone }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('parentname') ? ' has-error' : '' }}">
                            <label for="parentname" class="col-md-4 control-label">Parents name </label>

                            <div class="col-md-6">
                                <input type="text" id="parentname" class="form-control" name="parentname" value="{{ $student->parentname }}">

                                @if ($errors->has('parentname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('parentname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <div class="form-group{{ $errors->has('parentnumber') ? ' has-error' : '' }}">
                            <label for="parentnumber" class="col-md-4 control-label">Parent's Mobile Number</label>

                            <div class="col-md-6">
                                <input type="text" id="parentnumber" class="form-control" name="parentnumber" value="{{ $student->parentnumber}}">

                                @if ($errors->has('parentnumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('parentnumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        <!--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>-->

                        <div class="form-group{{ $errors->has('student_code') ? ' has-error' : '' }}">
                            <label for="student_code" class="col-md-4 control-label">Student Code</label>

                            <div class="col-md-6">
                                <input id="student_code" type="text" class="form-control" name="student_code" value="{{ $student->student_code }}">

                                @if ($errors->has('student_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('student_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                                <select id="department" class="form-control" name="department" >
                                    <option value="mechanical" <?php if ($student->department == "mechanical") echo "selected='selected'";?> >Mechanical</option>
                                    <option value="computer" <?php if ($student->department == "computer") echo "selected='selected'";?> >Computer</option>
                                    <option value="entc" <?php if ($student->department == "entc") echo "selected='selected'";?> >ENTC</option>
                                    <option value="it" <?php if ($student->department == "it") echo "selected='selected'";?> >IT</option>
                                </select>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                            <label for="year" class="col-md-4 control-label">Year</label>

                            <div class="col-md-6">
                                <select id="year" class="form-control" name="year">
                                    <option value="FE" <?php if ($student->year == "FE") echo "selected='selected'";?>>First Year Engineering</option>
                                    <option value="SE" <?php if ($student->year == "SE") echo "selected='selected'";?>>Second Year Engineering</option>
                                    <option value="TE" <?php if ($student->year == "TE") echo "selected='selected'";?>>Third Year Engineering</option>
                                    <option value="BE" <?php if ($student->year == "BE") echo "selected='selected'";?>>Final Year B. Engineering</option>
                                </select>

                                @if ($errors->has('year'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control" name="address" >{{ $student->address }}</textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('division') ? ' has-error' : '' }}">
                            <label for="division" class="col-md-4 control-label">Division</label>

                            <div class="col-md-6">
                                <input id="division" type="text" class="form-control" name="division" value="{{ $student->division }}">

                                @if ($errors->has('division'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('division') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>         

                        <div class="form-group{{ $errors->has('roll') ? ' has-error' : '' }}">
                            <label for="roll" class="col-md-4 control-label">Roll Number</label>

                            <div class="col-md-6">
                                <input id="roll" type="text" class="form-control" name="roll" value="{{ $student->roll }}">

                                @if ($errors->has('roll'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('roll') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group">
                            <label class="col-md-4 control-label">Change Profile Image</label>            
                            <div class="col-md-6">
                                <input type="file" name="avatar">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
