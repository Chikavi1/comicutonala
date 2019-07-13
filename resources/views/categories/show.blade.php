@section('withsearch','withsearch')

@extends('layouts.app')

@section('content')

<div class="row">
	<div id="inicio" class="">
      <h2 class="center-align">{{$category->name}}</h2>
      
    </div>
<div class="padding">
@if(empty($products->count()))
	<div class="center-align">
		<img src="{{ asset('img/almacenar.png') }}" class="img-responsive " width="250" height="250" alt="no encontrado">
    	<h4>No hay productos en esta categoria todavia</h4>
    </div>
@else

@foreach($products as $product)
	<div class="col m3 s12">
		<div class="card">
		    <div class="card-image waves-effect waves-block waves-light">
		      <img class="activator img-responsive"   src="{{ Storage::url($product->image) }}">
		    </div>
		    <div class="card-content color-cut ">
		      <span class="card-title activator white-text center-align truncate">{{
		      str_limit($product->title, 20)  }}</span>
			    </div>
		    <div class="card-reveal  ">
		      <span class="card-title grey-text center-align truncate">
		      	{{ str_limit($product->title, 15)  }}<i class="material-icons right">close</i></span>
				<p class="valign-wrapper"><i class="material-icons red-text">call</i>&nbsp;{{ $product->cellphone }}</p>
				<p class="valign-wrapper"><i class="material-icons green-text">place</i>&nbsp;{{$product->salon}}</p>
				<p class="valign-wrapper"><i class="material-icons blue-text">schedule</i>&nbsp;{{$product->schedule}}</p>
					@if($product->available == 1)
					<p class="valign-wrapper"><i class="material-icons " style="color:green">check</i>Disponible</p>
					@elseif($product->available == 0)
					<p class="valign-wrapper"><i class="material-icons" style="color:red">block</i>No Disponible</p>
					@endif

				
				<a href="{{route('seller.show',$product->slug)}}" class="bottom btn color-cut ">Ver más</a>
		    </div>
	  </div>
	</div>
@endforeach
@endif
</div>
</div>

@endsection