<?php

namespace App\Http\Controllers\marks;

use App\Models\exam;
use App\Models\mark;
use Illuminate\Routing\Controller;

class markController extends Controller
{

    public function __construct()
    {

        $this->middleware(['AdminAuth:admin', 'TeacherAuth']);
        $this->middleware(['StudentAuth', 'ParentsAuth'])->only('show');
    }

    public function index()
    {
        $students = student::all()->sortBy('name');
        $exams = exam::all();
        return view('pages.marks.marks', compact('students'));
    }

    public function store($request)
    {
        try {

            foreach ($request->marks as $studentid => $mark) {


                mark::create([
                    'student_id' => $request->student_id,
                    'teacher_id' => $request->teacher_id,
                    'exam_id' => $request->exam_id,
                    'm1' => $request->m1,
                ]);
            }

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $marks = mark::where('student_id', $id)->get();
        return view('pages.marks.show', compact('marks'));
    }
}
