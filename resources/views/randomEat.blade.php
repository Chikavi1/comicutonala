@extends('layouts.app')

@section('content')
<script>
  $(document).ready(function(){
    $(".btnsiiau").click(function(){
      location.reload();
    });
  });
</script>
<div class="col s12 ">
      <h2 class="center-align">¿No sabes que comer?</h2>
      <p class="center-align">Nosotros te ayudamos</p>
    </div>
     <!-- <p class="center-align">Nuestra aplicacion te ayuda de forma aleatoria mostrandote una opcion para comer.</p>-->
	<div class="row">
  <div class="col s6 offset-s3 margin-top-1">
     <button class="btn-block btnsiiau border-satisfactorio">Intentar de nuevo</button>
  </div>
  </div>

  <div class="row">
		<div class="col s12 m6 offset-m3">
			
<div class="card">
        <div class="card-image waves-effect waves-block waves-light">
          <img class="activator img-responsive img-sizes"   src="{{ Storage::url($seller->image) }}" >
        </div>
        <div class="card-content color-cut ">
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

@endsection