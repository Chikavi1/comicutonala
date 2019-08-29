@extends('layouts.app')

@section('content')

<script>
	$(document).ready(function(){
		$("#ingresar").click(function(){
			$(".cargando").css("display","inline-block");
			$("")
		});
	});	
</script>

<div class="row">
	
<div class="col s12 m3 offset-m4 card">
	<h3 class="center-align">Ingresar</h3>

	<form action="{{ route('admin.login') }}" method="get" >
		{{ @csrf_field() }}
		<input type="text" placeholder="codigo" name="codigo">
		<input type="password" placeholder="nip" name="nip">
		<input type="submit" class="btn color-cut btn-block" value="Enviar">
	</form>
	

<div style="display: none;" class="cargando">
	
<div class="preloader-wrapper big active">
    <div class="spinner-layer spinner-blue-only">
      <div class="circle-clipper left">
        <div class="circle"></div>
      </div><div class="gap-patch">
        <div class="circle"></div>
      </div><div class="circle-clipper right">
        <div class="circle"></div>
      </div>
    </div>
  </div>

</div>

</div>
</div>


@endsection