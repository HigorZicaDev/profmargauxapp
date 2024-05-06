<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreScheduleRequest;
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
                'id' => $schedule->id,
                'title' => $schedule->name . ' ('.$schedule->student->name.')',
                'student' => $schedule->student->name,
                'teacher' => $schedule->teacher->name,
                'description' => $schedule->description,
                'start' => $schedule->date_start_schedule,
                'end' => $schedule->date_end_schedule,
                'color' => $schedule->color_schedule,
                'done' => $schedule->done,
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
        // dd($id);
        if(!$schedule = Schedule::find($id)){
            return redirect()->route('schedules.index')->with('message', 'Agendamento não encontrado!');
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
        $schedule->update($data);
        // $schedule = Schedule::find($id);
        // $scheduleData = $request->all();
        // $scheduleData['done'] = 0;
        // // dd($schedule);
        // // $schedule->create($scheduleData);

        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule, string $id)
    {
        if(!$schedule = Schedule::find($id)){
            return redirect()->route('schedules.index')->with('message', 'Agendamento não encontrado!');
        }

        $schedule->delete($id);
        return redirect()->route('schedules.index');
    }
}
