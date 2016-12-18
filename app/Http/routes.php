<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', 'UserController@profile')->name('profile')->middleware(['auth', 'profile']);

//Route::post('/profile', 'UserController@updateavatar')->middleware(['auth', 'profile']);

Route::post('/SPsubmit', 'StudentController@store')->middleware(['auth']);

Route::post('/TPsubmit', 'TeacherController@store')->middleware(['auth']);

Route::post('/editSPsubmit', 'StudentController@editstore')->middleware(['auth', 'profile']);

Route::post('/editTPsubmit', 'TeacherController@editstore')->middleware(['auth', 'profile']);

Route::get('/editStudentProfile', function(){
	$user = App\User::where('email', Auth::user()->email)->first();
	$student = $user->student;
	return view('profiles.editStudentProfile', array('user' => Auth::user(),'student' => $student));
})->middleware(['auth', 'profile']);

Route::get('/editTeacherProfile', function(){
	$user = App\User::where('email', Auth::user()->email)->first();
	$teacher = $user->teacher;
	return view('profiles.editTeacherProfile', array('user' => Auth::user(),'teacher' => $teacher));
})->middleware(['auth', 'profile']);






//ADMIN SECTION here

#Select appropriate view for different types of admins.
Route::get('/admin', 'AdminController@redirectto')->middleware(['auth','profile','admin']);

#ADD teachers and students to database
Route::get('/admin/CollegeManager/{college}/addStudents', function($college){
	return view('admin.addStudents',compact('college'));
})->middleware(['auth','profile','admin']);

Route::get('/admin/CollegeManager/{college}/addTeachers', function($college){
	return view('admin.addTeachers',compact('college'));
})->middleware(['auth','profile','admin']);


#Upload a Student and a Teacher Database
Route::post('/admin/uploadStudentdb', 'AdminController@uploadStudentdb')->middleware(['auth','profile','admin']);
Route::post('/admin/uploadTeacherdb', 'AdminController@uploadTeacherdb')->middleware(['auth','profile','admin']);


#View Students and Teachers of a particular college
Route::get('/admin/CollegeManager/{college}/viewstudents', 'AdminController@viewstudents')->middleware(['auth','profile','admin']);
Route::get('/admin/CollegeManager/{college}/viewteachers', 'AdminController@viewteachers')->middleware(['auth','profile','admin']);


# ADD new COLLEGE
Route::get('/admin/addCollege',function()
{
	return view('admin.addCollege');
})->middleware(['auth','profile','admin','mainadmin']);

Route::post('/admin/addCollege', 'AdminController@addCollege')->middleware(['auth','profile','admin','mainadmin']);


#View options for Every College
Route::get('/admin/CollegeManager/{coll}', function($coll){
	$user = \App\User::where('email', Auth::user()->email)->first();
	$admin = \App\Admin::where('user_id', $user->id)->first();
	$college2 = $admin->admintype->type;
	$ismainadmin = $user->admin->admintype_id;
	$college = \App\College::where('college',$coll)->first();
	if($college2 == $coll || $ismainadmin == 1)
		return view('admin.CollegeManager',compact('college'));
	else
		return redirect('admin');
})->middleware(['auth','profile','admin']);


#Add a new College Admin
Route::get('/admin/add/CollegeAdmin', 'AdminController@addCollegeAdmin')->middleware(['auth','profile','admin','mainadmin']);
Route::get('/admin/add/CollegeAdmin/{college}',function($college){
	$students = \App\Student::where('college',$college)->get();
	$teachers = \App\Teacher::where('college',$college)->get();
	return view('admin.SelectAdmin', compact('students','teachers'));
})->middleware(['auth','profile','admin','mainadmin']);
Route::post('/admin/add/CollegeAdmin/{college}/Update','AdminController@UpdateAdmins')->middleware(['auth','profile','admin','mainadmin']);






#Grievances
Route::get('/Grievance/addgrievance', function(){
	/*$student = \App\Student::orderBy('firstname', 'ASC')->get();
    $teacher = \App\Teacher::orderBy('firstname', 'ASC')->get();
    $snam = array();
    foreach($student as $st)
    {
        $snam[$st['id']]= $st['roll'].'. '.$st['firstname'].' '.$st['lastname'];
    }
    $sjson_array = json_encode($snam);
     //echo $sjson_array;
    $tnam = array();
    foreach($teacher as $tr)
    {
        $tnam[$tr['id']]= $tr['firstname'].' '.$tr['lastname'];
    }
    $tjson_array = json_encode($tnam);
    //echo $tjson_array;
	return view('Grievances.AddGrievancePage', compact('sjson_array', 'tjson_array'));*/
	return view('Grievances.AddGrievancePage');
});

Route::post('/Grievance/addgrievance/ajax1', 'GrievanceController@ajaxrequest1');



#Feedback
Route::get('/Feedback/addfeedback','FeedbackController@index');
Route::post('/Feedback/addfeedback/save','FeedbackController@storeFeedback');

Route::auth();

Route::get('/home', 'HomeController@index')->middleware(['auth', 'profile']);
