<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use App\User;

use Image;

class UserController extends Controller
{
    public function profile ()
    {
        $user = User::where('email', Auth::user()->email)->first();
        if(Auth::user()->designation == "student")
        {        
            $student = $user->student;
    	    return view('profiles.StudentProfileView', array('user' => Auth::user(),'student' => $student));
        }
        else if (Auth::user()->designation == "teacher")
        {
            $teacher = $user->teacher;
            return view('profiles.TeacherProfileView', array('user' => Auth::user(),'teacher' => $teacher));
        }
    }
    public function updateavatar (Request $request)
    {
    	echo $request->hasFile('avatar');
    	if($request->hasFile('avatar'))
        {
        	$avatar = $request->file('avatar');
        	$filename = time().'.'.$avatar->getClientOriginalExtension();
        	Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/'.$filename) );
        	$user = Auth::user();
        	$user->avatar = $filename;
        	$user->save();
        }
    	return back();
    }
}
