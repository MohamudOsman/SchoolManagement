<?php

namespace App\Http\Controllers\management;

use App\Http\Requests\StoreLevels;
use App\Models\classes;
use App\Models\level;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class management extends Controller
{

    public function __construct()
    {

        $this->middleware('AdminAuth:admin');
    }


    public function index()
    {
        $numberofstd = DB::table('students')->count();
        $numberofteacher = DB::table('teachers')->count();
        $classes = DB::table('classes')->count();
        return view('pages.management.management', compact('numberofstd', 'numberofteacher', 'classes'));
    }
}
