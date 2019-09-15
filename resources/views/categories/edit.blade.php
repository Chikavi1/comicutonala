@extends('admin.index')

@section('admin')
		<div class="row">

			<div class="col m8 offset-m2 ">
			<h2>Editar categoria</h2>
				<form method="POST" action="{{ route('categorias.update',$category->id) }}">
						@csrf
						@method('PATCH')
						<div class="row">
						    <div class="input-field col s6">
						      <input  id="categoria-name" type="text" name="name" value="{{ $category->name }}" class="validate">
						      <label class="active" for="categoria-name">Nombre de la categoria</label>
						    </div>
						  </div>
        
						<input class="btn color-cut" type="submit" value="Editar">
				</form>	
			</div>
		</div>
		
@endsection