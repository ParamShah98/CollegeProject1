@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome Main Admin!</div>

                <div class="panel-body">
                    Manage Colleges:
                    <br/>
                    @foreach($colleges as $college)
                        <a href="{{url()->current()}}/CollegeManager/{{ $college->college }}">{{ $college->college }}</a><br/>
                    @endforeach
                    ------------------------------------------------------------------------------------------
                    <br/>   
                    <a href="{{url()->current()}}/addCollege">Add College</a><br/>
                    ------------------------------------------------------------------------------------------
                    <br/>   
                    <a href="{{Request::url()}}/add/CollegeAdmin">Add College Admin</a><br/>           
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
