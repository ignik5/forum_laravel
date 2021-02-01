<?php

namespace App\Http\Controllers;

use App\dia;
use App\message;
use App\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class diacontroller extends Controller
{
    public function index(){
        $dia=dia::query()->select(['id','tema','name'])->get();
        return view('dia')->with('dia', $dia);
    }
    public function show($name){
        
   
      $dia = dia::query()->where('name', $name)->firstOrFail();
   
      $message = dia::query()->find($dia->id)->message()->get();
     
    


        
        
      



        return view('message')->with('message',$message)->with('tema',$dia);
    }
    
    public function create(Request $request){
       
        if($request->isMethod('post')){
        $message = new message();
            
        //  $this->validate($request, $this->validaterules(),[] ,$this->attributenames());
$id=Auth::User()->id;

                  $message->fill([
                      'text'=>$request->post('message'),
                      'dia_id'=>$request->post('dia_id'),
                      'user_id'=>$id
  
                  ]);
                
               $message->save();
               $dias=($request->post('dia_id'));
                  
      $dia = dia::query()->where('id', $dias)->firstOrFail();
   
      $message = dia::query()->find($dia->id)->message()->get();
              
              

        return view('message')->with('message',$message)->with('tema',$dia);
                    
     
        }   
     }

}
