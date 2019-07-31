
@extends('layouts.app')
@section('content')

<style>
	.image-max{
		height: 12em !important;
	}
	.margin-bottom{
		margin-bottom: 6em;
	}
</style>

<div class="row" >
	<div class="col m3 animated p2 bounceIn">
		
      <div class="card-panel teal">
        <span class="white-text " style="text-align: justify !important;">¡Ahora tambien puedes encontrar mas categorias,no solo hay comida! <br> Explora y encuentra mas categorias como Ropa,accesorios para celular,renta de cuartos y más.
        </span> 
  </div>
	</div>	



	<div class=" col m9 margin-bottom">

		@foreach($categories as $category)
			<div class="m3 col animated p2 fadeIn delay-1s">
				<a href="{{ route('categorias.show',$category->id) }}">
					
				<div class="card " >
			        <div class="card-image">
			          <img class="image-max" src="{{ asset('img/'.$category->name.'.jpg') }}">
			        	  <p class=" card-title "> {{ ucfirst($category->name) }} </p>
			        </div>
	      		</div>
				</a>
			</div>
		@endforeach

	</div>

	
	

  </div>


@endsection
