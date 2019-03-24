
@extends('layouts.app')
@section('content')

<style>
	.image-max{
		height: 12em !important;
	}
</style>

<div class="row">
	<div class="col m3 animated p2 bounceIn">
		
      <div class="card-panel teal">
        <span class="white-text " style="text-align: justify !important;">¡Ahora tambien puedes encontrar mas categorias,no solo hay comida!Explora y encuentra mas categorias como Ropa,accesorios para celular,renta de cuartos y más.
        </span> 
  </div>
	</div>	



		

	<div class=" col m9">

		@foreach($categories as $category)
			<div class="m3 col  ">
				<a href="{{ route('categorias.show',$category->id) }}">
					
				<div class="card " >
			        <div class="card-image">
			          <img class="image-max" src="{{ asset('img/'.$category->name.'.jpg') }}">
			        	  <p class=" card-title "> {{ $category->name }} </p>
			        </div>
	      		</div>
				</a>
			</div>
		@endforeach

	</div>
	


  </div>


@endsection