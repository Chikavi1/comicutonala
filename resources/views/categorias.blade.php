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
        <span class="white-text">Recuerda que no solo puedes buscar comida,tambien puedes encontrar mas categorias.
        I am convenient because I require little markdown to use effectively. I am similar to what is called a panel in other frameworks.
        </span> 
  </div>
	</div>	
	
	<div class=" col m9">
		<div class="m3 col  ">
			<a href="/">
				
			<div class="card " >
		        <div class="card-image">
		          <img class="image-max" src="{{ asset('img/salado.jpg') }}">
		        	  <p class=" card-title "  >Comida</p>
		        </div>
      		</div>
			</a>
		</div>

		<div class="m3 col ">
			<div class="card">
		        <div class="card-image ">
		          <img class="image-max" src="{{ asset('img/postres.jpg') }}" >
		        	  <p class=" card-title "  >Postres</p>
		        </div>
      		</div>
		</div>
		<div class="m3 col ">
			<div class="card">
		        <div class="card-image">
		          <img class="image-max" src="{{ asset('img/bebidas.jpg') }}">
		        	  <p class=" card-title "  >Bebidas</p>
		        </div>
      		</div>
		</div>
		<div class="m3 col ">
			<div class="card">
		        <div class="card-image">
		          <img class="image-max" src="{{ asset('img/dulces.jpg') }}">
		        	  <p class=" card-title "  >Dulces </p>
		        </div>
      		</div>
		</div>
		<div class="m3 col ">
			<div class="card">
		        <div class="card-image">
		          <img class="image-max" src="https://materializecss.com/images/sample-1.jpg">
		        	  <p class=" card-title "  >Categoria </p>
		        </div>
      		</div>
		</div>
	</div>
	


  </div>


@endsection