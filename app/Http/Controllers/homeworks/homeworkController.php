<?php

namespace App\Http\Controllers\homeworks;

use App\Http\Requests\StoreHomework;
use App\Models\classes;
use App\Models\homework;
use App\Models\sections;
use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class homeworkController extends Controller
{

    public function __construct()
    {

        $this->middleware('TeacherAuth');
        $this->middleware(['StudentAuth','ParentsAuth'])->only('show');
    }

    public function index()
    {
        $subjects = subject::all()->sortBy('name');
        $classes = classes::all()->sortBy('name');
        $sections = sections::all()->sortBy('name');
        return view('pages.homework.homework', compact('subjects', 'classes', 'sections'));
    }

    public function show($section_id)
    {
        $homeworks = homework::where('section_id', $section_id)->get();
        return view('pages.homework.show', compact('homeworks'));
    }

    public function store(StoreHomework $request)
    {
        try {
            $validated = $request->validated();
            $homework = new homework();
            $homework->subject_id = $request->subject_id;
            $homework->classes_id = $request->classes_id;
            $homework->section_id = $request->section_id;
            $homework->teacher_id = $request->teacher_id;
            $homework->date = $request->date;
            $homework->information = $request->information;
            $homework->save();
            return redirect()->route('Homewoeks.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function update(StoreHomework $request)
    {
        try {
            $validated = $request->validated();
            $homework = homework::findOrFail($request->id);
            $homework->update([
                $homework->subject_id = $request->subject_id,
                $homework->classes_id = $request->classes_id,
                $homework->section_id = $request->section_id,
                $homework->teacher_id = $request->teacher_id,
                $homework->date = $request->date,
                $homework->information = $request->information,
            ]);
            return redirect()->route('Homewoeks.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        $homework = homework::findOrFail($request->id)->delete();

        return redirect()->route('Homewoeks.index');
    }
}
