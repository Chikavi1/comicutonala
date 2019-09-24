@extends('layouts.app')

@section('content')
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<script>
	
$(document).ready(function(){
    
    $('.tabs').tabs();
    $('.modal').modal();
    $('.tooltipped').tooltip();
     $('.materialboxed').materialbox();
  });
   
</script>	
	<style>
		p  {
font-family: 'Montserrat', sans-serifl
	
}

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
		.modal-show { width: 95% !important ; height: 95% !important ; }
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
			font-size: 1.5em;
		}
		.available-size{
			font-size: 1.3em;
		}
		input#busqueda{
		}

	</style>


	<!--<script language="Javascript">
document.oncontextmenu = function(){return false}
</script>-->
@if ($message = Session::get('success'))
<div class="color-cut">
  <p class="center white-text" style="margin-top: 0 !important;padding: 1em; "><strong>{{ $message }}</strong></p>
</div> 
@endif
			<img class="responsive-img materialboxed hide-on-med-and-up " src="{{Storage::url($seller->image)}}" width="550" style="height: 450px;" alt="{{$seller->title}}" >

	<div class="row" style="padding: 2em;" >
		<div class="col m6 s12">

			<img class="responsive-img materialboxed hide-on-small-only" style="height: 450px;" src="{{Storage::url($seller->image)}}" width="550"  alt="{{$seller->title}}" >

		</div>
		<div class="col m5 s12 card ">
			@if(Auth::id() ==  $seller->user_id)
			<div class="row margin-top">
				<div class="col s6 ">
					<a href="{{ route('seller.edit',$seller->id) }}" class="btn center-align btn-block color-cut ">Editar Perfil</a>
				</div>
				<div class="col s6">
					<form action="{{ route('items.creando') }}" method="post">
					@csrf
					<input type="hidden" value="{{$seller->id}}" name="uid">
						<input type="submit" value="crear Producto" class="btn center-align btn-block color-cut">
					</form>
					<!-- <a href="{{ route('items.creando',$seller->id) }}" class="btn center-align btn-block color-cut">Agregar Productos</a> -->
				</div>
			</div>
			<p class="center-align">Total visitas: {{ $seller->count_visits }}</p>
			@endif


			<h2 class="center-align">{{ ucfirst($seller->title) }}</h2>
			<center>
				
			<div class="chip  tooltipped" style="background: #095387" data-position="top" data-tooltip="¡Marcale!">
				<span class="valign-wrapper white-text" >
					<i class="material-icons">call</i>{{$seller->cellphone}}
				</span>	
			</div>
			<div class="chip valign-wrapper yellow-color-bg">
				<span class="valign-wrapper ">
					<i class="material-icons">fastfood</i>{{$seller->category}}
				</span>
			</div>
			<div class="chip valign-wrapper tooltipped" style="background: #21897E" data-position="top" data-tooltip="¡Aqui puedes encontrarlo!">
				<span class="valign-wrapper white-text">
					<i class="material-icons">place</i>{{$seller->salon}}
				</span>
			</div>
			</center>
			<center>	
			<br>
			<a href="https://api.whatsapp.com/send?phone=	521{{$seller->cellphone}}&text=hola,{{$seller->title}} aun%20estas%20disponible?" class="btn color-cut">Mandar Mensaje</a>
				<a href="tel:+521{{$seller->cellphone}}" class="btn " style="background: #1A8FE3">llamar</a>
			</center>
			<br>
				<div class="center-align">
					@if($seller->available == 1)
						<p class="color-green bold available-size">
							@if(Auth::id() ==  $seller->user_id)
								<a href="#modalDisponible" class="btn green modal-trigger">Disponible</a>
							@else
								Disponible
							@endif	
						</p>

					@elseif($seller->available == 0)
						<p class="red-text bold available-size">
							@if(Auth::id() ==  $seller->user_id)
								<a href="#modalDisponible" class="btn red modal-trigger">No disponible</a>
							@else
								No Disponible
							@endif	
						</p>
					@endif
				@if($seller->verification)
				<p>
					<i class="fas fa-check-circle fa-2x color-green"></i>
				</p>
					<strong class="color-green">Verificado</strong>
				@endif
				</div>
			<br>
		</div>
	</div>

<div>

<div id="modalDisponible" class="modal modal-fixed-footer">
	<div class="modal-content" style="margin:0;">
				<h4>Vendedor</h4>
				<div class="row">
					<div class="col s6 m9">
						Disponible
					</div>
					<div class="col s6 m3">
						<div class="switch">
					    <label>
					      No
					      <input type="checkbox">
					      <span class="lever"></span>
					      Si
					    </label>
					  </div>
					</div>
				</div>
				<h4>Productos</h4>
				@foreach($items as $item)
				<div class="row">
					<div class="col s6 m9">
						{{$item->title}}
					</div>
					<div class="col s6 m3">
						<div class="switch">
					    <label>
					      No
					      <input type="checkbox">
					      <span class="lever"></span>
					      Si
					    </label>
					  </div>
					</div>
				</div>
				@endforeach
	</div>

	<div class="modal-footer"  >
	    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
	</div>
</div>

	

<div class="padding" style="background:#f0f4f8 ">
	

			<ul class="tabs tabs-fixed-width tab-demo z-depth-1">
			    <li class="tab"><a href="#test1">Info</a></li>
			    <li class="tab"><a class="active" href="#test2">Productos</a></li>
			  </ul>
<div id="test1" class="col s12" style="background: #f0f4f8">
	<div class="padding">
		
	<div class="row">
	    <div class="col s12 m3 offset-m1 ">
	      <div class="card  z-depth-4 " style="background: #095387 !important;">
	        <div class="card-content white-text">
		  		<h4 class="header  center-align">Horario</h4>
	          <span class="card-title center-align">
	          	<i class="far fa-clock"></i>
	          {{ $seller->schedule }}
	          </span>
	        </div>
	      </div>
	    </div>

	     <div class="col s12 m6">
	      <div class="card" style="background: #4C81A7;">
	        <div class="card-content white-text">
		 	<h3 class="center-align" >Descripción</h3>
		 	<p class="monsea">
	          {!! ucfirst($seller->description) !!}
		 	</p>
	        </div>
	      </div>
	    </div>
	</div>
	</div>

	
		</div>

<style>

</style>
<div id="test2" class="col s12" style="background: #f0f4f8">
  	<div class="row padding">
  		@if(empty($items->count()))
  		<br><br>
  		<center>
  			<i class="fas fa-info-circle fa-6x blue-text"></i>
  		<!--<img src="{{ asset('img/heart.png') }}" class="center" alt="">-->
  		</center>
		<h5 class="center-align">Aun no tiene productos 😢</h5>
  		@else
  		 

  <script>
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            } else {
                getPosts(page);
            }
        }
    });
    $(document).ready(function() {
        $(document).on('click', '.pagination a', function (e) {
            getPosts($(this).attr('href').split('page=')[1]);
            console.log("------------------");
            console.log($(this).attr('href').split('page=')[1]);  
            console.log("------------------");
            e.preventDefault();
        });
    });
    function getPosts(page) {
        $.ajax({
            url : '?page=' + page,
            dataType: 'json',
        }).done(function (data) {
            $('.items').html(data);
            console.log(data);
            location.hash = page;
        }).fail(function () {
            alert('items could not be loaded.');
        });
    }
    </script>




  	 <div class="items">
        @include('items.items')
    </div>


 	@endif
</div>
 </div>
</div>

@endsection



		


		