<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ComiCut @yield('title')</title>
    <link rel="icon" href="{{asset('ico.png')}}" sizes="16x16">
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet"></link>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    
    <meta name="theme-color" content="#17202f" >

    <script>
      $(document).ready(function(){

        $(".searchbtn").click(function(){
          $("#navsearch").toggle();
           $(".searchbtn").sidenav();
        });

        $(".cgreen").click(function(){
          console.log("jeje ");
        });
      });
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
     .footer-color{
      background-color: #212121;
     }
     .footer-text-color{
     color: #1c9e83;
     }
     .fb{
      color:#4267b2;
     }
     .yt{
      color:#ff0000;
     }
     .im{
      color:#515151;
     }
     .udg-text{
  text-align: justify;
      font-weight: bold;
     }

     .search{
      display: none !important;
     }
     .withsearch{
      display: inline !important;
     }
   </style>
  
</head>
<body>
  

    <nav>
        <div class="nav-wrapper color-cut">
          <a href="/" class="brand-logo center">ComiCut</a>
          <a  class="search @yield('withsearch') show-on-small hide-on-large-only brand-logo right searchbtn" ><i class="white-text material-icons ">search</i></a>
          <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="left hide-on-med-and-down">
            <li><a href="{{route('categorias.index')}}"><i class="material-icons left">view_module</i>Categorias</a></li>
            
              <li>    
                   
                      
               
          <div class="input-field col s6 s12 white-text">
            <form action="" method="GET">
                   <input id="search" type="text"  placeholder="Tengo antojo de..."name="busqueda" class="autocomplete search grey-text @yield('withsearch')">
             </form>
          </div>
                      
                            
                  </li>   
            

          </ul>
          <ul class="right hide-on-med-and-down">

             @guest
                            <li><a href="{{ route('login') }}">Ingresar</a></li>
                                @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Registrar</a></li>
                                @endif
                        @else
                        <li><a href="{{ route('seller.create') }} ">Vender</a></li>
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
          
            <div class="input-field">
              
                <form action="" method="GET">
                   <div class="row">
                       <div class="col s12 ">
                         <input id="search" type="search"  placeholder="Tengo antojo de..." name="busqueda" class="autocomplete grey-text">
                       </div>
                     
                   </div>
                 </form>
            </div>
         
        </div>
    </nav>

<ul class="sidenav "  id="mobile-nav" >
  <p class="center-align ">Inicio</p>
    <li>
      <a href="{{ route('home') }}"><i class="material-icons">home</i>Inicio</a>
    </li>
    <li>
      <a href="{{route('categorias.index')}}"><i class="material-icons left">view_module</i>Categorias</a>
    </li>


    <li>
      <a href="{{ route('random') }}">
        <i class="material-icons">shuffle </i>
      Al azar
      </a>
    </li>
    <li class="searchbtn">
      <a><i class="material-icons">search</i>Buscar</a>
    </li>

  @guest
    <hr>
    <p class="center-align ">Entrar</p>
    <li>
      <a href="{{ route('login') }}"><i class="material-icons">how_to_reg</i>Entrar</a>
    </li>
  @if (Route::has('register'))
    <li>
      <a href="{{ route('register') }}"><i class="material-icons">library_add</i>Registrarse</a>
    </li>
  @endif
  @else
  <hr>
  <p class="center-align ">Vendedores</p>

  <li>
      <a href="{{ route('seller.create') }} "><i class="material-icons"> attach_money</i>Vender</a>
  </li>
  <li class="nav-item dropdown">
    <a href="{{route('profile')}}">
      <i class="material-icons">supervised_user_circle</i>
      {{ Auth::user()->name }} <span class="caret"></span>
    </a>
  </li>

  <li>
    <a class="btn red  " href="{{ route('logout') }}"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
      salir
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    </form>
  </li>
  
  @endguest 
</ul>

        <main class="py-4" >
            @yield('content')
        </main>
        
        <footer class="page-footer footer-color">
          <div class="container">
            <div class="row">
              <div class="col m4 s12">
                <h5 class="footer-text-color">ComiCUT</h5>
                <p class="  udg-text">Esta pagina fue creada para los estudiantes que dia a dia se ganan su propio dinero vendiendo comida en el centro universitario de Tonala.</p>
              </div>
              <div class="col m4 s6 ">
                <h5 class="footer-text-color ">Contenido</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Preguntas y Respuestas</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Acerca de Comicut</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Contactar al creador</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Tutorial</a></li>
                </ul>
              </div>
              <div class="col m4 s6 ">
                <h5 class="footer-text-color ">Siguenos</h5>
                <ul>
                  <li>
                    <a class="valign-wrapper" href="https://twitter.com/Cutonala_udg"><i class="fab fa-twitter fa-2x"></i>&nbsp;&nbsp; &nbsp;&nbsp;Twitter</a>
                  </li>
                  <li>
                    <a class="valign-wrapper" href="https://www.facebook.com/centrouniversitariodetonala/">
                      <i class="fab fa-facebook fa-2x fb"></i>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;Facebook</a>
                    
                  </li>
                  <li>
                    <a class="yt valign-wrapper" href="https://www.youtube.com/channel/UCdAVkoHuKAMWM3yaOW_uZPQ"><i class="fab fa-youtube fa-2x yt"></i>   &nbsp;&nbsp;&nbsp; Youtube</a>
                  </li>
                  <li>
                  <a class="im valign-wrapper " href="https://www.instagram.com/cutonala.udg/"><i class="fab fa-instagram fa-2x im"></i> &nbsp;&nbsp; &nbsp;&nbsp;Instagram</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            <center class="footer-text-color">
              © 2018 Chikavi - Luis Rojas -
            </center>
            </div>
          </div>
        </footer>
</body>
</html>
