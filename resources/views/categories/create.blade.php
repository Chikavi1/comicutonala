@extends('admin.index')

@section('admin')
		<div class="row">

			<div class="col m8 offset-m2 ">
			<h2>Crear categoria</h2>
				<form method="POST" action="{{ route('categorias.store') }}">
						@csrf
						<div class="row">
						    <div class="input-field col s6">
						      <input  id="categoria-name" type="text" name="name" class="validate">
						      <label class="active" for="categoria-name">Nombre de la categoria</label>
						    </div>
						  </div>
        
						<input class="btn" type="submit" value="Crear">
				</form>	
			</div>
		</div>
		
@endsection