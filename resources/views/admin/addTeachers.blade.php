@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Teacher!</div>

                <div class="panel-body">
                    <form action="{{url('/admin/uploadTeacherdb')}}" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="teacherdb">Upload CSV file</label>
                            <input type="file" name="teacherdb">
                        </div>
                        <input type="hidden" name="college" value="{{$college}}">
                        <input class="btn btn-success" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
