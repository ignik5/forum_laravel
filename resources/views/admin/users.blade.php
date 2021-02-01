@extends('layouts.app')
@section('title','Админка')

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>Пользователи</h2>
            <br>
    @forelse($users as $user)
        <div class="col-md-12 card" >
            
              <div class="card-body">
      {{$user->name}}
      @if($user->is_admin)
      <a href="{{route('admin.toggleAdmin', $user)}}"><button type="submit" class="bth btn-danger">Разжаловать</button></a>

      @else 
      <a href="{{route('admin.toggleAdmin', $user)}}"><button type="button" class="btn btn-success">Повысить</button></a>

     
      
    @endif

</div>
</div>
@empty
<p>нет пользователей</p>
@endforelse
{{$users->links()}}
    
</div>
</div>
<script>
    let buttons = document.querySelectorAll('.testApi');
    buttons.forEach((elem)=>{
      elem.addEventListener('click', () => {
          let id = elem.getAttribute('data-id');
          (async ()=>{
           const response = await fetch('/api/apiTest/?id='+id);
           const answer = await response.json();
           console.log(answer);
          })();
      })

    })                    
        
 
    </script>
@endsection