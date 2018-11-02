@extends('layouts.app')

@section('content')
<script>
	  $(document).ready(function(){
    $('.collapsible').collapsible();
  });

</script>
<style>
	body{
		background-color: #211e1e;
	}
	.green-c{
		color:green;
		font-weight: bold;
	}
</style>
<div class="row">
	@if(Auth::user()->id == $seller->id)
	<div class="row">
		<div class="col m6">
			<a href="{{ route('seller.edit', $seller->slug)}}" class="btn btn-block">Editar</a>
		</div>
		<div class="col m6">
			<a href="{{ route('seller.edit', $seller->slug)}}" class="btn btn-block blue">Crear</a>			
		</div>
	</div>
	@endif
	<div class="col s12 m6 animated fadeInLeft">
		<div class="card">
			<h2 class="center-align  ">{{ $seller->bussinessName }}</h2>
			<img src="{{$seller->image}}" alt="" class="responsive-img">
			<h5>{{ $seller->description }}</h5>
			
			<div class="chip">
			{{$seller->cellphone}}
			</div>
			<div class="chip">
				D103
			</div>
			<button class="btn">Contactar</button>
			<p class="center-align green-c">Disponible</p>
			<ul class="collapsible">
			    <li>
			      <div class="collapsible-header"><i class="material-icons">access_time</i>Horarios</div>
			      <div class="collapsible-body">
			      	<span>Lunes</span><span class="right">9:00Am - 2:00PM</span>
			      </div>
			      <div class="collapsible-body">
			      	<span>Martes</span><span class="right">9:00Am - 2:00PM</span>
			      </div>
			      <div class="collapsible-body">
			      	<span>Miercoles</span><span class="right">9:00Am - 2:00PM</span>
			      </div>
			      <div class="collapsible-body">
			      	<span>Jueves</span><span class="right">9:00Am - 2:00PM</span>
			      </div>
			      <div class="collapsible-body">
			      	<span>Viernes</span><span class="right">9:00Am - 2:00PM</span>
			      </div>

			    </li>
			    
			</ul>
	</div>	
</div>


	<div class="col s12 m6  animated fadeInRight">
		<div class="card" >
			<h3 class="center-align animated zoomIn delay-1s">Paquetes y precios</h3>
			@foreach($seller->items as $item)
			<p>{{$item->title}}</p><p class="green-c">${{$item->pricing}}</p>
			@endforeach
		</div>
	</div>
	
</div>
	
@endsection