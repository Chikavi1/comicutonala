@extends('layouts.app')

@section('content')
<script>
	
  $(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>
<style>
	.box{
		border: .5em red solid;
	}
	.blc{
		display: none;
	}
</style>


	<div class="row">
		<div class="col m2 s12">
			 <ul class="collapsible">
			    <li>
			      <div class="collapsible-header"><i class="fas fa-tag red-text "></i>Vendedores</div>

			      <div class="collapsible-body">
			       <a href="{{ route('admin.vendedores') }}">Lista vendedores</a>
			       <a href="">Solicitudes de vendedores</a>
			      </div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="fas fa-layer-group brown-text"></i>Categorias</div>
				      <div class="collapsible-body">
						<a href="{{route('categorias')}}">Ver</a><br>
						<a href="{{route('categorias.create')}}" class="green-text ">Agregar</a>
				      </div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="far fa-user blue-text"></i>Usuarios</div>
			      <div class="collapsible-body">
					<a href="{{ route('admin.usuarios') }}">Lista usuarios</a>
			      </div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="fas fa-chart-line green-text"></i>Estadisticas</div>
			      <div class="collapsible-body">
					<a href="{{route('admin.estadisticas')}}">Graficas</a>
			      </div>
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