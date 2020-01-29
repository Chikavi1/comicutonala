@extends('layouts.app')

@section('content')

<style>
.ganadores{
	height: 35em;
	background: #171578;
	padding:3em 2em;
	margin:0em 1.4em;
	border-radius: 3em 3em 0.5em 5em;
}
.title-ganadores{
	padding: 1em 0em;
	color:white;
	font-size: 2em;
}
.terminos{
	background: #319E32;
	margin:2em 1.4em ;
	padding: 1em;
	color:white;
}
.bold{
	font-weight: bold;
}
</style>

<div class="slider">
    <ul class="slides">
      <li>
        <img src="{{ asset('img/hamburguesas.jpg') }}"> <!-- random image -->
        <div class="caption center-align">
          <h3 class="bold"></h3>
          <h5 class="white-text bold" >¡Nuestros Aliados!</h5>
        </div>
      </li>
      <li>
        <img src="https://scontent.fgdl3-1.fna.fbcdn.net/v/t1.0-9/31819620_2187228024635531_6560307273258762240_n.jpg?_nc_cat=108&_nc_ohc=kVyjpdeGltcAX8czxgQ&_nc_ht=scontent.fgdl3-1.fna&oh=26bc38eb9b6307f85e29c7aec58f34d3&oe=5E9BF8AE"> <!-- random image -->
        <div class="caption left-align">
          <h3 class="bold">Maya</h3>
          <h5 class="light grey-text text-lighten-3"></h5>
        </div>
      </li>
      <li>
        <img src="{{ asset('img/hamburguesas.jpg') }}"> <!-- random image -->
        <div class="caption right-align">
          <h3 class="bold">Chico pay</h3>
          <h5 class="light grey-text text-lighten-3"></h5>
        </div>
      </li>
      <li>
        <img src="https://i.ibb.co/Lnr3DL5/cut.jpg"> <!-- random image -->
        <div class="caption center-align">
          <h3 style="color:#17202F;font-weight: bold;">¡Gracias!</h3>
          <h5 class="light grey-text text-lighten-3"></h5>
        </div>
      </li>
    </ul>
  </div>
  <h2 class="center-align">Comida a un universitario</h2>

<div class="padding">
	<p style="font-size: 1.5em;font-weight: bold;">¿En qué consiste el programa <span style="color: #09b6df;font-size: 1.2em;">Comida a un universitario</span>? </p>
	<p style="text-align: justify;font-weight: bold;">El programa pretende que de forma aleatoria algunos alumnos del cutonala puedan recibir un día a la semana comida gratis, la idea es que los vendedores donen uno de sus alimentos a esta noble causa &sup1;</p>
	<p>&sup1;.La plataforma no cobra dinero a los vendedores, el único requisito que le pedimos a nuestros vendedores es que done un alimento para los alumnos del Cutonala, de igual manera cualquier persona está invitada a participar en este programa.</p>
	<p>*nota, el programa fue idea al creador de la plataforma.</p>
</div>


<!--<div class="ganadores hide" >
  	
<h5 class="title-ganadores">Alumnos <span style="color: #09b6df;font-weight: bold;">
	Ganadores</span></h5>

<div class="row center-align">
	<div class="col offset-m2 m8 s12" style="background: #171578;">	
		<ul class="collection" >
			@foreach($users as $user)
		  <li class="collection-item avatar" style="border:none;background: #171578;color:white;">
			<img src="https://cdn3.iconfinder.com/data/icons/award-gray-set-1-1/100/award-13-512.png" alt="" class="circle">
	      <span class="title blue-text bold">{{$user->code}}</span>
	      <p class="bold" >{{ $user->name }}<br>
	         lugar {{ $loop->iteration }}
	      </p>
	    </li>
			@endforeach
  	</ul>
	</div>
</div>

</div>-->






<script>
	
 $(document).ready(function(){
    $('.slider').slider({
    	indicators: false
    });
  });

</script>


		<div class="col offset-m2 m8 s12 card terminos">
				<h5 class="center-align ">Términos y condiciones</h5>
			<h5>Vendedores</h5>
			<p>Se sugiere que donen unos de sus producto de gama media, un alimento el cual ustedes consideren que puede ayudar al alumno a que no tenga hambre</p>
			<h5>Ganadores</h5>
			<p>Si eres un ganador ponte en contacto con el <a style="color:white;font-weight: bold;" href="https://api.whatsapp.com/send?phone=5213327276923&amp;text=hola Luis,soy uno de los seleccionados" >administrador</a> para poder darte un codigo</p>
			<p style="text-align: justify;">El alumno ganador de una comida deberá de presentar una credencial con foto que identifique que es el, puede ser credencial de estudiante, credencial de elector, pasaporte o licencia de conducir.</p>
			<p style="text-align: justify;">El vendedor dará las opciones para que el usuario pueda escoger la comida que le guste</p>
		</div>

<div class="container">
	
<p>* para mayor información mandar un mensaje <a href="https://api.whatsapp.com/send?phone=5213327276923&amp;text=hola Luis!" class="btn color-cut">Luis Rojas</a></p>
</div>
@endsection
