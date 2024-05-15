<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sales;
use App\Models\Student;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sales::with(['student'])->paginate(10);

        return view('admin.sales.index', [
            'sales' => $sales
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();

        return view('admin.sales.create', [
            'students' => $students
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sales = $request->all();
        Sales::create($sales);
        // dd($student);
        return redirect()->route('sales.index');
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
        $students = Student::all();

        // $teste = Sales::all();
        // $teste->load('student')->where('id', '=', $id);

        $sales = Sales::with('student')->find($id);

        $id_student = $sales['student_id'];
        $student_math = Student::find($id_student);

        if(!$sale = Sales::with('student')->find($id)){
            return redirect()->route('sales.index');
        }

        return view('admin.sales.edit', [
            'sale' => $sale,
            'students' => $students,
            'student_math' => $student_math
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                // dd($id);
        if(!$sale = Sales::find($id)){
            return redirect()->route('sales.index')->with('message', 'Agendamento não encontrado!');
        }
        // dd($schedule);
        $data = [
            'id' => $request->input('id'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date_start_schedule' => $request->input('date_start_schedule'),
            'date_end_schedule' => $request->input('date_end_schedule'),
            'color_schedule' => $request->input('color'),
            'done' => $request->input('done')
        ];
        // dd($data);
        $sale->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sales $sales, string $id)
    {
        if(!$sales = Sales::find($id)){
            return redirect()->route('sales.index')->with('message', 'Agendamento não encontrado!');
        }

        $sales->delete($id);
        return redirect()->route('sales.index');
    }
}
