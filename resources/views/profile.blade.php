@extends('layouts.app')
@section('title','Админка')

@section('menu')
    
@include('menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">

               
                    <h2 style="margin:10px;">Изменение учетных данных пользования</h2>
                    <form enctype="multipart/form-data" method="post" action="{{route('updateprofile')}}">
                    @csrf
                    @if ($errors->has('name'))
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->get('name') as $error)
                            {{$error}}
                        @endforeach
                    </div>
                    @endif
                    <div class="col-md-7" margin="">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}">

                        
                    </div><br>


                    @if ($errors->has('email'))
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->get('email') as $error)
                            {{$error}}
                        @endforeach
                    </div>
                    
                   
                   @endif
                   <div class="col-md-7" margin="">
                   <input id="email" type="text" class="form-control" name="email" value="{{  $user->email }}">
                   </div><br>
                   
                  
                   @if ($errors->has('password'))
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->get('password') as $error)
                            {{$error}}
                        @endforeach
                    </div>
                    
                   
                   @endif
                   <div class="col-md-7" margin="">
                   <input id="password" type="text" class="form-control" placeholder="текущий пароль" name="password" >
                   </div><br>

                   @if ($errors->has('newpassword'))
                   <div class="alert alert-danger" role="alert">
                       @foreach ($errors->get('newpassword') as $error)
                           {{$error}}
                       @endforeach
                   </div>
                   
                  
                  @endif
                  <div class="col-md-7" margin="">
                  <input id="newpassword" type="text" class="form-control" placeholder="новый пароль" name="newpassword" >
                  </div><br>
                  <div class="form-group">
                    <label for="exampleFormControlFile1">
                        <input type="file" name="image" >
  <img style="heidn:100px; width:100px" src="{{ $user->avatar ?? asset('storage/default.jpg')}}">
                    
                </label>
                </div>
                  <button type="submit" class="btn btn-success">Изменить</button>
                    </form>
               
            </div>
        </div>
    </div>
</div>




                  

@endsection