<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Teacher;

use Auth;

use App\User;
use App\Teacherdb;

use Image;
use File;
use Storage;

class TeacherController extends Controller
{
    public function store (Request $request)
    {
    	$this->validate($request, [
        'firstname' => 'required|max:255',
        'lastname' => 'required|max:255',
        'gender' => 'required',
     	'phone' => 'required|numeric|digits:10',
     	'teacher_code' => 'required|max:255|unique:teachers',
     	'department' => 'required|max:255',
     	'address' => 'required',
     	'qualification' => 'required|max:255',
     	'post' => 'required|max:255',
     	'subject' => 'required|max:255',
     	'interests' => 'required|max:255',
     	'year_assigned' => 'required',
     	'divisions_assigned' => 'required|max:255',
    	]);
    	$teacher = new Teacher;
        $teacher->user_id = Auth::user()->id;
        $teacher->firstname = $request->firstname;
        $teacher->lastname = $request->lastname;
        $teacher->gender = $request->gender;
        $teacher->phone = $request->phone;
        $teacher->email = Auth::user()->email;
        $teacher->teacher_code = $request->teacher_code;
        $teacher->department = $request->department;
        $teacher->address = $request->address;
        $teacher->qualification = $request->qualification;
        $teacher->post = $request->post;
        $teacher->subject = $request->subject;
        $teacher->interests = $request->interests;
        $teacher->year_assigned = $request->year_assigned;
        $teacher->divisions_assigned = $request->divisions_assigned;
        $tch = Teacherdb::where('email' , $teacher->email)
                        ->where('teacher_code', $teacher->teacher_code)
                        ->first();
        
        if(!empty($tch))
        {   
            $teacher->accredited = 1;
            //$tch->save();
            $user = User::where('email', $teacher->email)->first();
            $user->accredited = 1;
            $user->save();
        }
        $teacher->save();
        User::where('email', Auth::user()->email)
          	->update(['profile' => 1]);
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
    public function editstore (Request $request)
    {
    	$user = User::where('email', Auth::user()->email)->first();
    	$this->validate($request, [
        'firstname' => 'required|max:255',
        'lastname' => 'required|max:255',
        'gender' => 'required',
     	'phone' => 'required|numeric|digits:10',
     	'teacher_code' => 'required|max:255|unique:teachers,teacher_code,'.$user->teacher->id,
     	'department' => 'required|max:255',
     	'address' => 'required',
     	'qualification' => 'required|max:255',
     	'post' => 'required|max:255',
     	'subject' => 'required|max:255',
     	'interests' => 'required|max:255',
     	'year_assigned' => 'required',
     	'divisions_assigned' => 'required|max:255',
    	]);
    	$teacher = Teacher::where('email', Auth::user()->email)->first();
        $teacher->user_id = Auth::user()->id;
        $teacher->firstname = $request->firstname;
        $teacher->lastname = $request->lastname;
        $teacher->gender = $request->gender;
        $teacher->phone = $request->phone;
        $teacher->email = Auth::user()->email;
        $teacher->teacher_code = $request->teacher_code;
        $teacher->department = $request->department;
        $teacher->address = $request->address;
        $teacher->qualification = $request->qualification;
        $teacher->post = $request->post;
        $teacher->subject = $request->subject;
        $teacher->interests = $request->interests;
        $teacher->year_assigned = $request->year_assigned;
        $teacher->divisions_assigned = $request->divisions_assigned;
        $teacher->save();
        //var_dump($request->hasFile('avatar'));
        if($request->hasFile('avatar'))
        {
            //var_dump(Auth::user()->avatar);
            if(Auth::user()->avatar != "default.jpg")
                File::delete(public_path('/uploads/avatars/'.Auth::user()->avatar));
        	$avatar = $request->file('avatar');
        	$filename = time().'.'.$avatar->getClientOriginalExtension();
        	Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/'.$filename) );
        	$user = Auth::user();
        	$user->avatar = $filename;
        	$user->save();
        }
        /*$user = User::where('email', Auth::user()->email)->first();
        $teacher = $user->teacher;
    	return view('profiles.TeacherProfileView', array('user' => Auth::user(),'teacher' => $teacher));*/
        return redirect()->route('profile');
    }
}
