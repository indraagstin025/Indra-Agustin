<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StudentFormRequest;
use Illuminate\Http\Request;

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
    
}
