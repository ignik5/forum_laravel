@extends('layouts.app')
@section('title',' Все темы')

@section('menu')
    @include('admin.menu')
@endsection
</ul></nav>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                
<p>adminka </p>


<div>
    @foreach($dia as $item)
    <h2>{{$item->tema}} </h2>
 
    <form action="{{route('admin.dia.destroy',$item->id)}}" method="post">
        <a href="{{ route('admin.dia.edit', $item->id) }}"><button type="button" class="bth btn-success">Изменить</button></a>
         <button type="submit"  class="bth btn-danger">Удалить</button>
    @csrf
    @method('DELETE')
      </form>

 
  <hr>
 
    @endforeach
    {{$dia->links()}}
    </div>
    </div></div></div></div>
@endsection