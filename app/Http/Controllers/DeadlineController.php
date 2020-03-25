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
        return view('deadline/create', ['assignments' => $assignments]);
    }

    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['user']);
        $assignment = \App\Assignment::find(request('selectAssignment'));
        $assignment->deadline = request('deadline');
        $assignment->save();
        return redirect('/deadline-dashboard');
    }

}
