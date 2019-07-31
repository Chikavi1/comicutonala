@extends('layouts.app')
@section('content')
<script src="/vendor/ckeditor-2/ckeditor.js"></script>
  <script src="/vendor/ckeditor-2/adapters/jquery.js"></script>
<script>
	$(document).ready(function(){
   		$('.modal').modal();
   		$('textarea').ckeditor();
	    $('select').formSelect();

  	});
          
</script>

	<div class="row ">
		<div class="col m5 offset-m4 ">
			<div class="card p5 ">
				<h4 class="center-align">Editar {{ $item->title }}</h4>
				<form method="POST" action="{{ route('items.update',$item->id) }}" class="">
                    @method('PATCH')
                    @csrf
					<div class="form-group">
	                    <label for="title">Producto</label>
	                    <input type="text" class="form-control" name="title" value="{{$item->title}}"/>
					</div>
					<div class="form-group center">
						<img  class="" src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" width="250">
						<br>
						<span>Imagen actual</span>
					</div>
					<div class="file-field input-field">
                 		<div class="btn">
	                    	<span>Foto</span>
	                    	<input type="file" name="image">
	                    </div>
	                 	<div class="file-path-wrapper">
	                    	<input class="file-path validate" type="text" name="image">
	                  	</div>
	                </div>
	                <div class="input-field">
                		<textarea name="description" id="description">
                			{{$item->description}}
                		</textarea>
               		 </div>

					<div class="input-field ">
	                 <select name="category" id="">

	                    <option value="" disabled selected>{{ $item->category }}</option>
	                    @foreach($categories as $category)
	                     <option value="{{$category->name}}">{{$category->name}}</option>
	                     @endforeach
	                 </select>
	                  <label >categoria</label>
	                </div>

                    <div class="form-group">
                    	<label for="pricing">Precio</label>
                    	<input type="text" class="form-control" name="pricing" value="{{ $item->pricing }}"/>
               		</div>
                 <button type="submit" class="btn btn-block color-cut">Editar</button>
				<div class="center-align">
				 <p>ó</p>
                 <a href="#modal1" class="red-text waves-effect waves-red btn-flat modal-trigger ">Eliminar</a>
				</div>
				</form>
			
		</div>
	</div>

	<div id="modal1" class="modal">
	    <div class="modal-content center-align">
	      <h4 class="">¿Estas seguro de eliminarlo?</h4>
	      <p>Al eliminarlo no habrá marcha atrás</p>
	    </div>
	    <div class="modal-footer">
	    	 <form method="POST" action="{{ route('items.destroy',$item->id) }}">
	      		<a href="#!" class="modal-close waves-effect waves-green blue-text btn-flat">Cancelar</a>
	      		@csrf
	      		@method('DELETE')
	      	<button class="red-text waves-effect waves-red btn-flat modal-trigger" type="submit">Eliminar</button>
	      </form>
	    </div>
	</div>
@endsection