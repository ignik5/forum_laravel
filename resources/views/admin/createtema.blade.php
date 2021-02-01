@extends('layouts.app')
@section('title','создание темы')

@section('menu')
    @include('admin.menu')
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                

                <div class="card-body">
    
                    <form  enctype="multipart/form-data" method="POST" action="@if($dia->id)
                        {{route('admin.dia.update',$dia)}}  @else {{ route('admin.dia.store') }}  @endif">
                            @csrf
                            @if($dia->id) @method('PATCH')@endif
   {{--                 {{ Form::label('newstitle', 'название новости') }}
                        {{ Form::text('title', 'заголовок',[
                        'class'=>'form-control',
                        'id'=> 'newstitle'
                        ])}} --}}    
                     

                            <label for="tema" >Название темы</label>
                            @if ($errors->has('tema'))
                                  <div class="alert alert-danger" role="alert">
                                      @foreach ($errors->get('tema') as $error)
                                          {{$error}}
                                      @endforeach
                                  </div>
                            @endif

                            <input id="v" type="text" class="form-control" name="tema" value="{{ old( 'tema' )?? $dia->tema }}">
                        </div>
                       
                        <div class="form-group">
                            <button type="submit" class="form-control">
                                @if($dia->id)
                                {{__('изменить')}}
                                 @else {{__('добавить')}} 
                                 @endif
                            </button>
                           </div>
                           </div>
                    </form>

</div></div></div></div></div>
@endsection


