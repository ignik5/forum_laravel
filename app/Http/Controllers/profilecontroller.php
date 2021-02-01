<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\facades\DB;

class profilecontroller extends Controller
{
    public function update(Request $request){
        $user = Auth::user();
        $errors=[];

        if($request->isMethod('post')){
            $url = null;
            if (!empty($request->file('image'))){
                $path = Storage::putFile("public/images", $request->file('image'));
                $url = Storage::url($path);
                $image = asset($url);
                
              if(Hash::check($request->post('password'), $user->password)){
                $user->fill([
                    'name'=>$request->post('name'),
                    'password'=>Hash::make($request->post('newpassword')),
                    'email'=>$request->post('email'),
                    'avatar'=>$image

                ]);
                } else{
                    $errors['password'][]="неверно введен текущий пароль";
          
               }
            }
            elseif(empty($request->file('image'))) {
                if(Hash::check($request->post('password'), $user->password)){
                    $user->fill([
                        'name'=>$request->post('name'),
                        'password'=>Hash::make($request->post('newpassword')),
                        'email'=>$request->post('email'),
                   
    
                    ]);
            } else{
                $errors['password'][]="неверно введен текущий пароль";
      
           }}
                $user->save();
                $request->session()->flash('success','Данные пользователя изменены');
      
     
return redirect()->route('updateprofile')->withErrors($errors);
        }




        return view("profile",[
            'user'=>$user
        ]);
    }
    public static function validaterules(){
       
            return [
            'name'=>'required|string|max:15',
            'email'=>'required|email|unique:users.email'. Auth::id(),
            "password"=>"required",
            'newpassword'=>'required|string|min:8'
            ];
        }
        public static function attributenames(){
       
            return [

            'newpassword'=>'новый пароль'
            ];
        }

        public static function   userid($mes){
           
            $user=DB::select("SELECT * from users where id='$mes'");
   $us=$user[0];
            return view("users")->with('us',$us); 
        }
}