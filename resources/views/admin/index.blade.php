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
	a{
		color:black;
	}
</style>


	<div class="row">
		<div class="col m2 s12">
			 <ul class="collapsible ">
			    <li>
			      <div class="collapsible-header"><i class="fas fa-tag red-text "></i>Vendedores</div>

			      <div class="collapsible-body">
			       <a href="{{ route('admin.vendedores') }}">vendedores</a><hr>
			       <a href="{{ route('admin.solicitudes') }}">Solicitudes de vendedores</a><hr>
			       <a href="{{ route('admin.bloqueados') }}">Vendedores Bloqueados</a><hr>
			      </div>
			    </li>
			    <li>
			      <div class="collapsible-header"><i class="fas fa-check-circle green-text"></i>Verificar</div>
			      <div class="collapsible-body">
					<a href="{{route('admin.verificar')}}">Verificar vendedores</a>
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
			    <li>
			      <div class="collapsible-header"><i class="fas fa-graduation-cap"></i>Centros</div>
			      <div class="collapsible-body">
					<a href="{{route('admin.centros')}}">Ver Centros</a>
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