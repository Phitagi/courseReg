<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lecturer; use App\Models\Student; use App\Models\Institute; use App\Models\Course;
use App\Models\Registration; use App\Models\Result;
class lecturersController extends Controller
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

    public function login(Request $request)
    {
        $utype=$request->input('userType'); $name=$request->input('name'); $pass=$request->input('password');
        $validator = $request->validate([
            'name' => 'required','password' => 'required'
        ]);

        $institute=Institute::first(); $lec="none";  $results="none";
        $courses=Course::all(); $regs=Registration::all(); $stud="none";
        if($utype=="Lecturer"){
            $lecCount=Lecturer::where('name',$name)->where('password',md5($pass))->count();
            $lecExist=Lecturer::where('name',$name)->where('password',md5($pass))->first();
            if($lecCount>0){Session(['lec' => $lecExist]);} $lec=$lecExist->name;
            $students=Student::all(); $results=Result::all();

            return view ('index',compact('institute','students','results','courses'));
        }else if($utype=="Student"){
            $studCount=Student::where('name',$name)->where('password',md5($pass))->count();
            $studExist=Student::where('name',$name)->where('password',md5($pass))->first();

            if($studCount>0){ Session(['student' => $studExist]); $stud=$studExist->name;
                $results=Result::where('student_id',$studExist->id)->get();
            }

            return view ('index',compact('institute','courses','regs','results'));
        }
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
        //
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
        //
    }
}
