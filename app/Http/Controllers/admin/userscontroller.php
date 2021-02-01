<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class userscontroller extends Controller
{
    public function index()
    {
         $users=User::query()->where('id','!=', Auth::id())->paginate(5);
         return view('admin.users',['users'=>$users]);

    }
    public function toggleAdmin(User $user){
  if($user->id!= Auth::id() && $user->is_admin !=2){
      $user->is_admin=!$user->is_admin;
      $user->save();
      return redirect()->back()->with('success','Права изменены');
  } else {
    return redirect()->route('admin.updateuser')->with('error','Ошибка');
  }



    }
}
