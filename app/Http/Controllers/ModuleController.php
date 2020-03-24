<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $teachers = \App\Teacher::all();
        $blocks = \App\Block::all();
        return view('admin.module.create', ['teachers' => $teachers, 'blocks' => $blocks]);
    }
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $module = new \App\Module();
        $module->name = request('name');
        $module->coordinator = request('selectCoordinator');
        $module->teacher = request('selectTeacher');
        $module->block = request('selectBlock');
        $module->EC = request('ecValue');
        $teachers = $request->teachers;

        $module->save();
        if ($teachers != null) {

            foreach ($teachers as $teacher) {
                $module->teacher()->attach(\App\Teacher::where('name', $teacher)->first());
            }
        }
        return redirect('/admin-dashboard');
    }
        public function update(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $module = \App\Module::find($id);
        $module->name = request('name');
        $module->teacher = request('selectedTeacher');
        $module->coordinator = request('selectedCoordinator');
        $module->EC = request('ecValue');
        $teachers = $request->teachers;
        $module->teacher()->detach();
        $module->block = request('selectBlock');
        if ($teachers != null) {
            foreach ($teachers as $teacher) {
                $module->teacher()->attach(\App\Teacher::where('name', $teacher)->first());
            }
        }
        $module->save();
        return redirect('/admin-dashboard');
    }

    public function delete(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $module = \App\Module::find($id);
        $module->teacher()->detach();
        $module->delete();
        return redirect('/admin-dashboard');
    }

    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $module = \App\Module::find($id);
        $teachers = \App\Teacher::all();
        $teachersWithoutCoordinator = \App\Teacher::where('id', '!=', $module->coordinator)->get();
        $teachersWithoutTeacher = \App\Teacher::where('id', '!=', $module->teacher)->get();
        $blocksWithoutBlock = \App\Block::where('name', '!=', $module->block)->get();


        $teachers2 = array();
        foreach ($teachers as $teacher) {
            $found = false;
            foreach ($module->teacher()->get() as $moduleTeacher) {
                if ($teacher->id == $moduleTeacher->id) {
                    $found = true;
                }
            }
            if ($found == false) {
                array_push($teachers2, $teacher);
            }
        }
        return view('admin.module.edit', ['module' => $module, 'teachers' => $teachers2, 'teachersWithoutCoordinator' => $teachersWithoutCoordinator, 'teachersWithoutTeacher' => $teachersWithoutTeacher, 'blocksWithoutBlock' => $blocksWithoutBlock]);
    }
}
