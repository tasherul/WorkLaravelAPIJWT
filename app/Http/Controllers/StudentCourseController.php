<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentCourse;
use App\Models\Student;
use App\Models\Course;
use DB;
class StudentCourseController extends Controller
{
    //
    public function index()
    {
        return StudentCourse::orderBy('id', 'desc')->get();
    }

    public function store(Request $request)
    {
        $studentCourse = StudentCourse::create($request->all());
        return response()->json($studentCourse, 201);
    }
    

    public function show($id)
    {
        //$studentCourse = StudentCourse::find($id);
        //return response()->json($studentCourse);
        $student = Student::find($id);
        //return response()->json($student);
        if (!$student) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        $courses =array();
        $stc = \DB::table('student_courses')->where('student_id',$id)->get();
        foreach( $stc as $c){
            array_push($courses,Course::find($c->course_id));
        }
        
        return response()->json(['student'=>$student,'courses'=>$courses], 200); 

        
    }

    public function update(Request $request, $id)
    {
        $studentCourse = StudentCourse::find($id);
        if (!$studentCourse) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        $studentCourse->update($request->all());
        return response()->json($studentCourse, 200);
    }

    public function destroy($id)
    {
        $studentCourse = StudentCourse::find($id);
        if (!$studentCourse) {
            return response()->json(['message' => 'Record not found'], 404);
        }
        $studentCourse->delete();
        return response()->json(null, 204);
    }

}
