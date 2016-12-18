@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add College!</div>

                <div class="panel-body">
                    <form action="{{url()->current()}}/addCollege" enctype="multipart/form-data" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="CollegeName">Enter College Name</label>
                            <input type="text" name="CollegeName">
                        </div>
                        <input class="btn btn-success" type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
	