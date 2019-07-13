@extends('layouts.app')

@section('content')
<script>
	
$(document).ready(function(){
    
    $('.tabs').tabs();
    $('.modal').modal();
    $('.tooltipped').tooltip();
     $('.materialboxed').materialbox();
  });
   
</script>	
	<style>

		hr { 
		    border-top: 1px solid #e0e0e0;
		  }
		.tabs .tab a{
            color:#17202f;
        } /*Black color to the text*/

        /*Text color on hover*/
		
		.tabs .tab a:hover {
            background-color:none;
            color:green;
        } 
        .tabs .tab a.active {
            background-color:white;
            color:green;
        } /*Background and text color when a tab is active*/

        .tabs .indicator {
            background-color:green;
        } /*Color of underline*/
		.padding{
			padding: 1.5em;
		}
		.margin-lados{
			margin-left: 2em !important;
		}
		.modal { width: 95% !important ; height: 95% !important ; }
		.img-index{
			width: 150% !important;
		}
		.justify-text{
			text-align: justify;
		}
		.color-green{
			color:green;
		}
		.pricing-size{
			font-size: 2em;
		}
	</style>
	<script language="Javascript">
document.oncontextmenu = function(){return false}
</script>
			<img class="responsive-img materialboxed hide-on-med-and-up " src="{{Storage::url($seller->image)}}"  alt="" >

	<div class="row" style="padding: 2em;" >
		<div class="col m6 s12">

			<img class="responsive-img materialboxed hide-on-small-only" src="{{Storage::url($seller->image)}}"  alt="" >

		</div>
		<div class="col m5 s12 card">
			@if(Auth::id() ==  $seller->user_id)
			<div class="row">
				<div class="col s6">
					<a href="{{ route('seller.edit',$seller->id) }}" class="btn center-align btn-block color-cut">Editar</a>
				</div>
				<div class="col s6">
					<a href="{{ route('items.creando',$seller->id) }}" class="btn center-align btn-block color-cut">Agregar Productos</a>
				</div>
			</div>
			@endif


			<h2 class="center-align">{{ $seller->title }}</h2>
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
			<br>
			<a href="https://api.whatsapp.com/send?phone=5213327276923&text=hola,{{$seller->title}} aun%20tienes%20comida%20disponible?" class="btn color-cut">Mandar Mensaje</a>
				<a href="tel:+5213327276923" class="btn ">llamar</a>
			</center>
			<br>
					<div class="center-align">
					@if($seller->available == 1)
						<p class="color-green">Disponible</p>
					@elseif($seller->available == 0)
						<p class="red-text">No Disponible</p>
					@endif
					</div>
			<br>
		</div>
	</div>

<div class="padding">
	

			<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
			    <li class="tab"><a href="#test1">Info</a></li>
			    <li class="tab"><a class="active" href="#test2">Productos</a></li>
			  </ul>
		

<div id="test1" class="col s12">
	<div class="padding">
		
	<div class="row">
	    <div class="col s12 m3 offset-m1">
	      <div class="card blue-grey darken-1">
	        <div class="card-content white-text">
		  		<h3 class="header center-align">Horario</h3>
	          <span class="card-title center-align">
	          {{ $seller->schedule }}
	          </span>
	        </div>
	      </div>
	    </div>

	     <div class="col s12 m6">
	      <div class="card color-cut">
	        <div class="card-content white-text">
		 	<h3 class="center-align" >Descripción</h3>
		 	<p class="">
	          {!! $seller->description !!}
		 	</p>
	        </div>
	      </div>
	    </div>
	</div>
	</div>

	
		</div>


<div id="test2" class="col s12">
  	<div class="row">
  		@if(empty($items->count()))
  		<br><br>
  		<center>
  		<img src="{{ asset('img/heart.png') }}" class="center" alt="">
  		</center>
		<h5 class="center-align">Aun no tiene productos :(</h5>
  		@else
		@foreach($items as $item)
		<div class="padding">
		<div class="col s12 m4">
		    <div class="card small">
		    	<a href="#modal{{$item->id}}" class=" modal-trigger">
		    		
			    <div class="card-image waves-effect waves-block waves-light">
			      <img class="activator" src="{{ Storage::url($item->image) }}">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">{{$item->title}}</span>
			    </div>
		    	</a>
			</div>
		</div>
		</div>
		<div id="modal{{$item->id}}" class="modal">
		    <div class="modal-content" style="margin:0;">
				<img class="responsive-img hide-on-med-and-up" src="{{ Storage::url($item->image) }}">


		    	<div class="row">	
		    		<div class="col m6 s12">
		      			<img class="responsive-img hide-on-small-only" src="{{Storage::url($item->image)}}">
		    		</div>
		    		<div class="col m6 s12">
		    			<h4 class="center-align">{{$item->title}}</h4>
		    			<hr>
							<h5>Categoria: {{$item->category}} </h5>
							<p>{!! $item->description !!}</p>
							<p class="color-green pricing-size">$ {{$item->pricing}} MXN</p>
					    </div>
		    		</div>
		    	</div>

		      <div class="modal-footer"  >
					      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
			   </div>
		</div>
		@endforeach
 	</div>
 	@endif
</div>


    
 </div>



@endsection



		


		