@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">List Of Colleges</div>

                <div class="panel-body">
                    Choose college to add an Admin for:
                    <br/>
                    @foreach($colleges as $college)
                        <a href="{{url()->current()}}/{{ $college->college }}">{{ $college->college }}</a><br/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
