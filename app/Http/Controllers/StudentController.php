<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::all();
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
        $this -> validate($request, [
            'name' => 'required',
            'roll_number' => 'required',
            'email' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $student = new Student;
        $student->name = $request->input('name');
        $student->roll_number = $request->input('roll_number');
        $student->email = $request->input('email');
        $student->father_name = $request->input('father_name');
        $student->mother_name = $request->input('mother_name');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');
        $student->save();
        return response()->json($student);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::findorfail($id);
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
        $this -> validate($request, [
            'name' => 'required',
            'roll_number' => 'required',
            'email' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);
        $student = Student::findorfail($id);
        $student->name = $request->input('name');
        $student->roll_number = $request->input('roll_number');
        $student->email = $request->input('email');
        $student->father_name = $request->input('father_name');
        $student->mother_name = $request->input('mother_name');
        $student->phone = $request->input('phone');
        $student->address = $request->input('address');
        $student->save();
        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findorfail($id);
        $student->delete();
        return response()->json('Student Deleted');
    }
}
