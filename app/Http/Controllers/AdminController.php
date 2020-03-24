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

//    public function createTeacher(Request $request)
//    {
//        $request->user()->authorizeRoles(['admin']);
//        $modules = \App\Module::all();
//        return view('admin.teacher.create', ['modules' => $modules]);
//    }

//    public function createModule(Request $request)
//    {
//        $request->user()->authorizeRoles(['admin']);
//        $teachers = \App\Teacher::all();
//        $blocks = \App\Block::all();
//        return view('admin.module.create', ['teachers' => $teachers, 'blocks' => $blocks]);
//    }

//    public function storeTeacher(Request $request)
//    {
//        $request->user()->authorizeRoles(['admin']);
//        $teacher = new \App\Teacher();
//        $teacher->name = request('name');
//        $modules = $request->modules;
//
//        $teacher->save();
//        if ($modules != null) {
//            foreach ($modules as $module) {
//                $teacher->module()->attach(\App\Module::where('name', $module)->first());
//            }
//        }
//        return redirect('/admin-dashboard');
//    }

//    public function storeModule(Request $request)
//    {
//        $request->user()->authorizeRoles(['admin']);
//        $module = new \App\Module();
//        $module->name = request('name');
//        $module->coordinator = request('selectCoordinator');
//        $module->teacher = request('selectTeacher');
//        $module->EC = request('ecValue');
//        $teachers = $request->teachers;
//
//        $module->save();
//        if ($teachers != null) {
//
//            foreach ($teachers as $teacher) {
//                $module->teacher()->attach(\App\Teacher::where('name', $teacher)->first());
//            }
//        }
//        return redirect('/admin-dashboard');
//    }

//    public function deleteTeacher(Request $request, $id)
//    {
//        $request->user()->authorizeRoles(['admin']);
//        $teacher = \App\Teacher::find($id);
//        $teacher->module()->detach();
//        $teacher->delete();
//        return redirect('/admin-dashboard');
//    }

//    public function deleteModule(Request $request, $id)
//    {
//        $request->user()->authorizeRoles(['admin']);
//        $module = \App\Module::find($id);
//        $module->teacher()->detach();
//        $module->delete();
//        return redirect('/admin-dashboard');
//    }
//
//    public function editModule(Request $request, $id)
//    {
//        $request->user()->authorizeRoles(['admin']);
//        $module = \App\Module::find($id);
//        $teachers = \App\Teacher::all();
//        $teachersWithoutCoordinator = \App\Teacher::where('id', '!=', $module->coordinator)->get();
//        $teachersWithoutTeacher = \App\Teacher::where('id', '!=', $module->teacher)->get();
//        $blocksWithoutBlock = \App\Block::where('name', '!=', $module->block)->get();
//
//
//        $teachers2 = array();
//        foreach ($teachers as $teacher) {
//            $found = false;
//            foreach ($module->teacher()->get() as $moduleTeacher) {
//                if ($teacher->id == $moduleTeacher->id) {
//                    $found = true;
//                }
//            }
//            if ($found == false) {
//                array_push($teachers2, $teacher);
//            }
//        }
//       return view('admin.module.edit', ['module' => $module, 'teachers' => $teachers2, 'teachersWithoutCoordinator' => $teachersWithoutCoordinator, 'teachersWithoutTeacher' => $teachersWithoutTeacher, 'blocksWithoutBlock' => $blocksWithoutBlock]);
//    }

//    public function editTeacher(Request $request, $id)
//    {
//        $request->user()->authorizeRoles(['admin']);
//        $teacher = \App\Teacher::find($id);
//        $modules = \App\Module::all();
//
//        $modules2 = array();
//
//        foreach ($modules as $module) {
//            $found = false;
//            foreach ($teacher->module as $teacherModule) {
//                if ($module->id == $teacherModule->id) {
//                    $found = true;
//                }
//            }
//            if ($found == false) {
//                array_push($modules2, $module);
//            }
//        }
//        return view('admin.teacher.edit', ['teacher' => $teacher], ['modules' => $modules2]);
//    }

//    public function updateModule(Request $request, $id)
//    {
//        $request->user()->authorizeRoles(['admin']);
//        $module = \App\Module::find($id);
//        $module->name = request('name');
//        $module->teacher = request('selectedTeacher');
//        $module->coordinator = request('selectedCoordinator');
//        $module->EC = request('ecValue');
//        $teachers = $request->teachers;
//        $module->teacher()->detach();
//        $module->block = request('selectBlock');
//        if ($teachers != null) {
//            foreach ($teachers as $teacher) {
//                $module->teacher()->attach(\App\Teacher::where('name', $teacher)->first());
//            }
//        }
//        $module->save();
//        return redirect('/admin-dashboard');
//    }

//    public function updateTeacher(Request $request, $id)
//    {
//        $request->user()->authorizeRoles(['admin']);
//        $teacher = \App\Teacher::find($id);
//        $teacher->name = request('name');
//        $modules = $request->modules;
//        $teacher->module()->detach();
//        if ($modules != null) {
//
//            foreach ($modules as $module) {
//                $teacher->module()->attach(\App\Module::where('name', $module)->first());
//            }
//        }
//
//        $teacher->save();
//        return redirect('/admin-dashboard');
//    }

//    public function deleteTeacherModule(Request $request, $id)
//    {
//        $request->user()->authorizeRoles(['admin']);
//        $module = \App\Module::find($id);
//        $module->teacher()->detach($id);
//        $module->save();
//        return view('admin.teacher.edit');
//    }


}
