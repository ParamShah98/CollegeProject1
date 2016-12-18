<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Student;
use App\Studentdb;

use App\User;

use Auth;

use Image;

use File;

class StudentController extends Controller
{
    public function store (Request $request)
    {
    	$this->validate($request, [
        'firstname' => 'required|max:255',
        'lastname' => 'required|max:255',
        'gender' => 'required',
     	'phone' => 'required|numeric|digits:10|unique:students',
     	'parentname' => 'required|max:255',
     	'parentnumber' => 'required|numeric|digits:10',
     	'student_code' => 'required|max:255|unique:students',
     	'department' => 'required|max:255',
      'year' => 'required',
     	'address' => 'required',
     	'division' => 'required',
     	'roll' => 'required',
    	]);
    	$student = new Student;
        $student->user_id = Auth::user()->id;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->gender = $request->gender;
        $student->parentname = $request->parentname;
        $student->parentnumber = $request->parentnumber;
        $student->phone = $request->phone;
        $student->email = Auth::user()->email;
        $student->student_code = $request->student_code;
        $student->department = $request->department;
        $student->year = $request->year;
        $student->address = $request->address;
        $student->division = $request->division;
        $student->roll = $request->roll;
        $std = Studentdb::where('email' , $student->email)
                        ->where('student_code', $student->student_code)
                        ->first();
        
        if(!empty($std))
        {   
            $student->accredited = 1;
            //$std->save();
            $user = User::where('email', $student->email)->first();
            $user->accredited = 1;
            $user->save();
        }
        $student->save();
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
      flash()->success('Profile Successfully Saved :)!');
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
      'parentname' => 'required|max:255',
      'parentnumber' => 'required|numeric|digits:10',
      'student_code' => 'required|max:255|unique:students,student_code,'.$user->student->id,
      'department' => 'required|max:255',
      'year' => 'required',
      'address' => 'required',
      'division' => 'required',
      'roll' => 'required',
      ]);
      $student = Student::where('email', Auth::user()->email)->first();
        $student->user_id = Auth::user()->id;
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->gender = $request->gender;
        $student->parentname = $request->parentname;
        $student->parentnumber = $request->parentnumber;
        $student->phone = $request->phone;
        $student->email = Auth::user()->email;
        $student->student_code = $request->student_code;
        $student->department = $request->department;
        $student->year = $request->year;
        $student->address = $request->address;
        $student->division = $request->division;
        $student->roll = $request->roll;
        $student->save();
        User::where('email', Auth::user()->email)
            ->update(['profile' => 1]);
        if($request->hasFile('avatar'))
        {
          if(Auth::user()->avatar != "default.jpg")
            File::delete(public_path('/uploads/avatars/'.Auth::user()->avatar));
          $avatar = $request->file('avatar');
          $filename = time().'.'.$avatar->getClientOriginalExtension();
          Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/'.$filename) );
          $user = Auth::user();
          $user->avatar = $filename;
          $user->save();
        }
      return redirect()->route('profile');
    }
}
