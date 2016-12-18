@extends('layouts.app')



@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Grievance</div>

                <div class="panel-body">
                    <form action ="gsubmitted" class="form-horizontal" role="form" method="POST">
                        <table id="add">
                            <tr>
                                <td>Grievance Against:</td>
                                <td>
                                    <select id="againstDesignation" name="againstDesignation" class="form-control">
                                        <option value="select">Select</option>
                                        <option value="student">Students</option>
                                        <option value="teacher">Teachers</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <select id="GroupOrPerson" name="GroupOrPerson" class="form-control">
                                        <option value="select2">Select</option>
                                        <option value="AW">As a whole</option>
                                        <option value="Group">Group of Students</option>
                                        <option value="PP">Against a particular person:</option>
                                    </select>
                                </td>
                            </tr>
                        </table>

                        (Sending Anonymously does not mean that the admin wont know who sent the grievance. Only the person who is supposed to get the grievance wont know. And only appropriate grievance will be passed on to the person! If anything offensive is found, your account will be deleted and strict action will be taken.)<br>
                        <input type="submit" value="submit!" name="submit">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('jscripts')

    <script type="text/javascript">
        $(document).ready(function(){
            $("#againstDesignation").change(function(){
                var val = $("#againstDesignation").val();
                var data = {"_token": "{{ csrf_token() }}", val : val};
                if(val != "select")
                {
                    $.ajax({
                        type: "POST",
                        url : window.location.href+'/ajax1  ',
                        cache : false,
                        dataType: 'JSON',
                        data: data,
                        success: function(result){
                            $("#col2").remove();
                            $("#add").append($("<tr><td></td><td id = 'col2'></td></tr>"))
                            $("#col2").append($("<select></select>")
                                        .attr("id", "List")
                                        .attr("name", "List")
                                        .attr("class", "form-control"));
                            for (var i =0 ; i < result.length; i++) {
                                $("#List").append($("<option></option>")
                                        .attr("value", result[i][val+'_code'])
                                        .text(result[i]['firstname'] + ' ' + result[i]['lastname'] + ' (' + result[i][val+'_code'] + ')')
                                            );
                            }
                            if($("#GroupOrPerson").val() != "PP")
                            {
                                $("#List").hide();
                            }
                        } 
                    });
                }
                else{
                    $("#List").remove();
                }
                //alert("OK");
            });
            $("#GroupOrPerson").change(function(){
                if($("#GroupOrPerson").val() == "PP")
                {
                    $("#List").show();
                }
                else
                {
                    $("#List").hide();
                }
            });
        });      
    </script>
 @endsection