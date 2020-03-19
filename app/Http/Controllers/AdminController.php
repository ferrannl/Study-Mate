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
        return view('Admin/dashboard');
    }

    public function create(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $modules = \App\Module::all();
        return view('Admin/create', ['modules' => $modules]);
    }

    public function store(Request $request){
        $request->user()->authorizeRoles(['admin']);
        $teacher = new \App\Teacher();
        $teacher->name=request('name');
        $teacher->save();
        return redirect('/admin-dashboard');
    }
}
