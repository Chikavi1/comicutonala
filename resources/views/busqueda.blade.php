@extends('layouts.app')

@section('content')

<script>
	$(document).ready(function(){
	$('.items').removeClass(["animated","zoomIn"]);
	$('#comida').chatin = true;
    $('select').formSelect();
    //$("#enviar").attr("disabled",true);
   
    $(".enviar").click(function(e){
    	e.preventDefault();
    	buscar();
    });
  });
	function buscar(){
				$.ajax({
					  headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
					    dataType: 'json',
					    url: '',
					    data: {
					        'titulo': $('#titulo').val(),
					        'centro' : $("#centro").val(),
					        'categoria': $("#categoria").val()
					    },
					    success: function(response) {
					    }
					}).done(function (data) {
						$("#comida").css("display","none");
						$("#comida").css("display","block");
						$('.items').css("display","block");

						$("#comida").addClass("verga");
						$('.items').addClass("z-index-2");

						$('.items').addClass(["animated","zoomIn"]);
			            $('.items').html(data);
			                $('select').formSelect();

			        }).fail(function () {
			            alert('Hubo un error, lo sentimos.');
			        });;

	}

</script>
<style>
.search-redondo{
  border-radius: 15px !important;
  background: white !important;
  height: 2.5em;
  border-color: #17202F;
  padding-left: 1em;
}
.dentro{
	position: relative;
	right: 2em;
}
.search-cut{
 color: #0E8016;  /* fallback for old browsers */
}
.search-cut:hover{
	cursor: pointer;
}
input#titulo:focus{
	outline:0px;
}
::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #17202f;
  opacity: 0.7; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #17202f;
}

::-ms-input-placeholder { /* Microsoft Edge */
  color: #17202f;
}
.items{
	display: none;
	}

.w-border{
	 margin: 0!important;;
  border: 0!important;
  box-shadow: none!important;
}
</style>

<div class="margin-bottom-footer animated slideInLeft padding card w-border" style="z-index: 3 !important;">
	<div class="row ">
		<div class="col s12 offset-m2 m8 ">
			<h2 class="center-align">Busqueda</h2>
		</div>
	</div>
	<div class="row">
	<p class="center-align">Recuerda llenar todos los campos para buscar.</p>
		<form  id="formulario" >
		<div class="col s10 offset-s1 m4 offset-m4 ">
			<div class="valign-wrapper">
			<input type="text" class="browser-default btn-block search-redondo " placeholder="nombre del vendedor" name="titulo" id="titulo">
			<div class="enviar">
			<i class=" material-icons fab fa-searchengin prefix right dentro search-cut buscarboton animated flash delay-2s"></i>
			</div>
			</div>
  		</div>

  		<div class="col s10 offset-s1 m4 offset-m4 margin-top-1">
			<div class="input-field col s12">
		    <select  name="centro" id="centro" required>
		      <option value="" disabled selected>Selecciona centro universitario</option>
		      @foreach($centros as $centro)
		      <option value="{{$centro->title}}">{{$centro->slug}}</option>
		      @endforeach
		    </select>
		  </div>
		</div>
		<div class="col s10 offset-s1 m4 offset-m4 margin-top-1 z-index-2" >
			<div class="input-field col s12">
		    <select  name="categoria" id="categoria" required>
		      <option value="" disabled selected>Selecciona una categoria</option>
		      @foreach($categorias as $categoria)
			      <option value="{{$categoria->name}}">{{$categoria->name}}</option>
		      @endforeach
		    </select>
		  </div>
		</div>
		<div class="col s10 offset-s1 m4 offset-m4 margin-top-1">
		  <p class="letras-chicas bold">* Si hay varias coincidencias,se muestran máximo 4 resultados.</p>
		   <button class="btn btn-block color-cut enviar" >Buscar</button>
		</div>
	</form>

	</div>
</div>

<div class="items" >
	@include('resultado')
</div>
@endsection