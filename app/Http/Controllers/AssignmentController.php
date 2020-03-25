<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $modules = \App\Module::all();
        $categories = \App\Category::all();
        $teachers = \App\Teacher::all();

        return view('admin.assignment.create',['modules' => $modules, 'categories' => $categories, 'teachers' => $teachers]);
    }

    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $request->validate([
            'file' => 'mimes:pdf,xlx,csv|max:2048',
        ]);

        $assignment = new \App\Assignment();
        if($request->file != null) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $request->file->move(public_path('uploads'), $fileName);
            $assignment->file = $fileName;
        }
        $assignment->teacher_id = request('selectedTeacher');
        $assignment->name = request('name');
        $assignment->description = request('description');
        $assignment->module_id = request('selectedModule');
        $assignment->category_id = request('selectedCategory');
        $assignment->save();

        return redirect('/admin-dashboard');
    }

    public function delete(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $assignment = \App\Assignment::find($id);
        $assignment->module()->detach();
        $assignment->delete();
        return redirect('/admin-dashboard');
    }

    public function update(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $request->validate([
            'file' => 'mimes:pdf,xlx,csv|max:2048',
        ]);
        $assignment = \App\Assignment::find($id);
        $assignment->name = request('name');
        $assignment->description = request('description');
        $assignment->module_id = request('selectedModule');
        $assignment->category_id = request('selectedCategory');
        $assignment->teacher_id = \App\Module::find(request('selectedModule'))->teacher;

        if ($request->file != null) {

        $fileName = time() . '_' . $request->file->getClientOriginalName();
        $request->file->move(public_path('uploads'), $fileName);
        $assignment->file = $fileName;
        }


        $assignment->save();
        return redirect('/admin-dashboard');
    }

    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin']);
        $assignment = \App\Assignment::find($id);
        $modulesWithoutModule = \App\Module::where('id', '!=', $assignment->module_id)->get();
        $teachersWithoutTeacher = \App\Teacher::where('id', '!=', $assignment->teacher)->get();
        $categoriesWithoutCategory = \App\Category::where('id', '!=', $assignment->category_id)->get();
        return view('admin.assignment.edit', ['teachersWithoutTeacher' => $teachersWithoutTeacher, 'assignment' => $assignment,  'modules' => $modulesWithoutModule, 'categoriesWithoutCategory' => $categoriesWithoutCategory]);
    }
}
