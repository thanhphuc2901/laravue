<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Validation\Rule;
use App\Http\Resources\StudentCollection;
use App\Student;
use DB;

class StudentController extends Controller
{
    //Thêm mới
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
        //Check trùng mã
        $validate =  Validator::make($request->all(), [
            'student_code' => 'required|unique:students',
        ]);
        if ($validate->fails()) {
            $message = 'Mã học sinh đã tồn tại! Vui lòng nhập mã khác!';
            return response()->json($message, 500);
        } else {
            $student->save();
            return response()->json('success');
        }
    }
    //Phương thức load màn hình index
    public function index() {
        // return new StudentCollection(Student::all());
        $student = Student::paginate(10);
        // json_encode($student);
        // dd(response()->json($student));
        return response()->json($student);
    }

    //Render dữ liệu ra view cho chức năng sửa
    public function edit($id) {
        $student = Student::find($id);
        return response()->json($student);
    }

    //Update dữ liệu
    public function update($id) {
        $student = Student::find($id);
        //Check trùng mã
        $validate =  Validator::make(Request::all(), [
            'student_code' => 'required|unique:students,student_code,'.$student->id,
        ]);
        if ($validate->fails()) {
            $message = 'Mã học sinh đã tồn tại! Vui lòng nhập mã khác!';
            return response()->json($message, 500);
        } else {
            $student->update(Request::all());
            return response()->json('successfully updated');
        }
        // $validator = Validator::make($data, [
        //     'student_code' => [
        //         'required',
        //         Rule::unique('students')->ignore($student->id),
        //     ],
        // ]);
        // if ($validator->fails()) {
        //     return redirect('post/create')
        //                 ->withErrors($validator)
        //                 ->withInput();
        // } else {
        //         $student->save();
        //         return response()->json('success');
        //     }
    }

    //Xóa dữ liệu
    public function delete($id) {
        $student = Student::find($id);
        $student->delete();
        return response()->json('successfully deleted');
    }

    //Tìm kiếm
    public function search()
    {
        $query=request('searchQuerry');
        $users = User::where('name', 'LIKE', '%' . $query . '%')->paginate(10);;
        return view('searchresult',compact('users'));
    }
}
