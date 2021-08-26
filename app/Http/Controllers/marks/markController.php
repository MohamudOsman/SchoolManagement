<?php

namespace App\Http\Controllers\marks;

use Illuminate\Routing\Controller;

class markController extends Controller
{

    public function __construct()
    {

        $this->middleware(['AdminAuth:admin','TeacherAuth']);
        $this->middleware(['StudentAuth','ParentsAuth'])->only('show');
    }

    public function index()
    {
    }

    public function store(StoreLevels $request)
    {
    }


    public function update(StoreLevels $request)
    {
    }


    public function destroy(Request $request)
    {
    }

    public function show()
    {
    }

}
