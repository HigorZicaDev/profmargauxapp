<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::paginate(10); 
        // dd($users);
        return view('admin.students.index', [
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = $request->all();
        $student['password'] = bcrypt('123456789');
        Student::create($student);
        // dd($student);
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!$student = Student::find($id)){
            return redirect()->route('students.index');
        }

        return view('admin.students.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!$student = Student::find($id)){
            return back();
        }

        $saveStudent = $request->all();
        $saveStudent['is_active'] = (bool)$request->input('is_active') ? 1 : 0;

        $student->update($saveStudent);
        return redirect()->route('students.index');
        // if($saveStudent){
        //     return redirect()->route('students.index');
        // } else {
        //     Echo 'Erro ao efetuar as edições!';
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!$student = Student::find($id)){
            return back();
        }

        $student->delete($id);
        return redirect()->route('students.index');

    }
}
