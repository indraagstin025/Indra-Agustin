<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StudentFormRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Appcontroller;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));

    }
    public function create ()
    {

        return view('student.create');

    }

    public function store (StudentFormRequest $request)
    {
        $data = $request->validated();

        $student = Student::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
        ]);
        return redirect('/add-student')->with('message','Student Added Succesfully');

    }

    public function edit (Student $student_id)
    {
        //$student = Student::find($student_id);

        return view('student.edit', [
            'student' => $student_id,
        ]);

    }

    public function update(Request $request, $student_id)
{
    // $data = $request->validated();

    // Menggunakan metode find dengan parameter langsung id
    $student = Student::where('id', $student_id)->first();

    if (!$student) {
        return redirect('/students')->with('error', 'Student not found');
    }

    // Menggunakan metode update untuk mengupdate data
    $student->name = $request->get('name');
    $student->email = $request->get('email');
    $student->phone = $request->get('phone');
    $student->update();
   

    return redirect()->route('student.index')->with('message', 'Student updated successfully');
}
    public function destroy($student_id)
    {

        $student = Student::find($student_id);
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Berhasil Delete Biodata');
    }

}
