<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Student;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $students=Student::paginate(4);

        return View::make('welcome',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return View::make('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
    'name' => 'required',
    'email' => 'required',
    'location'=>'required'
    
])->validate();


        $student = new Student;

        $student->name = $request->name;

        $student->email = $request->email;

        $student->location = $request->location;

        $student->save();

        return redirect()->route('students.index')->withSuccess('Student Created Successfully');
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
     $student=Student::find($id);

        return View::make('students.edit',compact('student'));
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
        $student = Student::find($id);

        $student->name = $request->name;

        $student->email = $request->email;

        $student->location = $request->location;

        $student->save();

        return redirect()->route('students.index')->withSuccess('Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=Student::destroy($id);

        return redirect()->route('students.index')->withSuccess('Student Deleted Successfully');
    }
}
