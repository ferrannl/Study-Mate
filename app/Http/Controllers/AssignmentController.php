<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $modules = \App\Module::all();
        return view('admin.assignment.create',['modules' => $modules]);
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
        $assignment->name = request('name');
        $assignment->description = request('description');
        $assignment->module_id = request('selectedModule');
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


        return view('admin.assignment.edit', ['assignment' => $assignment,  'modules' => $modulesWithoutModule]);
    }
}
