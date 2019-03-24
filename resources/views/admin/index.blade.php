@extends('layouts.app')

@section('content')

<style ">
	.box{
		border: .5em red solid;
	}
</style>


	<div class="row">
		<div class="col m2 s12">
			<ul class="collection">
		      <li class="collection-item" >	<a href="{{ route('categorias') }}"> Categorias</a></li>
		      <li class="collection-item">Productos</li>
		      <li class="collection-item">Alvin</li>
		      <li class="collection-item">Alvin</li>
   			 </ul>
		</div>
		
		<div class="col m10 s12">
			<div class="card">
				@yield('admin')
			</div>
		</div>
	</div>

@endsection