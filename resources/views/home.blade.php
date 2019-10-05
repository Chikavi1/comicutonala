@extends('layouts.app')
@section('content')

<style>
    .box{
        height: 30em;
    }
    .box-small{
        height: 10em;
    }
    li.collection-item a{
        color:#17202f;
        font-weight:600;
    }

.w-border{
  margin: 0!important;;
  border: 0!important;
  box-shadow: none!important;
}
</style>
<div class="container margin-top-1 animated fadeInDown">
    
<div class="row card border-color"  >
    <div class="col m3 red border-right hide-on-med-and-down color-cut white-text" style="height: 90%;" >
        <h4 class="center-align">Menu</h4>
       <ul class="collection   w-border ">
          <li class="collection-item color-cut  w-border"><a class="white-text" href="{{ route('profile') }}"> Perfil </a></li>
           <li class="collection-item color-cut  w-border"><a class="white-text" href="{{ route('gratis') }}"> Comida Gratis </a></li>
          <li class="collection-item color-cut  w-border"><a class="white-text" href="{{ route('categorias.index') }}"> Categorias </a></li>
          <li class="collection-item color-cut  w-border"><a class="white-text" href="{{ route('busqueda') }}"> Buscador </a></li>
          <li class="collection-item color-cut  w-border"><a class="white-text" href="{{ route('random') }}"> Comida aleatoria</a> </li>
          <li class="collection-item color-cut  w-border"><a class="white-text" href="{{ route('home') }}"> Reportes </a></li>
          <li class="collection-item color-cut  w-border"><a class="white-text" href="{{ route('bot') }}"> Bot </a></li>
          <li class="collection-item color-cut  w-border"><a class="white-text" href="{{ route('preguntas') }}"> Recomendaciones </a></li>
          <li class="collection-item color-cut  w-border"><a class="white-text" href="{{ route('terminos') }}"> Terminos </a></li>

        </ul>
    </div>
    <div class="col m9"  >
        <h3 class="center-align bold">Inicio</h3>
        <div class="container">
            
        <div class="row padding ">
            <a class="white-text" href="{{ route('welcome') }}">
            <div class="col m5 s12 card box-small center  hoverable" style="margin: .6em;background: #2660A4;">
            <div class="padding">
                    <i class="fas fa-chalkboard-teacher fa-2x"></i>
                    <p class="bold">Ir a catalogo</p>
                </div>
            </div>
            </a>
             <a class="white-text"  href="{{ route('gratis')}}">
            <div class="col m5 s12 card box-small center  hoverable" style="margin: .6em;background: #2D3A3A;">
                <div class="padding">
                    <i class="fas fa-university fa-2x"></i>
                    <p class="bold">Comida Gratis</p>
                </div>
            </div>
            </a>
            <a class="white-text"  href="{{ route('seller.create') }}">
            <div class="col m5 s12 card box-small center hoverable  " style="margin: .6em;background: #185C29;">
                <div class="padding">
                    <i class="fas fa-money-check-alt fa-2x"></i>
                    <p class="bold">Vender</p>
                </div>
            </div>
            </a>
           
            <a  class="white-text" href="{{ route('gratis')}}">
             <div class="col m5 s12 card box-small center  hoverable" style="margin: .6em;background: #6B0504;">
                 <div class="padding">
                    <i class="fas fa-money-check-alt fa-2x"></i>
                    <p class="bold">Comida Gratis</p>
                </div>
            </div>
            </a>
        </div>
        </div>
    </div>
</div>
</div>
@endsection
