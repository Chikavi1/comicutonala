@extends('layouts.app')

@section('content')
<div id="inicio" >
      <h2 class="center-align">RandomEat</h2>
      <p class="center-align">¿No sabes que comer?</p>
      <p class="center-align">Nosotros te ayudamos</p>
    </div>
     <!-- <p class="center-align">Nuestra aplicacion te ayuda de forma aleatoria mostrandote una opcion para comer.</p>-->
	<div class="row">
		<div class="col s12 m6 offset-m3">
			
		<div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="{{ Storage::url($seller->image) }}">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">{{ $seller->title }}<i class="material-icons right">more_vert</i></span>
      <p><a href="{{route('seller.show',$seller->slug)}}">ver mas</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">{{$seller->title}}<i class="material-icons right">close</i></span>
      <p>{{$seller->description}}</p>
      <p>{{ $seller->user->name }}</p>
      <p class="color-blue">{{$seller->cellphone}}</p>
    </div>
  </div>
		</div>
	</div>

@endsection