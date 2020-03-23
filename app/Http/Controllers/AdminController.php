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

    public function createTeacher(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $modules = \App\Module::all();
        return view('admin/createTeacher', ['modules' => $modules]);
    }

    public function createModule(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $modules = \App\Module::all();
        return view('admin/createModule', ['modules' => $modules]);
    }

    public function storeTeacher(Request $request){
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

    public function storeModule(Request $request){
        $request->user()->authorizeRoles(['admin']);
        $module = new \App\Module();
        $module->name=request('name');
        $teachers = $request->teachers;

        $module->save();
        foreach($teachers as $teacher){
            $module->teacher()->attach(\App\Teacher::where('name', $teacher)->first());
        }
        return redirect('/admin-dashboard');
    }

    public function deleteTeacher(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $teacher = \App\Teacher::find($id);
        $teacher->module()->detach();
        $teacher->delete();
        return redirect('/admin-dashboard');
    }


}
