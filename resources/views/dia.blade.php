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
                    <h1 style="text-align:center;">Темы</h1>
@forelse ($dia as $di) 
<a href="{{route('show', $di['name'])}}">
<button style="margin:5px;"type="button" class="btn btn-dark btn-sm">
 
    <h2 style="color:#fff;">{{$di['tema']}}</h2>


</button>


</a>










    @empty
    нет тем
    

</div></div></div></div></div>
    @endforelse
@endsection