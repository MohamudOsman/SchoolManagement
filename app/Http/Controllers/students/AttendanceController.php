<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Repository\AttendanceRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\teacher;
use App\Models\student;
use App\Models\attending;

class AttendanceController extends Controller
{

    public function index()
    {
        $teachers = teacher::all();
        return view('pages.Attendance.Sections', compact('teachers'));
    }

    public function show($id)
    {
        $students = student::with('attendance')->where('section_id', $id)->get();
        return view('pages.Attendance.index', compact('students'));
    }

    public function store($request)
    {
        try {

            foreach ($request->attendences as $studentid => $attendence) {

                if ($attendence == 'presence') {
                    $attendence_status = true;
                } else if ($attendence == 'absent') {
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
}
