<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $modules = \App\Module::all();
        return view('admin.teacher.create', ['modules' => $modules]);
    }

    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $teacher = new \App\Teacher();
        $teacher->name = request('name');
        $modules = $request->modules;

        $teacher->save();
        if ($modules != null) {
            foreach ($modules as $module) {
                $teacher->module()->attach(\App\Module::where('name', $module)->first());
            }
        }
        return redirect('/admin-dashboard');
    }

    public function delete(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $teacher = \App\Teacher::find($id);
        $teacher->module()->detach();
        $teacher->delete();
        return redirect('/admin-dashboard');
    }
    public function update(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $teacher = \App\Teacher::find($id);
        $teacher->name = request('name');
        $modules = $request->modules;
        $teacher->module()->detach();
        if ($modules != null) {

            foreach ($modules as $module) {
                $teacher->module()->attach(\App\Module::where('name', $module)->first());
            }
        }

        $teacher->save();
        return redirect('/admin-dashboard');
    }

    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $teacher = \App\Teacher::find($id);
        $modules = \App\Module::all();

        $modules2 = array();

        foreach ($modules as $module) {
            $found = false;
            foreach ($teacher->module as $teacherModule) {
                if ($module->id == $teacherModule->id) {
                    $found = true;
                }
            }
            if ($found == false) {
                array_push($modules2, $module);
            }
        }
        return view('admin.teacher.edit', ['teacher' => $teacher], ['modules' => $modules2]);
    }
}
