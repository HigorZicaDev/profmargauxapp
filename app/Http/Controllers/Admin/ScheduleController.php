<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // public function __invoke()
    // {
    //     $events = [];
    //     $schedules = Schedule::with(['student', 'teacher'])->get();

    //     foreach ($schedules as $schedule) {
    //         $events[] = [
    //             'title' => $schedule->student->name . ' ('.$schedule->teacher->name.')',
    //             'start' => $schedule->date
    //         ];
    //     }

    //     return view('admin.schedules.index',[
    //         'schedules' => $schedules
    //     ]);

    // }
    public function index()
    {
        $students = Student::all();
        $teachers = Teacher::all();
        $events = [];
        $schedules = Schedule::with(['student', 'teacher'])->get();

        foreach ($schedules as $schedule) {
            $events[] = [
                'title' => $schedule->name . ' ('.$schedule->student->name.')',
                'professor' => $schedule->teacher->name,
                'start' => $schedule->date_schedule,
                'end' => $schedule->date_schedule,
                'time' => $schedule->time_schedule,
                'color' => $schedule->color_schedule,
            ];
        }
        json_encode($events);
        return view('admin.schedules.index',[
            'dados' => $events,
            'students' => $students,
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $schedule = $request->all();
        $schedule['done'] = 0;
        // dd($schedule);
        Schedule::create($schedule);
        return redirect()->route('schedules.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
