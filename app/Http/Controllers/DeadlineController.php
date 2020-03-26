<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeadlineController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $orderColumn = null)
    {
        $request->user()->authorizeRoles(['user']);
        $teachers = \App\Teacher::all();
        $modules = \App\Module::all();
        if ($orderColumn != null) {
            switch ($orderColumn) {
                case"category":
                    $deadlines = \App\Assignment::join('categories as po', 'po.id', '=', 'assignments.category_id')->whereNotNull('deadline')->orderBy('po.name', 'DESC')->select('assignments.*')->get();
                    break;
                case"module":
                    $deadlines = \App\Assignment::join('modules as po', 'po.id', '=', 'assignments.module_id')->whereNotNull('deadline')->orderBy('po.name', 'DESC')->select('assignments.*')->get();
                    break;
                case"teacher":
                    $deadlines = \App\Assignment::join('teachers as po', 'po.id', '=', 'assignments.teacher_id')->whereNotNull('deadline')->orderBy('po.name', 'DESC')->select('assignments.*')->get();
                    break;
                default:
                    $deadlines = \App\Assignment::whereNotNull('deadline')->orderBy($orderColumn, 'DESC')->get();
                    break;
            }
        } else {
            $deadlines = \App\Assignment::whereNotNull('deadline')->get();
        }

        return view('deadline/dashboard', ['teachers' => $teachers, 'modules' => $modules, 'deadlines' => $deadlines]);
    }

    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['user']);
        $assignments = \App\Assignment::whereNull('deadline')->get();
        $tags = \App\Tag::all();
        return view('deadline/create', ['tags' => $tags, 'assignments' => $assignments]);
    }

    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['user']);
        $assignment = \App\Assignment::find(request('selectedAssignment'));
        $assignment->deadline = request('deadline');
        $assignment->save();
        return redirect('/deadline-dashboard');
    }

    public function update(Request $request, $id)
    {
        $request->user()->authorizeRoles(['user']);
        $assignment = \App\Assignment::find($id);
        $assignment->deadline = request('selectedDeadline');
        $tags = $request->tags;
        $assignment->tag()->detach();
        if ($tags != null) {

            foreach ($tags as $tag) {
                $assignment->tag()->attach(\App\Tag::where('name', $tag)->first());
            }
        }

        $assignment->save();
        return redirect('/deadline-dashboard');
    }

    public function edit(Request $request, $id)
    {
        $request->user()->authorizeRoles(['user']);
        $assignment = \App\Assignment::find($id);
        $tags = \App\Tag::all();
        $date =  date("Y-m-d\TH:i", strtotime($assignment->deadline));
        $tags2 = array();

        foreach ($tags as $tag) {
            $found = false;
            foreach ($assignment->tag as $assignmentTag) {
                if ($tag->id == $assignmentTag->id) {
                    $found = true;
                }
            }
            if ($found == false) {
                array_push($tags2, $tag);
            }
        }
        return view('deadline.edit', ['assignment' => $assignment, 'tags' => $tags2, 'date' => $date]);
    }

    public function delete(Request $request, $id)
    {
        $request->user()->authorizeRoles(['user']);
        $assignment = \App\Assignment::find($id);
        $assignment->deadline = null;
        $assignment->tag()->detach();
        $assignment->save();
        return redirect('/deadline-dashboard');
    }

}
