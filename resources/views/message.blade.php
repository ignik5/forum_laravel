@extends('layouts.app')
@section('title','темы')

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                

                <div class="card-body">
@if(!empty ($tema['tema']))
<h1 style="text-align:center;">{{$tema['tema']}}</h1>
@else
<h1 style="text-align:center;">Cообщение</h1>
@endif
<div style="min-heign:150px;">
@forelse($message as $item)
<div style="    border: solid 1px #cacaca;
    border-radius: 20px;">
<div style="
  float: left;
  width:150px;">
  <?

  $mes=$item['user_id'];
  $username=DB::select("SELECT name from users where id='$mes'");
  
  $avatar1=DB::select("SELECT avatar from users where id='$mes'");
  foreach($avatar1 as $keys=>$v){
     $avatar=$v->avatar;
   
 }

  foreach($username as $key=>$value){
    $name=$value->name;
   
 }


?>
<a href="{{ route('userid', $mes)}}">

 <h2>{{$name}}</h2>

<div>   <img style="heidn:100px; width:100px" src="{{ $avatar ?? asset('storage/default.jpg')}}"></div>

    </a></div><div style="text-align: left;
    width: 80%;min-height: 150px;
    display: inline-block;"><h2>{{$item->text}} </h2></div></div><br>

@empty
нет сообщений
@endforelse

<form  method="post" action="{{route('create')}} ">
    @csrf
    
{{--                 {{ Form::label('newstitle', 'название новости') }}
    {{ Form::text('title', 'заголовок',[
    'class'=>'form-control',
    'id'=> 'newstitle'
    ])}} --}}    
    
   
   
    
    <div class="form-group" style="margin-top: 47px;">
        <label for="message" >Сообщение</label>
        @if ($errors->has('message'))
              <div class="alert alert-danger" role="alert">
                  @foreach ($errors->get('message') as $error)
                      {{$error}}
                  @endforeach
              </div>
        @endif

    <textarea id="message" type="text" class="form-control" name="message" ></textarea>
    </div>
  
    <input style="display:none;" id="dia_id" type="text" class="form-control" name="dia_id" value="{{$tema['id']}}" >
    <a href="{{route('create')}}">  <button type="submit" class="form-control">
          {{__('Отправить')}}
        </button></a>
       </div>
</form>
</div></div></div></div></div></div>

@endsection