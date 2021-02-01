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


                    <h2 style="margin:10px;">Карточка пользователя {{$us->name}} </h2>
                    <div style="
                    display: inline-block;" >  <img style="max-height: 100px; width:100px; margin:10px;" src="{{ $us->avatar ?? asset('storage/default.jpg')}}">
                    <div style="width: 60%;  display: inline-block;"><h3>Имя пользователя: {{$us->name ?? "имя пользователя не указано"}}</h3>
                    <h3>Email: {{$us->email ?? "почта не указана"}}</h3>
  
                  
             </div>
                    </div>
                
               
            </div>
        </div>
    </div>
</div>




                  

@endsection