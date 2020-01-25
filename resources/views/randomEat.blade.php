@extends('layouts.app')
<style>
  .card-select{
    border-radius: 3em 3em 3em 3em !important;
  }
  .card-image-select{
    border-radius: 3em 3em 0 0 !important;
  }
  .card-content-select{
    border-radius: 0 0 3em 3em !important;
  }
  hr{
    width: 80%;
    background-color:#17202F;  
    border-top: 1px solid #17202F;
  }
</style>
@section('content')

<script>
  $(document).ready(function(){
    $(".btnsiiau").click(function(){
      location.reload();
    });
  });
</script>


  <div class="row">
		<div class="col s10 offset-s1 m6 offset-m3 ">
			<h5 class="bold" style="margin: 1em ;font-size: 2em;"> Te sugerimos </h5>
<div class="card card-select ">
        <div class="card-image  card-image-select waves-effect waves-block waves-light">
          <img class="activator img-responsive img-sizes"   src="{{ Storage::url($seller->image) }}" height="400">
        </div>
        <div class="card-content card-content-select color-cut ">
          <span class="card-title activator white-text center-align truncate">{{
          str_limit($seller->title, 20)  }}</span>
          </div>
        <div class="card-reveal  ">
          <span class="card-title grey-text center-align truncate">
            {{ str_limit($seller->title, 15)  }}<i class="material-icons right">close</i></span>
        <p class="valign-wrapper"><i class="material-icons red-text">call</i>&nbsp;{{ $seller->cellphone }}</p>
        <p class="valign-wrapper"><i class="material-icons green-text">place</i>&nbsp;{{$seller->salon}}</p>
        <p class="valign-wrapper"><i class="material-icons blue-text">schedule</i>&nbsp;{{$seller->schedule}}</p>
          @if($seller->available == 1)
          <p class="valign-wrapper"><i class="material-icons " style="color:green">check</i>Disponible</p>
          @elseif($seller->available == 0)
          <p class="valign-wrapper"><i class="material-icons" style="color:red">block</i>No Disponible</p>
          @endif

        
        <a href="{{route('seller.show',$seller->slug)}}" class="bottom btn color-cut ">Ver más</a>
        </div>
    </div>
		</div>
	</div>

<div class="col s12 ">
  
    <hr>
  
      <h5 class="bold" style="margin: 1em;">¿Te ha pasado que no sabes que comer?</h5>
      <p style="text-align: justify;margin:0 1em;font-size: 1.3em;">Nosotros te ayudamos, nuestro sistema escoge de manera al azar un perfil de vendedor que esté disponible, esperemos algunos de los que aparezcan sean de tu agrado.</p>
</div>
     <!-- <p class="center-align">Nuestra aplicacion te ayuda de forma aleatoria mostrandote una opcion para comer.</p>-->
<div class="row">
  <div class="col s6 offset-s3 margin-top-1">
     <button class="btn-block btnsiiau border-satisfactorio" style="height:5em;color:green;">Intentar de nuevo</button>
  </div>
</div>
@endsection