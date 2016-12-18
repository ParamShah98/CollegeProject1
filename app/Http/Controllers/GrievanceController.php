<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class GrievanceController extends Controller
{
    public function ajaxrequest1 (Request $request)
    {
    	//Log::info(Input::all());

        $designation = $request->input( 'val' );
    	if($designation == "student")
    	{
    		$tablename = 'students';
    		$List = \App\Student::all();
    	}
    	else if ($designation == "teacher") {
    		$tablename = 'teachers';
    		$List = \App\Teacher::all();
    	}
    	$response = array(
            'status' => 'success',
            'msg' => 'Setting created successfully',
        );
        return response()->json($List);
    }
}
