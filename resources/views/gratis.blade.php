@extends('layouts.app')

@section('content')
<h2 class="center-align">Comida a un universitario</h2>

<h5 class="center-align bold">Alumnos beneficiados</h5>

<div class="row center-align">
	<div class="col offset-m2 m8 s12 ">	
		<ul class="collection">
			@foreach($users as $user)
		  <li class="collection-item avatar">
	      <span class="title blue-text bold">{{$user->code}}</span>
	      <p class="bold" >{{ $user->name }}<br>
	         {{ $loop->iteration }}
	      </p>
	    </li>
			@endforeach
  	</ul>
	</div>
</div>

<div class="container center">	
<img src="{{ asset('img/hamburguesas.jpg') }}" alt="comida" class="img-responsive" width="200">
<img src="{{ asset('img/hamburguesas.jpg') }}" alt="comida" class="img-responsive" width="200">
<img src="{{ asset('img/hamburguesas.jpg') }}" alt="comida" class="img-responsive" width="200">
<img src="{{ asset('img/hamburguesas.jpg') }}" alt="comida" class="img-responsive" width="200">
<img src="{{ asset('img/hamburguesas.jpg') }}" alt="comida" class="img-responsive" width="200">
<img src="{{ asset('img/hamburguesas.jpg') }}" alt="comida" class="img-responsive" width="200">
<img src="{{ asset('img/hamburguesas.jpg') }}" alt="comida" class="img-responsive" width="200">
<img src="{{ asset('img/hamburguesas.jpg') }}" alt="comida" class="img-responsive" width="200">
<img src="{{ asset('img/hamburguesas.jpg') }}" alt="comida" class="img-responsive" width="200">
<img src="{{ asset('img/hamburguesas.jpg') }}" alt="comida" class="img-responsive" width="200">
<img src="{{ asset('img/hamburguesas.jpg') }}" alt="comida" class="img-responsive" width="200">
<img src="{{ asset('img/hamburguesas.jpg') }}" alt="comida" class="img-responsive" width="200">
</div>


<div class="row">	
		<div class="col offset-m2 m8 s12 card">
				<h5 class="center-align">Terminos y condiciones</h5>
			<p>Si eres un ganador ponte en contacto con el <a href="https://api.whatsapp.com/send?phone=5213327276923&amp;text=hola Luis,soy uno de los seleccionados" >administrador</a> para poder darte un codigo</p>
			<p>El alumno ganador de una comida debera de presentar la credencial de estudiante,en caso de no tener podra presentar ine o el pasaporte y aparte el kardex o constancia de estudio antes y al momento de canjearlo con el vendedor,no se hacen excepciones</p>
			<p>El vendedor dara las opciones para que el usuario pueda escoger la comida que le guste</p>
		</div>
	</div>
<div class="container">
	
<p>para mayor información mandar un mensaje <a href="https://api.whatsapp.com/send?phone=5213327276923&amp;text=hola Luis!" class="btn color-cut">3327276923</a></p>
</div>
@endsection
