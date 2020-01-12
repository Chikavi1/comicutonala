@extends('layouts.app')

@section('content')


<div class="slider">
    <ul class="slides">
      <li>
        <img src="{{ asset('img/hamburguesas.jpg') }}"> <!-- random image -->
        <div class="caption center-align">
          <h3 class="bold">¡Nuestros Aliados!</h3>
          <h5 class="light bold" style="color: #17202F;">Agradecemos su acción.</h5>
        </div>
      </li>
      <li>
        <img src="{{ asset('img/bebidas.jpg') }}"> <!-- random image -->
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



<style>
.ganadores{
	height: 50em;
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

<div class="ganadores" >
  	
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

</div>






<script>
	
 $(document).ready(function(){
    $('.slider').slider({
    	indicators: false
    });
  });

</script>


		<div class="col offset-m2 m8 s12 card terminos">
				<h5 class="center-align ">Terminos y condiciones</h5>
			<p>Si eres un ganador ponte en contacto con el <a style="color:white;font-weight: bold;" href="https://api.whatsapp.com/send?phone=5213327276923&amp;text=hola Luis,soy uno de los seleccionados" >administrador</a> para poder darte un codigo</p>
			<p style="text-align: justify;">El alumno ganador de una comida debera de presentar la credencial de estudiante,en caso de no tener podra presentar ine o el pasaporte y aparte el kardex o constancia de estudio antes y al momento de canjearlo con el vendedor,no se hacen excepciones</p>
			<p style="text-align: justify;">El vendedor dara las opciones para que el usuario pueda escoger la comida que le guste</p>
		</div>

<div class="container">
	
<p>* para mayor información mandar un mensaje <a href="https://api.whatsapp.com/send?phone=5213327276923&amp;text=hola Luis!" class="btn color-cut">Luis Rojas</a></p>
</div>
@endsection
