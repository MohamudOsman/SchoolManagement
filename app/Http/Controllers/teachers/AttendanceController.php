<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Models\teacher;

class AttendanceController extends Controller
{

    public function index()
    {
        $teachers = teacher::all();
        return view('', compact('teachers'));
    }

    public function store($request)
    {
        try {

            foreach ($request->attendences as $teacherid => $attendence) {

                if ($attendence == 1) {
                    $attendence_status = true;
                } else if ($attendence == 0) {
                    $attendence_status = false;
                }

                attending::create([
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
