<?php

namespace App\Http\Controllers\Exams;

use App\Http\Requests\StoreExam;
use App\Models\exam;
use App\Models\subject;
use App\Models\classes;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class examController extends Controller
{
    // return all exams

    public function __construct()
    {

        $this->middleware('AdminAuth:admin');
        $this->middleware(['StudentAuth', 'ParentsAuth', 'TeacherAuth'])->only(['show', 'searchByClass']);
    }

    public function index()
    {

        $exams = exam::all()->sortBy('name');
        $classes = classes::all()->sortBy('name');
        $subjects = subject::all()->sortBy('name');
        return view('pages.Exams.Exams', compact('exams', 'classes', 'subjects'));
    }

    public function show()
    {
        $exams = exam::all()->sortBy('name');
        return view('pages.Exams.Show', compact('exams'));
    }

    // insert new exams to database

    public function store(StoreExam $request)
    {
        try {
            $validated = $request->validated();

            $exam = new exam();
            $exam->subject_id = $request->subject_id;
            $exam->classes_id = $request->classes_id;
            $exam->term = $request->term;
            $exam->date = $request->date;
            $exam->save();

            return redirect()->route('Exam.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update(StoreExam $request)
    {
        try {
            $validated = $request->validated();
            $exam = exam::findOrFail($request->id);
            $exam->update([
                $exam->subject_id = $request->subject_id,
                $exam->classes_id = $request->classes_id,
                $exam->term = $request->term,
                $exam->date = $request->date,
            ]);
            return redirect()->route('Exam.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        $exam = exam::findOrFail($request->id)->delete();

        return redirect()->route('Exam.index');
    }


    public function searchByClass($id)
    {
        $exams = exam::where('classes_id', $id)->get('*');
        $classes = classes::all()->sortBy('name');
        $subjects = subject::all()->sortBy('name');
        return view('pages.Exams.Exams', compact('exams', 'classes', 'subjects'));
    }
}
