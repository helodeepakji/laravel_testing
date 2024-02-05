<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    function viewStudent(){
        $students = Student::all();
        return view('student',['students' => $students]);
    }

    function saveStudent(Request $request){
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'gender' => 'required',
            'phone' => 'required|integer'
        ]);
    
        $student = new Student;
        $student->fname = $request->post('fname');
        $student->lname = $request->post('lname');
        $student->phone = $request->post('phone');
        $student->email = $request->post('email');
        $student->gender = $request->post('gender');
        $student->save();
        return redirect('/student');
    }

    function deleteStudent($id){
        $student = Student::find($id);
        $student->delete();
        return redirect('/student');
    }

    function getStudent($id){
        $student = Student::find($id);
        $students = Student::all();
        return view('student',['students'=>$students , 'student' => $student]);
    }

    function updateStudent(Request $request , $id){
        $student = Student::find($id);
        $student->fname = $request->post('fname');
        $student->lname = $request->post('lname');
        $student->phone = $request->post('phone');
        $student->email = $request->post('email');
        $student->gender = $request->post('gender');
        $student->save();
        return redirect('/student');
    }

}
