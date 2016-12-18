@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Teacher Profile Form</div>

                <div class="panel-body">
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ url('/TPsubmit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="firstname" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="firstname" type="text" class="form-control" name="firstname" value="{{ old('firstname') }}">

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
                                <input id="lastname" type="text" class="form-control" name="lastname" value="{{ old('lastname') }}">

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
                                <select id="gender" class="form-control" name="gender" value="{{ old('gender') }}">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
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
                                <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
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

                        <div class="form-group{{ $errors->has('teacher_code') ? ' has-error' : '' }}">
                            <label for="teacher_code" class="col-md-4 control-label">Teacher Code</label>

                            <div class="col-md-6">
                                <input id="teacher_code" type="text" class="form-control" name="teacher_code" value="{{ old('teacher_code') }}">

                                @if ($errors->has('teacher_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('teacher_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                                <select id="department" class="form-control" name="department" value="{{ old('department') }}">
                                    <option value="mechanical">Mechanical</option>
                                    <option value="computer">Computer</option>
                                    <option value="entc">ENTC</option>
                                    <option value="it">IT</option>
                                </select>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea id="address" class="form-control" name="address" value="{{ old('address') }}"></textarea>
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('qualification') ? ' has-error' : '' }}">
                            <label for="qualification" class="col-md-4 control-label">Qualification</label>

                            <div class="col-md-6">
                                <input id="qualification" type="text" class="form-control" name="qualification" value="{{ old('qualification') }}">

                                @if ($errors->has('qualification'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('qualification') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('post') ? ' has-error' : '' }}">
                            <label for="post" class="col-md-4 control-label">Post</label>

                            <div class="col-md-6">
                                <input id="post" type="text" class="form-control" name="post" value="{{ old('post') }}">

                                @if ($errors->has('post'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('post') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
                            <label for="subject" class="col-md-4 control-label">Subject</label>

                            <div class="col-md-6">
                                <input id="subject" type="text" class="form-control" name="subject" value="{{ old('subject') }}">

                                @if ($errors->has('subject'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('interests') ? ' has-error' : '' }}">
                            <label for="interests" class="col-md-4 control-label">Interested in</label>

                            <div class="col-md-6">
                                <input id="interests" type="text" class="form-control" name="interests" value="{{ old('interests') }}">

                                @if ($errors->has('interests'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('interests') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('year_assigned') ? ' has-error' : '' }}">
                            <label for="year_assigned" class="col-md-4 control-label">Year</label>

                            <div class="col-md-6">
                                <select id="year_assigned" class="form-control" name="year_assigned" value="{{ old('year_assigned') }}">
                                    <option value="FE">First Year Engineering</option>
                                    <option value="SE">Second Year Engineering</option>
                                    <option value="TE">Third Year Engineering</option>
                                    <option value="BE">Final Year B. Engineering</option>
                                </select>

                                @if ($errors->has('year_assigned'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('year_assigned') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('divisions_assigned') ? ' has-error' : '' }}">
                            <label for="divisions_assigned" class="col-md-4 control-label">Divisions Assigned</label>

                            <div class="col-md-6">
                                <input id="divisions_assigned" type="text" class="form-control" name="divisions_assigned" value="{{ old('divisions_assigned') }}">

                                @if ($errors->has('divisions_assigned'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('divisions_assigned') }}</strong>
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
