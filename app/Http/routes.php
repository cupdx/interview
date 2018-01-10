<?php
use App\Student;
use App\Gpa;
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

Route::get('/', function(){
    return View::make('home');
});

Route::get('home', function(){
    return View::make('home');
});

Route::get('edit-student/{id?}', function($id=false){
    $student = App\Student::find($id);
    $student = $student ? $student : new Student;
    return View::make('edit-student',['student'=>$student]);
});

Route::post('edit-student', ['as'=>'edit-student-post',function(){
    if(Request::get('id'))
    {        
        $student = Student::find(Request::get('id'));
    }
    else
    {
        $student = new Student;
    }

    $student->first_name = Request::get('first_name'); 
    $student->last_name  = Request::get('last_name');
    $student->dob        = Request::get('dob');
    $student->student_id = Request::get('student_id');
    $student->save();
	
    //If no previous gpa or gpa changed then save
    $currentGPA = $student->gpa()->latest()->first();
    if(!is_null($currentGPA)){
        $currentGPA = $currentGPA->gpa;
    }
    if(is_null($currentGPA) || $currentGPA !== Request::get('gpa')){
        $gpa = new Gpa();
        $gpa->gpa = Request::get('gpa');
        $student->gpa()->save($gpa);
    }
    
    return Redirect::route('students');
}]);

Route::get('students', ['as'=>'students',function(){
    $students = App\Student::all();
    return View::make('students',['students'=>$students]);
}]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
