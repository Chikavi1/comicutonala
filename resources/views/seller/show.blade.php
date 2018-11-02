@extends('layouts.app')

@section('content')
<script>
	  $(document).ready(function(){
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
		max-height: 400px;

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

</style>
<div class="row">
	@if(Auth::check())
	@if(Auth::user()->id == $seller->user_id)
	

	@endif
	@endif
	<div class="col s12 m6 animated fadeInLeft">
		<div class="card">
			<div class="row valign-wrapper">
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

			<img src="{{$seller->image}}" alt="" class="responsive-img">
			
			<div class="chip tooltipped" data-position="top" data-tooltip="¡Marcale!">
			{{$seller->cellphone}}
			</div>
			<div class="chip">
			{{$seller->category}}
			</div>
			<div class="chip tooltipped" data-position="top" data-tooltip="¡Aqui puedes encontrarlo!">
				{{$seller->salon}}
			</div>
			<button class="btn">Contactar</button>
				@if($seller->available)
			<p class="center-align green-c tooltipped" data-position="top" data-tooltip="¡Aun tiene producto!">
					disponible
			</p>
				@else
				<p class="center-align red-c tooltipped" data-position="top" data-tooltip="¡ya no tiene productos o esta ocupado!">
					Ausente
			</p>
				@endif
				<ul class="collapsible">
			    <li>
			      <div class="collapsible-header"><i class="material-icons">access_time</i>Descripción</div>
			      <div class="collapsible-body">
			      	<p>{{$seller->description}}</p>
			      </div>
			    </li>
			</ul>
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


	<div class="col s12 m6  animated fadeInRight overnot">
		<div class="card" >
			<div class="row valign-wrapper">
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
			      <img src="https://materializecss.com/images/yuna.jpg" alt="" class="circle materialboxed tooltipped" data-position="top" data-tooltip="¡click, para aumentar!">
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
	
</div>
	
@endsection