<?php

namespace App\Http\Controllers\sections;

use App\Http\Requests\storeSection;
use App\Models\classes;
use App\Models\sections;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class sectionController extends Controller
{

    public function __construct()
    {

        $this->middleware('AdminAuth:admin');
    }

    public function index()
    {
        $classes = classes::all()->sortBy('name');
        $sections = sections::all()->sortBy('name');
        return view('pages.Section.Section', compact('classes', 'sections'));
    }

    public function store(storeSection $request)
    {
        try {
            $validated = $request->validated();
            $section = new sections();
            $section->name = $request->name;
            $section->class_id = $request->class_id;
            $section->note = $request->note;
            $section->save();
            return redirect()->route('Section.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {

        try {
            $section = sections::findorfail($request->id);
            $section->update([
                $section->name = $request->name,
                $section->class_id = $request->class_id,
                $section->note = $request->note,
            ]);
            return redirect()->route('Section.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {

        $section = sections::findOrFail($request->id)->delete();
        return redirect()->route('Section.index');
    }
}
