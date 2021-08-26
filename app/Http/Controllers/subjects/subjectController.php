<?php

namespace App\Http\Controllers\subjects;

use App\Http\Requests\storeSubject;
use App\Models\classes;
use App\Models\grade;
use App\Models\subject;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class subjectController extends Controller
{

    public function __construct()
    {

        $this->middleware('AdminAuth:admin');
    }

    public function index()
    {
        $subjects = subject::all();
        $classes = classes::all();
        return view('pages.Subject.Subject', compact('subjects', 'classes'));
    }

    public function store(storeSubject $request)
    {
        try {
            $validated = $request->validated();
            $subject = new subject();
            $subject->name = $request->name;
            $subject->max_mark = $request->max_mark;
            $subject->min_mark = $request->min_mark;
            $subject->note = $request->note;
            $subject->save();
            $subject->class()->attach($request->class_id);
            return redirect()->route('Subject.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {

        try {
            $subject = subject::findorfail($request->id);
            $subject->name = $request->name;
            $subject->max_mark = $request->max_mark;
            $subject->min_mark = $request->min_mark;
            $subject->note = $request->note;
            $subject->save();
            if (isset($request->class_id)) {
                $subject->class()->sync($request->class_id);
            } else {
                $subject->class()->sync(array());
            }
            return redirect()->route('Subject.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {

        $subject = subject::findOrFail($request->id)->delete();
        return redirect()->route('Subject.index');
    }
}
