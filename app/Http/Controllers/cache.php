<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cache extends Controller
{
    public function index(){
            return redirect()->back()->with('success','кэш отчищен');
        } 
}
