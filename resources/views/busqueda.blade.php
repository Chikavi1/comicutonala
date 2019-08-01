@extends('layouts.app')

@section('content')
<script>
	$(document).ready(function(){
    $('select').formSelect();
    $(".dentro").click(function(){
    	$buscar = $("#busqueda").val();
    	$centro = $(".centro").val();
    	$categoria = $(".categoria").val();
    	console.log("buscando... "+$buscar+" centro: "+ $centro+" categoria: "+$categoria);
    });
  });
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
	color: #17202F;
}
input#busqueda:focus{
	outline:0px;
}
</style>

<div class="margin-bottom-footer">
	<h3 class="center-align">Busqueda Avanzada</h3>
		<h5 class="center-align">en desarrollo jeje lo demas si jala</h5>
	<div class="row">
		<div class="col s11 offset-s1 m6 offset-m3 ">
			<div class="valign-wrapper">
			<input type="text" class="browser-default btn-block search-redondo " name="busqueda" id="busqueda">
			<i class=" material-icons fab fa-searchengin prefix right dentro search-cut"></i>
			</div>
  		</div>

  		<div class="col s10 offset-s1 m4 offset-m4 margin-top-1">
			<div class="input-field col s12">
		    <select class="centro">
		      <option value="" disabled selected>Selecciona centro universitario</option>
		      <option value="Cutonala">Cutonala</option>
		      <option value="Cucei">Cucei</option>
		      <option value="Cucea">Cucea</option>
		    </select>
		  </div>
		</div>
		<div class="col s10 offset-s1 m4 offset-m4 margin-top-1">
			<div class="input-field col s12">
		    <select class="categoria">
		      <option value="" disabled selected>Selecciona una categoria</option>
		      <option value="Comida">Comida</option>
		      <option value="Bebidas">Bebidas</option>
		      <option value="Postres">Postres</option>
		    </select>
		  </div>
		</div>
	</div>
</div>
@endsection