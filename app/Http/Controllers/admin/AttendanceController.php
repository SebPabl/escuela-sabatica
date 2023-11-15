<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Support\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $saturdays = $this->getSaturdays();
        $attendanceStates = $this->getAttendanceStates($students, $saturdays);

        return view('admin.attendances.index', compact('students', 'saturdays', 'attendanceStates'));
    }

    private function getSaturdays()
    {
        $saturdays = [];
        $today = Carbon::now();
        $startOfMonth = $today->copy()->startOfMonth();
        $endOfMonth = $today->copy()->endOfMonth();
        $firstSaturday = $startOfMonth->copy()->next(Carbon::SATURDAY);

        while ($firstSaturday->lte($endOfMonth)) {
            $saturdays[] = $firstSaturday->copy();
            $firstSaturday->addWeek();
        }

        return $saturdays;
    }

    private function getAttendanceStates($students, $saturdays)
    {
        $attendanceStates = [];

        foreach ($students as $student) {
            foreach ($saturdays as $saturday) {
                $attendance = Attendance::where('student_id', $student->id)
                    ->where('date', $saturday->format('Y-m-d'))
                    ->first();

                $attendanceStates[$student->id][$saturday->format('Y-m-d')] = $attendance ? $attendance->state : false;
            }
        }

        return $attendanceStates;
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
        $attendanceData = $request->attendance;

        if ($attendanceData !== null && is_array($attendanceData)) {
            foreach ($attendanceData as $studentId => $attendanceDates) {
                if (is_array($attendanceDates)) {
                    foreach ($attendanceDates as $date => $state) {
                        // Lógica para guardar la asistencia en la base de datos
                        $attendance = new Attendance();
                        $attendance->student_id = $studentId;
                        $attendance->date = $date;
                        $attendance->state = $state;
                        $attendance->save();
                    }
                }
            }
        }

        return redirect()->route('admin.attendances.index')->with('success', 'Asistencias guardadas correctamente.');
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
    public function update(Request $request, $id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->state = $request->state;
        $attendance->save();

        return redirect()->route('admin.attendances.index')->with('success', 'Asistencia actualizada correctamente.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
