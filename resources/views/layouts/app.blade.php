
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ComiCut @yield('title')</title>
    <meta NAME="DC.Language" SCHEME="RFC1766" CONTENT="Spanish">
    <meta NAME="AUTHOR" CONTENT="Luis Rojas">
    <meta NAME="REPLY-TO" CONTENT="chikavi@hotmail.com">
    <LINK REV="made" href="mailto:chikavi@hotmail.com">
    <meta NAME="KEYWORDS" CONTENT="comida,udg,ventas,vendedores,udventas">
    <meta NAME="Resource-type" CONTENT="Catalog">
    <meta NAME="robots" content="ALL">
    <meta name="description" content="Consulta información sobre los vendedores que venden en los diferentes centros, horarios, lugares de venta, productos, números, y muchas cosas mas.">   
      

    <link rel="icon" href="{{asset('ico.png')}}" sizes="16x16">
    <link rel="manifest" href="{{asset('manifest.json')}}">
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
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
         $('.dropdown-trigger').dropdown();

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
     .dropdown-content{
    top:100% !important;
   }
   .menu-navbar-color{
    color: #f8f8f8 !important;
   }

   </style>
  
</head>
<body>
  <!-- Load Facebook SDK for JavaScript -->

    <nav>
        <div class="nav-wrapper color-cut">
          <a href="{{ route('home') }}" class="brand-logo center">ComiCut</a>
          <div class=" hide-on-large-only">
          <a  class="search @yield('withsearch')  brand-logo right searchbtn" ><i class="white-text material-icons ">search</i></a>
            
          </div>
          <a href="#" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
          <ul class="left hide-on-med-and-down">
            <!--<li><a href="{{route('categorias.index')}}"><i class="material-icons left">view_module</i>Categorias</a></li>-->
            <li><a href="{{route('welcome') }}"><i class="material-icons left">view_module</i>Catalogo</a></li>
              <li>    
                   
                      
               
          
                      
                            
                  </li>   
            

          </ul>
          <ul class="right hide-on-med-and-down">
            
             @guest
                            <li><a href="{{ route('login') }}">Ingresar</a></li>
                                @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Registrar</a></li>
                                @endif
                        @else
                        
                        
                         <li style="width:auto !important;min-width: 150px;"><a class='dropdown-trigger right-align' href='#' data-target='dropdown1'> {{ Auth::user()->name }}</a>
                              </li>

                             <ul id='dropdown1' class='dropdown-content' >

                              <li><a href="{{ route('seller.create') }} " ><i class="fas fa-funnel-dollar valign-wrapper green-text"></i>Vender</a></li>
                              <li><a href="{{ route('profile') }}"><i class="fas fa-user blue-text"></i>perfil</a></li>
                              <li class="divider" tabindex="-1"></li>
                              <li class="divider" tabindex="-1"></li>
                              <li class="red"><a class="dropdown-item white-c" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i>Salir
                                    </a></li>
                            </ul>

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

<ul class="sidenav white-text"  id="mobile-nav" style="background: #17202f;" >
  <p class="center-align bold">Inicio</p>
    <li>
      <a class="grey-color menu-navbar-color"  href="{{ route('home') }}"><i class="material-icons" style="color:#F18F01 !important;">home</i>Inicio</a>
    </li>
    <li>
      <a class="menu-navbar-color" href="{{route('categorias.index')}}"><i class="material-icons left" style="color:#F56476 !important">view_module</i>Categorias</a>
    </li>


    <li>
      <a class="menu-navbar-color" href="{{ route('random') }}">
        <i class="material-icons" style="color:#FFBF00 !important;">shuffle </i>
      Al azar
      </a>
    </li>
    <li>
     <!--  class="searchbtn"  -->
    
      <a class="menu-navbar-color" href="{{ route('busqueda') }}"><i class="material-icons" style="color:#A43982 !important;" >search</i>Buscar</a>
    </li>

    <li>
      <a class="menu-navbar-color" href="{{ route('bot') }}"><i class="fab fa-facebook-messenger fa-2x" style="color:#049be5 !important ;"></i>Bot</a>
    </li>

  @guest
    <p class="center-align bold">Entrar</p>
    <li>
      <a class="menu-navbar-color" href="{{ route('login') }}"><i class="material-icons" style="color:#5D737E">how_to_reg</i>Entrar</a>
    </li>
  @if (Route::has('register'))
    <li>
      <a class="menu-navbar-color" href="{{ route('register') }}"><i class="material-icons" style="color:#40C9A2">library_add</i>Registrarse</a>
    </li>
  @endif
  @else
  <p class="center-align bold">Ventas</p>

  <li>
      <a class="menu-navbar-color" href="{{ route('seller.create') }} "><i class="material-icons " style="color:#136F63 !important;" > attach_money</i>Vender</a>
  </li>
  <li class="nav-item dropdown">
    <a class="menu-navbar-color" href="{{route('profile')}}">
      <i class="material-icons" style="color: #006E90 !important;">supervised_user_circle</i>
      {{ Auth::user()->name }} <span class="caret"></span>
    </a>
  </li>

  <li>
    <a class="btn  " style="background: #D72638 !important;" href="{{ route('logout') }}"  onclick="event.preventDefault();  document.getElementById('logout-form').submit();">
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
        
        <footer class="page-footer footer-color"  style="bottom: 0 ;">
          <div class="container">
            <div class="row">
              <div class="col m6 s12">
                <h5 class="footer-text-color">ComiCUT</h5>
                <p class="  udg-text">Esta pagina fue creada para los estudiantes que dia a dia se ganan su propio dinero vendiendo comida u otras cosas.</p>
              </div>
              <div class="col m6 s12 ">
                <h5 class="footer-text-color ">Contenido</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Preguntas y Respuestas</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Acerca de Comicut</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Contactar al creador</a></li>
                  <li><a class="grey-text text-lighten-3" href="{{route('terminos')}}">Terminos y condiciones</a></li>
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
