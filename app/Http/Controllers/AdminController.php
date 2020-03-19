<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $teachers = \App\Teacher::all();
        return view('admin/dashboard',['teachers' => $teachers]);
    }

    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $modules = \App\Module::all();
        return view('admin/create', ['modules' => $modules]);
    }

    public function store(Request $request){
        $request->user()->authorizeRoles(['admin']);
        $teacher = new \App\Teacher();
        $teacher->name=request('name');
        $modules = $request->modules;

        $teacher->save();
        foreach($modules as $module){
            $teacher->module()->attach(\App\Module::where('name', $module)->first());
            }
        return redirect('/admin-dashboard');
    }
}
