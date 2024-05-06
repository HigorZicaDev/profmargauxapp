<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

use function Pest\Laravel\get;

class DashboardController extends Controller
{
    public function index()
    {
        $students = Student::where('status', 1)->count();
        // $students = Student::all();
        $teachers = Teacher::where('status', 1)->count();
        $schedules = Schedule::with(['student', 'teacher'])->get()->count();

        return view('dashboard',[
            'students' => $students,
            'teachers' => $teachers,
            'schedules' => $schedules,
        ]);
    }
}
