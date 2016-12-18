<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Session;
use App\Feedback;
use App\Generalfeedbackcomment;

class FeedbackController extends Controller
{
    public function index ()
    {
    	$student = \App\Student::where('email', Auth::user()->email)
                            ->first();
        $teachers = \App\Teacher::all();
        $parameters = \App\FeedbackParameter::all();
        $i=0;
        $teacher_list = [];
        $teacher_ids = [];
        $parameter_ids = [];
        foreach ($teachers as $teacher) {
        	$vals = explode(',', $teacher["divisions_assigned"]);
        	$count =0;
        	foreach($vals as $key => $val) {
    			$vals[$key] = trim($val);
    			if($vals[$key] == $student->division && $teacher['year_assigned']==$student->year)
    			{
    				$c=1;
    			}
  			}
  			if ($c==1) {
  				$teacher_list[$i] = ['id' => $teacher['id'], 'firstname'=>$teacher['firstname'] , 'lastname'=>$teacher['lastname'], 'teacher_code'=> $teacher['teacher_code']];
                array_push($teacher_ids, $teacher['id']);
  				$i++;
  			}
        }
        foreach ($parameters as $key) {
            array_push($parameter_ids, $key['id']);
        }
        //dd(json_encode($teacher_list));
        $list = json_encode($teacher_list);
        $para = json_encode($parameters);
        Session::put('teacher_ids', $teacher_ids);
        Session::put('parameter_ids', $parameter_ids);
    	return view('Feedback.AddFeedback', compact('list','para'));
    }
    public function storeFeedback (Request $request)
    {
        if(Session::has('teacher_ids') && Session::has('parameter_ids'))
        {
            $teacher_ids = Session::get('teacher_ids');
            $parameter_ids = Session::get('parameter_ids');
            $student = \App\Student::where('email', Auth::user()->email)
                            ->first();
            $parameterVals =[];
            $comment = new Generalfeedbackcomment;
            $comment->comment = $request->GeneralComment;
            $comment->from_id = $student->id;
            $comment->save();
            $comment_id = $comment->id;
            foreach ($teacher_ids as $key => $value) {
                $parameterVals[$value] ="";
                foreach ($parameter_ids as $key2 => $value2) {
                    $parameterVals[$value] = $parameterVals[$value].','.$request->dropdown[$value][$value2];
                }
                $parameterVals[$value] = trim($parameterVals[$value], ',');
                $feedback = new Feedback;
                $feedback->from_designation = 'student';
                $feedback->from_id = $student->id;
                $feedback->for_designation = 'teacher';
                $feedback->for_id = $value;
                $feedback->parameter_values = $parameterVals[$value];
                $feedback->for_comment = $request->tcomment[$value];
                $feedback->generalfeedbackcomment_id = $comment_id;
                $feedback->save();
            }
        }
        return back();
    }
}
