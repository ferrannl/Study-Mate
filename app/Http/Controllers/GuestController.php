<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{

    public function index(Request $request)
    {
        $blocks = \App\Block::all();
        $modules = \App\Module::join('blocks as po', 'po.name', '=', 'modules.block_name')
            ->orderBy('po.semester_name', 'ASC')->orderBy('po.name','ASC')->whereNotNull('achieved')->select('modules.*')->get();
        $totalEC = 0;
        foreach ($blocks as $block){
            $totalEC = $totalEC+$block->getAllEC();
        }
        $progress = (240/100)*$totalEC;
        return view('guest/dashboard', ['modules' => $modules, 'progress' => $progress, 'totalEC' => $totalEC, 'blocks' => $blocks]);
    }
}
