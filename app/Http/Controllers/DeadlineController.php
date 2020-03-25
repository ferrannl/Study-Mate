<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request,$orderColumn = null)
    {
        $request->user()->authorizeRoles(['user']);
        $teachers = \App\Teacher::all();
        $modules = \App\Module::all();
        $deadlines = \App\Assignment::join('categories as po', 'po.id', '=', 'assignments.category_id')->orderBy('po.name', 'DESC')->select('assignments.*')->get();
        //if($orderColumn != null){
          //  $deadlines = \App\Assignment::where('deadline', '!=', 'NULL')->orderBy($orderColumn,'DESC')->get();

       // }else {
        //    $deadlines = \App\Assignment::where('deadline', '!=', 'NULL')->get();
       // }
        return view('deadline/dashboard', ['teachers' => $teachers, 'modules' => $modules, 'deadlines' => $deadlines]);
    }

}
