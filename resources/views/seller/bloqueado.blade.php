@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col s12 m4 offset-m4">
		<h1 class="center-align bold">Bloqueado</h1>
		<p class="center red-text"><i class="fas fa-ban fa-8x center"></i></p>
		<p class="bold justify">Esta cuenta ha sido bloqueada,infrige nuestras normas de comunidad,se investigara mas sobre el caso.</p>
		<a href="route('welcome')" class="btn btn-block color-cut">Volver al inicio</a>
	</div>
</div>
@endsection
