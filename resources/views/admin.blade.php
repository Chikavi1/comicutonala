@extends('layouts.app')

@section('content')

<style>
	.box{
		border: .5em red solid;
	}
</style>


	<div class="row">
		<div class="col m2 s12">
			 <ul class="collapsible">
			    <li>
			      <div class="collapsible-header"><i class="material-icons">filter_drama</i>Productos</div>
			      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="material-icons">place</i>Usuarios</div>
			      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="material-icons">whatshot</i>Estadisticas</div>
			      <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
			    </li>
			  </ul>
		</div>
		
		<div class="col m10 s12">
			<div class="card">
				
				@yield('admin')
			</div>
		</div>
	</div>

@endsection