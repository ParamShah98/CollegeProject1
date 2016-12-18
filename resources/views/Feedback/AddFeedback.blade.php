    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Feedback</div>

                    <div class="panel-body">
                        <form action="{{url()->current()}}/save" method="POST">
                            {{ csrf_field() }}
                            <table id="example" class="display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Teacher Name</th>
                                        <th>Evaluation Parameter</th>
                                        <th>Comments</th>
                                    </tr>

                                </thead>
                                <tfoot>
                                    <tr>
                                        <td>General Comments here: </td>
                                        <td><textarea name="GeneralComment" class="form-control"></textarea></td>
                                    </tr>
                                    <tr> 
                                        <td colspan="3" align="center">
                                            <input type="submit" name="" value="Save Feedback" class="btn btn-primary"/>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

    @section('jscripts')

    <script type="text/javascript">
        $(document).ready(function() {
           // $('#example-getting-started').multiselect();
            var teacher_list = <?php echo $list ?>;
            var parameters = <?php echo $para ?>;
            var t = $('#example').DataTable( {
                "paging":   false,
                "info":     false
            });
            //alert(teacher_list[0]['firstname']);
            i=0;
            $.each(teacher_list,function(key1, value1){
                t.row.add( [teacher_list[i]['firstname']+' '+teacher_list[i]['lastname'], fnParameterControl(teacher_list[i]['id'],parameters),  fnCommentControl(teacher_list[i]['id'])] ).draw( false ); 
                i++;   
            });
    });

    function fnParameterControl(rowid, pname)
    {
        var str = "<table>";
        var c=0;
        $.each(pname, function(){
            str += "<tr><td>" + pname[c]['parameterName'] + "</td><td>" + fnGradingControl(rowid, pname[c]['id']) + "</td></tr>";
            c++;
        })
        str += "</table>";
        return str;

       // return "<table><tr><td>" + pname + "</td><td>" + fnGradingControl(100*rowid) + "</td></tr><tr><td>" + pname + "</td><td>" + fnGradingControl(100*rowid ) + "</td></tr></table>";
    }
    function fnGradingControl(rowid, id)
    {
        return "<select id='dropdown_" + rowid + "_"+id+"' name='dropdown["+rowid+"]["+id+"]'>" + "<option value=0 selected>Select</option><option value=5>Excellent</option><option value=4>Very good</option><option value=3>Good</option><option value=2>Average</option><option value=1>Need Improvement</option></select>";
    }
    function fnCommentControl(id)
    {
        return "<textarea id='ta_" + id + "' name='tcomment["+id+"]'>";
    }

    </script>

    @endsection