<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{

    public function index(Request $request)
    {
        $modules = \App\Module::all();

        return view('guest/dashboard', ['modules' => $modules]);
    }
}
