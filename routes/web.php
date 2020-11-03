<?php

use Illuminate\Support\Facades\Route;
use App\Models\Institute; use App\Models\Student; use App\Models\Result;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*Route::post('login',function () {
    return view('welcome');
});*/
//Route::resource('institute','instituteController');
Route::get('logout/{sess}',function ($sess){
    Session::forget('lec'); Session::forget('student');
    $institute=Institute::first();
    return view('index',compact('institute'));
});

Route::get('checkResult/{studId}',function ($studId){
    $student=Student::find($studId);
    $results=Result::where('student_id',$studId)->get();
    return view('',compact('institute'));
});

Route::resource('institute', 'instituteController');
Route::resource('lecturers','lecturersController');
Route::post('login','lecturersController@login');
Route::resource('students','studentController');
Route::resource('courses','coursesController');
Route::resource('regs','regsController');
Route::get('reg/delete/{id}','regsController@destroy');
Route::resource('results','resultsController');




