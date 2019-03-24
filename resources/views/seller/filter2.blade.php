@extends('layouts.app')
 <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script>
  $(document).ready(function(){
    $('select').formSelect();
 });
</script>
<style>
	
	.center-icons{
		margin-top:.3em;
		font-size: 	10em !important;
		color:white;
	}
	.grey-cut{
		background-color: #17202f !important; 
	}
	.white-c{
		color:white;
	}
	.marb{
		margin-bottom: 30px;
	}
	
	.cacas{
		background-image: url({{asset('img/comida.jpg')}});
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){
	$('#jeje').on('click',function(){
		console.log("caca");
		$('.uno').addClass('animated fadeOutRight');
		$('.dos').show();
	});
 
 });
</script>
@section('content')
	<form >
	<div class="row uno ">
		<div class="col m6 offset-m3 s12">
			<div class="card">
				<h2 class="center">¿Que deseas Crear?</h2>
					<div class="input-field  s5">
					    <select name="category" id="">

		                    <option value="" disabled selected>Selecciona una opcion</option>
		                    @foreach($categories as $category)
		                     <option value="{{$category->name}}">{{$category->name}}</option>
		                     @endforeach
	                	 </select>
					</div>
					<p class="prueba">prueba</p>
				<a class="btn color-cut btn-block" id="jeje">Siguiente</a>
			</div>
		</div>
	</div>
	<div class="row dos " style="display: none;">
		<div class="col m6 offset-m3 s12">
			<div class="card">
				<h2 class="center">¿Que deseas Crear?</h2>
					<div class="input-field  s5">
					    <select name="category" id="">

		                    <option value="" disabled selected>Selecciona una opcion</option>
		                    @foreach($categories as $category)
		                     <option value="{{$category->name}}">{{$category->name}}</option>
		                     @endforeach
	                	 </select>
					</div>
					<p class="prueba">prueba</p>
				<a class="btn color-cut btn-block" id="jeje">Siguiente</a>
			</div>
		</div>
	</div>
</form>
@endsection