@extends('layouts.app')
 <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/materialize.js') }}"></script>
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
@section('content')
	<h2 class="center">¿Que deseas Crear?</h2>
	<div class="row" >
		<a href="{{ route('seller.create')}}">
		<div class="col m3 s12 offset-m3 animated slideInLeft">
			<div class="card center grey-cut " " >
		<!--<i class="material-icons  center-icons">account_circle</i>-->
				<h3 class="center-align white-c mart">Perfil </h3>
			</div>
		</div>
		</a>

		<a href="">
			<div class="col m3 s12 ">
				<div class="card center grey-cut animated slideInRight">
				<!--<i class="material-icons center-icons">work</i>-->
				<h3 class="center-align white-c marb ">horarios </h3>
				</div>
			</div>
		</a>
		<a href="">
			<div class="col m6 s12 offset-m3">
				<div class="card center grey-cut animated slideInUp">
				<!--<i class="material-icons center-icons">work</i>-->
				<h3 class="center-align white-c marb ">Productos</h3>
				</div>
			</div>
		</a>
	</div>
@endsection