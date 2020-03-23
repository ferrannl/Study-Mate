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
        $modules = \App\Module::all();
        return view('admin/dashboard', ['teachers' => $teachers], ['modules' => $modules]);
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
        $teachers = \App\Teacher::all();
        return view('admin/createModule', ['teachers' => $teachers]);
    }

    public function storeTeacher(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $teacher = new \App\Teacher();
        $teacher->name = request('name');
        $modules = $request->modules;

        $teacher->save();
        foreach ($modules as $module) {
            $teacher->module()->attach(\App\Module::where('name', $module)->first());
        }
        return redirect('/admin-dashboard');
    }

    public function storeModule(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $module = new \App\Module();
        $module->name = request('name');
        $module->coordinator = request('selectCoordinator');
        $module->teacher = request('selectTeacher');

        $teachers = $request->teachers;

        $module->save();
        foreach ($teachers as $teacher) {
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

    public function deleteModule(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $module = \App\Module::find($id);
        $module->teacher()->detach();
        $module->delete();
        return redirect('/admin-dashboard');
    }

    public function editModule(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);

        $module = \App\Module::find($id);

        return view('admin.editModule', ['module' => $module]);
    }

    public function editTeacher(Request $request, $id)
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
        return view('admin.editTeacher', ['teacher' => $teacher], ['modules' => $modules2]);
    }

    public function updateModule(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
    }

    public function updateTeacher(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $teacher = \App\Teacher::find($id);
        $teacher->name = request('name');
        $modules = $request->modules;
        $teacher->module()->detach();
        foreach ($modules as $module) {
            $teacher->module()->attach(\App\Module::where('name', $module)->first());
        }

        $teacher->save();
        return redirect('/admin-dashboard');
    }

    public function deleteTeacherModule(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $module = \App\Module::find($id);
        $module->teacher()->detach($id);
        $module->save();
        return view('admin.editTeacher');
    }


}
