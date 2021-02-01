
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
       Темы <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        
    <a class ="nav-link"  href="{{route('admin.dia.create')}}">Создать тему</a>
          
    <a class ="nav-link"  href="{{route('admin.dia.index')}}">Все темы</a>
 
  

    </div></li>
<li class ="nav-item {{ request()->routeIs('admin.updateuser')?'active':''}}"><a class ="nav-link"  href="{{route('admin.updateuser')}}">Пользователи </a></li>


 <li class ="nav-item {{ request()->routeIs('clear')?'active':''}}"><a class ="nav-link"  href="{{route('clear')}}">Кэш</a></li>
