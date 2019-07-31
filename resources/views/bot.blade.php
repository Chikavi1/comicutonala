@extends('layouts.app')
@section('content')
<link href="https://fonts.googleapis.com/css?family=Darker+Grotesque|Roboto:300,400&display=swap" rel="stylesheet">
<style> 

    h1{
      font-family: 'Darker Grotesque', sans-serif;
    }
    .link-messenger{
      color:white;
    }
    .link-messenger:hover{
      color: #049be5;
    }
   
    .nomb{
      font-size: 1.2em;
      font-weight: bold;
    }
    .p1{
      margin-left: 2em;
    }
  
</style>
<div class="row" >
  <div class="col s12 color-cut white-text ">
    <div class="text-center animated zoomIn  center-align margin-bottom-1">
      <h1 class="">”Hola" a Olvis.</h1>
      <a href="https://www.messenger.com/t/370400713671013"><i class="fab fa-facebook-messenger fa-4x link-messenger"></i></a>
      <p class="green-text bold">Próximamente</p>
    </div>
  </div>
</div>
<div class="row ">
  <div class="col s12 animated zoomIn delay-1s center-align ">
    <h4 class="bold">¿Cómo utilizar el Bot?</h4>
    <p class="container justify"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae dolore delectus iure, ex amet, tenetur ab harum possimus magnam, porro itaque ipsa aut reprehenderit fuga optio, tempore. Debitis unde quae voluptates, consequuntur expedita ab omnis error, quis, explicabo enim assumenda sit? Consectetur enim nemo atque ipsa architecto id, quasi earum quod necessitatibus. Incidunt saepe dolores voluptates. Nobis dolore beatae repellat, error! .</p>
    <img src="{{ asset('img/em1.png') }}" alt="" class="responsive-img">
  </div>
</div>
<div class="row color-cut white-text ">
  <div class="col s12 animated zoomIn delay-1s center-align margin-bottom-1 ">
    <h4 class="green-text bold">Estas son algunas instrucciones</h4>

    <div class="row left-align"> 
        <div class="col s12 m3 offset-m3">
          <ul class="p1">
            <li>Hola</li>
            <li>Comida aleatoria</li>
            <li>Quien te hizo?</li>
            <li>buscar por nombre</li>
            <li>cantidad de vendedores</li>
          </ul>
        </div>
        <div class="col s12 m4">
          <ul class="p1" >
            <li>está disponible <span class="green-text nomb">nombre vendedor</span>?</li>
            <li>dame el numero de <span class="green-text nomb">nombre vendedor</span>?</li>
            <li>donde vende <span class="green-text nomb">nombre vendedor</span>?</li>
            <li>cúal es el horario de <span class="green-text nomb">nombre vendedor</span>?</li>
          </ul>
        </div>
    </div>

  </div>
</div>
<div class="row ">
  <div class="col s12 animated zoomIn delay-1s center-align ">
    <h4 class="green-text bold">Empecemos</h4>
    <div class="hide-on-med-and-down margin-bottom-1">
      <div>
        <a href="https://www.messenger.com/t/370400713671013"><i class="fab fa-facebook-messenger fa-4x "></i></a>
      </div>
    </div>

    <div class="hide-on-med-and-up p5 ">
      <p class="left-align margin-bottom-1">1.- Debes de tener instalado "Messenger" </p>
      <p class="left-align margin-bottom-1">2.- Busca "comicut" y lo seleccionas</p>
      <img src="{{ asset('img/comi-messenger.png') }}" class="responsive-img" alt="Demostracion en la app de messenger">
      <br><br><br>
      <p class="left-align margin-bottom-1">3.- Da click en "Empezar"</p>
      <img src="{{asset('img/boton-empezar.png')}} "  class="responsive-img" alt="boton empezar">
      <br><br>
      <p class="left-align margin-bottom-1 bold">4.- Listo,Disfruta del servicio</p>
    </div>
    
</div>
</div>
@endsection



