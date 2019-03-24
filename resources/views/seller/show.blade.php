@extends('layouts.app')

@section('content')

<script type="text/javascript">

	$(document).ready(function(){

     $('.slider').slider({full_width: true});
     $('.collapsible').collapsible();
     $('.materialboxed').materialbox();
     $('.tooltipped').tooltip();

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
	.red-c{
		color: #ed3712;
		font-weight: bold;
	}
	.overnot{
		overflow: auto;
		max-height: 800px;


	}
	.cs{
		background-color: #424C5E;
		color:white;
	}
	.cc{
		background-color: #242B37;
		color:white;
	}
	::-webkit-scrollbar {
    width: 12px;
    color:red!important;
	}
 	::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(255,255,255,0.3); 
    border-radius: 10px;
    color:red!important;
	}
 
	::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(255,255,255,0.5); 
	}


	.dn{
	background-color: #424C5E;
	padding: 1em;
	color:white;
	}
</style>

<div class="row">
	@if(Auth::check())
		@if(Auth::user()->id == $seller->user_id)
		

		@endif
	@endif

	<div class="slider  hide-on-large-only">
	    <ul class="slides">
	      <li>
	        <img src="https://www.heb.com.mx/media/catalog/product/cache/20/image/d954a60aa48ef57022b0eb878e93bc1f/p/a/pay_de_pi_a_224525.jpg"> <!-- random image -->
	        <div class="caption center-align">
	        </div>
	      </li>
	      <li>
	        <img src="https://www.goya.com/media/3196/champurrado-thick-mexican-hot-chocolate.jpg?quality=80">> <!-- random image -->
	        <div class="caption left-align">
	          <!-- <h3>Left Aligned Caption</h3>
	          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5> -->
	        </div>
	      </li>
	      <li>
	        <img src="https://images-gmi-pmc.edge-generalmills.com/0ea1f05d-57a3-494e-a8f5-28030b07d4ec.jpg"><!-- random image -->
	        <div class="caption right-align">
	         <!--  <h3>Right Aligned Caption</h3>
	          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5> -->
	        </div>
	      </li>
	      <li>
	        <img src="https://www.goya.com/media/3196/champurrado-thick-mexican-hot-chocolate.jpg?quality=80"> <!-- random image -->
	        <div class="caption center-align">
	          <!-- <h3>This is our big Tagline!</h3>
	          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5> -->
	        </div>
	      </li>
	    </ul>
  	</div>

	<div class="col s12 m6 animated fadeInLeft">
		<div class="card">
			<!-- <div class="row valign-wrapper">

					<div class="col s9">
						<h2 class="center-align  ">{{ $seller->title }}</h2>
					</div>

					<div class="col s2">
					@if(Auth::check())
					@if(Auth::user()->id == $seller->user_id)
						<a href="{{ route('seller.edit',$seller->id) }}"><i class="material-icons" style="font-size: 2.5em;">create</i>		
						</a>
					@endif
					@endif
					</div>

			</div>

 -->

						<h2 class="center-align  ">{{ $seller->title }}</h2>



			<center>

			<div class="chip  tooltipped" data-position="top" data-tooltip="¡Marcale!">
				<span class="valign-wrapper">
					<i class="material-icons">call</i>{{$seller->cellphone}}
				</span>	
			</div>
			<div class="chip valign-wrapper">
				<span class="valign-wrapper">
					<i class="material-icons">fastfood</i>{{$seller->category}}
				</span>
			</div>
			<div class="chip valign-wrapper tooltipped" data-position="top" data-tooltip="¡Aqui puedes encontrarlo!">
				<span class="valign-wrapper">
					<i class="material-icons">place</i>{{$seller->salon}}
				</span>
			</div>
			</center>

			<center>
				<a href="https://api.whatsapp.com/send?phone=5213327276923&text=hola,{{$seller->title}} aun%20tienes%20comida%20disponible?" class="btn">Mandar Mensaje</a>
				<a href="tel:+5213327276923" class="btn blue">llamar</a>
              
			</center>
				@if($seller->available)
			<p class="center-align green-c tooltipped" data-position="top" data-tooltip="¡Aun tiene producto!">
					disponible
			</p>
				@else
				<p class="center-align red-c tooltipped" data-position="top" data-tooltip="¡ya no tiene productos o esta ocupado!">
					Ausente
			</p>
				@endif
		<!--	<ul class="collapsible ">
			    <li class="active">
			      <div class="collapsible-header cc"><i class="material-icons">assignment</i>Descripción</div>
			      <div class="collapsible-body	">
			      	<p>{{$seller->description}}</p>
			      </div>
			    </li>
			</ul>
			<ul class="collapsible ">
			    <li class="active" >
			      <div class="collapsible-header cc"><i class="material-icons">access_time</i>Horarios</div>
			      <div class="">
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
			</ul>  -->
			<div class="dn ">
				<h5><i class="material-icons">assignment</i>Descripción</h5>
			</div>
			<div  style="margin: 2em  !important;">
				<p > {!! $seller->description !!}</p>
				
			</div>
			<div class="dn ">
				<h5><i class="material-icons">assignment</i>Horario</h5>
			</div>
			@foreach($schedules as $schedule)
			<div class="row" style="padding: 2em;">
				<div class="col s6">
					{{ $schedule->day }}
				</div>
				<div class="col s6">
					{{ $schedule->start_hour }} - {{ $schedule->finish_hour }}
				</div>
			</div>
			@endforeach

	</div>	
</div>


<div class="col s12 m6 ">
	<div class="card" style="height: 700px;">
		<div class="row valign-wrapper" >
			<div class="col s9">
				<h3 class="center-align animated zoomIn delay-1s">Productos</h3>
			</div>
			<div class="col s3">
				@if(Auth::check())
				@if(Auth::user()->id == $seller->user_id)
				<a href="{{route('items.create')}}"><i class="material-icons" style="font-size: 2.5em;color:green;">add</i>		
				</a>
				@endif
				@endif
			</div>

		</div>

		@foreach($seller->items as $item)
		<ul class="collection">
			<li class="collection-item avatar">
		      <img src="https://www.heb.com.mx/media/catalog/product/cache/20/image/d954a60aa48ef57022b0eb878e93bc1f/p/a/pay_de_pi_a_224525.jpg" alt="" class="circle materialboxed tooltipped" data-position="top" data-tooltip="¡click, para aumentar!">
		      <span class="title">{{$item->title}}</span>
		      <p>${{$item->pricing}}
		      </p>
		      @if(Auth::check())
				  @if(Auth::user()->id == $seller->user_id)
			      <a href="{{route('items.edit',$item->id)}}">Editar</a>
			      <form method="POST" action="{{ route('items.destroy',$item->id) }}">
			      	@csrf
			      	@method('DELETE')
					<button class="btn red-c" type="submit">Eliminar</button>
			      </form>
				@endif
			@endif
		    </li>
		</ul>
		@endforeach
		
	</div>
</div>


	
@endsection