@extends('layouts.app')
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>

	$(document).ready(function(){

	$("#Siguiente").on('click',function(){
		$("#first").hide();

		$("#second").show();
		$("#second").addClass("animated fadeInLeft");

		$(this).addClass("animated fadeInRight");
		$(this).hide();
		$("#enviar").addClass("animated fadeInLeft");
		$("#enviar").show();

		
	});
	$("#enviar").on('click',function(){
		$("#form").submit();
	});

	});
</script>


@section('content')
	<div class="row">
		<div class="col s12 m4 offset-m4 ">
			<div class="card  p5 animated fadeInLeft">

				<h3>Ingresa los datos</h3>	
				<form action="/" id="form">


					<div class="input-field" id="first" >
						<input name="bussinesName" type="text">
						<label for="bussinesName">Nombre del negocio</label>
					</div>

					<div class="input-field noshow" id="second" >
						<textarea name="bussinesDescription" id="" cols="30" rows="10" class="materialize-textarea"></textarea>
						<label for="bussinesDescription">Descripción</label>
					</div>

					

				</form>
						<button id="Siguiente" class="btn btn-block">Siguiente</button>
						<button id="enviar" class="btn btn-block noshow" >Enviar</button>
			</div>
			
		</div>
	</div>

@endsection