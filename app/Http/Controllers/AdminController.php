<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Student;
use App\Teacher;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Teacherdb;

class AdminController extends Controller
{
    public function redirectto ()
    {
    	$user = User::where('email', Auth::user()->email)->first();
        $person = $user->admin;
        if(isset($person->admintype_id))
        {
        	if($person->admintype_id == 1)
            {
                $colleges = \App\College::all();
                //  print_r($colleges);
                return view('admin.mainAdmin',compact('colleges'));
            }
            else
            {
                $college = \App\College::where('college',$person->admintype->type)->first();
                //print_r($college);
                //return view('admin.CollegeManager',compact('college'));
                return redirect('/admin/CollegeManager/'.$college->college);
                //echo "abcd";
            }
        }
        else
            return view('welcome');
    }
    public function uploadStudentdb (Request $request) 
    {
        //get file
        $upload = $request->file('studentdb');
        $filepath = $upload->getRealPath();

        //open and read
        $file = fopen($filepath, 'r');

        $header = fgetcsv($file);

        //validation
        //dd($header);
        foreach ($header as $key => &$value) {
            $value = strtolower($value);
        }

        while($columns = fgetcsv($file))
        {
            $data = array_combine($header, $columns);
            //Table Update
            $id = $data['id'];
            $email = $data['email'];
            $student_code = $data['student_code'];
            $department = $data['department'];
            $college = $request->college;
            $student =  \App\Studentdb::firstOrNew(['student_code'=>$student_code]);
            $student->email = $email;
           
            $student->student_code = $student_code;
            $student->department = $department;
            $student->college = $college;
            $std = Student::where('email' , $student->email)
                        ->where('student_code', $student_code)
                        ->first();
        
            if(!empty($std))
            {   
                $std->accredited = 1;
                $std->save();
                $user = User::where('email', $student->email)->first();
                $user->accredited = 1;
                $user->save();
            }
            $student->save();

        }

        
        //dd($data);
        return back();
    }
    public function uploadTeacherdb (Request $request)
    {
        $upload = $request->file('teacherdb');
        $filepath = $upload->getRealPath();

        //open and read
        $file = fopen($filepath, 'r');

        $header = fgetcsv($file);

        //validation
        //dd($header);
        foreach ($header as $key => &$value) {
            $value = strtolower($value);
        }

        while($columns = fgetcsv($file))
        {
            $data = array_combine($header, $columns);
            //Table Update
            $id = $data['id'];
            $email = $data['email'];
            $teacher_code = $data['teacher_code'];
            $department = $data['department'];
            $college = $request->college;
            $teacher =  Teacherdb::firstOrNew(['teacher_code'=>$teacher_code]);
            $teacher->email = $email;
            $teacher->teacher_code = $teacher_code;
            $teacher->department = $department;
            $teacher->college = $college;
            $tch = Teacher::where('email' , $teacher->email)
                        ->where('teacher_code', $teacher_code)
                        ->first();
        
            if(!empty($tch))
            {   
                $tch->accredited = 1;
                $tch->save();
                $user = User::where('email', $teacher->email)->first();
                $user->accredited = 1;
                $user->save();
            }
            $teacher->save();

        }
        return back();
    }
    public function viewstudents ($college)
    {
        $user = \App\User::where('email', Auth::user()->email)->first();
        $admin = \App\Admin::where('user_id', $user->id)->first();
        $college2 = $admin->admintype->type;
        $ismainadmin = $user->admin->admintype_id;
        $student = Student::where('college', $college)->get();
        if($college2 == $college || $ismainadmin == 1)
            return view('admin.viewstudents', array('student' => $student));
        else
            return redirect('admin');
    }
    public function viewteachers ($college)
    {
        $user = \App\User::where('email', Auth::user()->email)->first();
        $admin = \App\Admin::where('user_id', $user->id)->first();
        $college2 = $admin->admintype->type;
        $ismainadmin = $user->admin->admintype_id;
        $teacher = Teacher::where('college', $college)->get();
        if($college2 == $college || $ismainadmin == 1)
            return view('admin.viewteachers', array('teacher' => $teacher));
        else
            return redirect('admin');
    }
    public function addCollege (Request $request)
    {
        $college = new \App\College;
        $college->college = $request->CollegeName;
        $college->save();
        $college = \App\College::where('college',$request->CollegeName)->first();
        $admtype = new \App\Admintype;
        $admtype->college_id = $college->id;
        $admtype->type = $request->CollegeName;
        $admtype->save();

        return back();
    }
    public function addCollegeAdmin()
    {
        $colleges = \App\College::all();
        return view('admin.viewColleges',compact('colleges'));
    }
    public function UpdateAdmins (Request $request, $college)
    {
        $admintype = \App\Admintype::where('type',$college)->first();
        $teacher_emails = $request->teacher_email;
        $student_emails = $request->student_email;
        //dd($student_emails);
        if(isset($student_emails))
        {
            foreach ($student_emails as $email) {
                $student = \App\Student::where('email',$email)->first();
                $userid = $student->user->id;
                if(!isset($student->user->admin->admintype_id)){
                   $admin2 = \App\Admin::firstOrCreate(['user_id' => $userid, 'admintype_id' => $admintype->id]);
                    $admin2->save();
                }
            }
        }
        if(isset($teacher_emails))
        {
            foreach ($teacher_emails as $email) {
                $teacher = \App\Teacher::where('email',$email)->first();
                $userid = $teacher->user->id;
                if(!isset($teacher->user->admin->admintype_id)){
                   $admin2 = \App\Admin::firstOrCreate(['user_id' => $userid, 'admintype_id' => $admintype->id]);
                    $admin2->save();
                }
            }
        }
        $students = \App\Student::where('college',$college)->get();
        //dd($students);
        $teachers = \App\Teacher::where('college',$college)->get();
        $c=0;
        foreach ($students as $student) 
        {
            $c=0;
            if(isset($student_emails))
            {
                foreach ($student_emails as $email)
                {
                    if($student->email == $email)
                    {
                        $c++;
                    }
                }
            }
            $d= $student->user->admin['admintype_id'];
            if($c==0 && ($d != 1))
            {
                $userid = $student->user->id;
                $admin2 = \App\Admin::firstOrCreate(['user_id' => $userid]);
                $admin2->save();
                $admin2 = \App\Admin::where('user_id', $userid)->first();
                $admin2->delete();
            }
        }

        $c=0;
        foreach ($teachers as $teacher) 
        {
            $c=0;
            if(isset($teacher_emails))
            {
                foreach ($teacher_emails as $email)
                {
                    if($teacher->email == $email)
                    {
                        $c++;
                    }
                }
            }
            $d= $teacher->user->admin['admintype_id'];
            if($c==0 && ($d != 1))
            {
                $userid = $teacher->user->id;
                $admin2 = \App\Admin::firstOrCreate(['user_id' => $userid]);
                $admin2->save();
                $admin2 = \App\Admin::where('user_id', $userid)->first();
                $admin2->delete();
            }
        }

        return back();
    }
}
