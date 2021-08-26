<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\student;
use App\Models\attending;
use App\Models\session;

class AttendanceController extends Controller
{

    public function __construct()
    {

        $this->middleware(['AdminAuth:admin','TeacherAuth']);
        $this->middleware(['StudentAuth','ParentsAuth'])->only('show');
    }

    public function index()
    {
        $students = student::all();
        $sessions = session::all();

        return view('pages.Attendance.Sections', compact('students'));
    }

    public function store($request)
    {
        try {

            foreach ($request->attendences as $studentid => $attendence) {

                if ($attendence == 1) {
                    $attendence_status = true;
                } else if ($attendence == 0) {
                    $attendence_status = false;
                }

                attending::create([
                    'student_id' => $request->student_id,
                    'session_id' => $request->session_id,
                    'teacher_id' => $request->teacher_id,
                    'date' => $request->date,
                    'status' => $attendence_status,
                    'note' => $request->note,
                ]);
            }

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(){

    }

}
