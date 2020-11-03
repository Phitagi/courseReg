<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer; use App\Models\Student; use App\Models\Institute; use App\Models\Course;
use App\Models\Registration; use App\Models\Result; 
class resultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $res = new Result;
        $res->course_id = $request->input('courseId');
        $res ->student_id= $request->input('studentId');
        $res ->unit= $request->input('unit');
        $res ->grade= $request->input('grade');
        $res ->date= date('Y-m-d H:i');
        $res->save();
        $institute=Institute::first(); $courses=Course::all();
        $regs=Registration::all(); 
        $students=Student::all(); $results=Result::all();

        return view ('index',compact('institute','students','results','courses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $institute=Institute::first(); $courses=Course::all();
        $regs=Registration::all(); 
        $results=Result::where('student_id',$id)->get();
        $student=Student::find($id);

        return view ('results',compact('institute','student','results','courses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
