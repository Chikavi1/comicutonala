<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ComiCut</title>
    <link rel="icon" href="{{asset('ico.png')}}" sizes="16x16">
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/materialize.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet"></link>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <script>
      
      $(document).ready(function(){

        $(".searchbtn").click(function(){
          $("#navsearch").toggle();
           $(".searchbtn").sidenav();
        });

        $(".cgreen").click(function(){
          console.log("jeje ");
        })

   
    </script>
   <style>
    .white-c{
    color:white !important;
      }
     .cgreen{
      color:green !important;
      width: 2em;
     }
     .bottom{
      clear: both;
    position: relative;
    z-index: 10;
    height: 3em;
     }
   </style>
  
</head>
<body>
    <nav>
        <div class="nav-wrapper color-cut">
          <a href="/" class="brand-logo center">ComiCut</a>
          <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="left hide-on-med-and-down">
            <li><a href="{{route('categorias')}}"><i class="material-icons left">view_module</i>Categorias</a></li>
               <li data-target="slide-out"  class="searchbtn" ><a><i class="material-icons left">search</i>Buscar</a></li>
          </ul>
          <ul class="right hide-on-med-and-down">

             @guest
                            <li><a href="{{ route('login') }}">Ingresar</a></li>
                                @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Registrar</a></li>
                                @endif
                        @else
                        <li><a href="{{ route('filter2') }} ">Vender</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{route('profile')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <!--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>-->
                            </li>
                        @endguest

                        
            
          </ul>
        </div>
    </nav>

    <nav style="display: none;" id="navsearch" class="color-cut">
        <div class="nav-wrapper">
          <form>
            <div class="input-field">
              
                <form action="" method="GET">
                 <div class="row">
                   <div class="col s11">
                     <input id="search" type="search" name="busqueda" class="autocomplete white-c">
                   </div>
                   <div class="col s1">
                      <button type="submit" class="btn">Buscar</button>
                      
                   </div>
                 </div>
              
              </form>
            </div>
          </form>
        </div>
    </nav>

    <ul class="sidenav "  id="mobile-nav" >
        <li><a href="{{ route('home') }}"><i class="material-icons">home</i>Inicio</a></li>
     <li><a href="{{route('categorias')}}"><i class="material-icons left">view_module</i>Categorias</a></li>
      <li class="searchbtn"><a><i class="material-icons">search</i>Buscar</a></li>
      <li><a href="{{ route('random') }}"><i class="material-icons">shuffle </i>Al azar</a></li>
           @guest
                            <li><a href="{{ route('login') }}"><i class="material-icons">
how_to_reg
</i>Entrar</a></li>
                                @if (Route::has('register'))
                            <li><a href="{{ route('register') }}"><i class="material-icons">
library_add
</i>Registrarse</a></li>
                                @endif
                        @else
                        <li><a href="{{ route('filter2') }} "><i class="material-icons">attach_money</i>Vender</a></li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{route('profile')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="material-icons">supervised_user_circle</i>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right bottom" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item btn red btn-block " href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       salir
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest    </ul>

        <main class="py-4">
            @yield('content')
        </main>
</body>
</html>
