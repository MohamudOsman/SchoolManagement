<?php

namespace App\Http\Controllers\marks;

use App\Models\mark;
use Illuminate\Routing\Controller;
use App\Models\marks;
use GuzzleHttp\Psr7\Request;

class markController extends Controller
{

    public function __construct()
    {

        $this->middleware(['AdminAuth:admin', 'TeacherAuth']);
        $this->middleware(['StudentAuth', 'ParentsAuth'])->only('show');
    }


    public function get_guard()
    {
        if (Auth::guard('admin')->check()) {
            return 'admin';
        } elseif (Auth::guard('user')->check()) {
            return 'user';
        }
    }

    public function index()
    {

        $id = Auth::guard($this->get_guard())->id();
        $marks = mark::where('teacher_id', $id)->get('*');
        return view('pages.mark.mark', compact('marks'));
    }

    public function store(Request $request)
    {

        $id = Auth::guard($this->get_guard())->id();
        try {
            $validated = $request->validated();
            $marks = new marks();
            $marks->student_id = $request->student_id;
            $marks->teacher_id = $id;
            $marks->exam_id = $request->exam_id;
            $marks->m1 = $request->m1;
            $marks->save();
            return redirect()->route('marks.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update(Request $request)
    {

        $id = Auth::guard($this->get_guard())->id();
        try {
            $marks = mark::findOrFail($request->id);
            $marks->update([
                $marks->student_id = $request->student_id,
                $marks->teacher_id = $id,
                $marks->exam_id = $request->exam_id,
                $marks->m1 = $request->m1,
            ]);
            return redirect()->route('marks.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        $mark = mark::findOrFail($request->id)->delete();

        return redirect()->route('marks.index');
    }

    public function show()
    {
        $student_id = Auth::guard($this->get_guard())->id();
        $marks = mark::where('student_id', $student_id)->get('*');
        return view('pages.mark.mark', compact('marks'));
    }
}
