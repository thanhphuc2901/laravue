<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\StudentCollection;
use App\Student;
use DB;

class StudentController extends Controller
{
    public function store(Request $request) {
        $student = new Student([
            'student_code' => $request->get('student_code'),
            'student_name' => $request->get('student_name'),
            'gender' => $request->get('gender'),
            'grade' => $request->get('grade'),
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'GPA' => $request->get('GPA')
        ]);

        $student->save();
        return response()->json('success');
    }
    //Phương thức load màn hình index
    public function index() {
        // return new StudentCollection(Student::all());
        $student = Student::paginate(10);
        // json_encode($student);
        // dd(response()->json($student));
        return response()->json($student);
    }

    //Sửa
    public function edit($id) {
        $student = Student::find($id);
        return response()->json($student);
    }

    //Update dữ liệu
    public function update($id, Request $request) {
        $student = Student::find($id);
        $student->update($request->all());
        return response()->json('successfully updated');
    }

    public function delete($id) {
        $student = Student::find($id);
        $student->delete();
        return response()->json('successfully deleted')->paginate(10);
    }
}
