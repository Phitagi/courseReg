<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration; use App\Models\Institute; use App\Models\Course; use App\Models\Result;
class regsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $reg = new Registration;
        $reg->course_id = $request->input('courseId');
        $reg->student_id= $request->input('studId');
        $reg->save();
        $institute=Institute::first(); $courses=Course::all();
        $regs=Registration::all(); $studId=session('student')->id;
        $results=Result::where('student_id',$studId)->get();

        return view('index',compact('institute','courses','regs','results'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        Registration::destroy($id);
        $institute=Institute::first(); $lec="none";  
        $results=Result::where('student_id',session('student')->id)->get();
        $courses=Course::all(); $regs=Registration::all(); $stud="none";

        return view ('index',compact('institute','courses','regs','results'));
    }
}
