<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\facades\DB;
use App\message;
use App\User;
use Illuminate\Support\Facades\Auth;


class messageController extends Controller
{

    
    public function message(){
     //   $news= DB::select('SELECT * FROM news');
        //dd($news);
       // $news= news::all();
 
       
 

        $message = message::query();
 
         return view('message')->with('message', $message);
  
    }
}
