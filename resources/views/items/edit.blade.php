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
<style>
option#nodis{
	color:red !important;
	background: red;
}
</style>


@if($errors->any())
<div class="color-cut">
  <p class="center white-text" style="margin-top: 0 !important;font-size:1.5em;">
    <strong>Tenermos errores</strong>
     @foreach($errors->all() as $error)
     <p class="center-align white-text">{{ $error }}</p>
      @endforeach
  </p>
  <br>
</div>

@endif
	<div class="row ">
				<form method="POST" action="{{ route('items.update',$item->id) }}" class="">
		<div class="col m3 offset-m1 s12 hoverable" style="background: #FFF4E4;">
			<div class="" style="padding: .3em;">
						
	                  <p class="center bold ">Disponibilidad</p>
	                  <p class="bold">Modificar</p>
	                <p>
     				 <label>
				        <input name="available" value="no disponible" class="red" type="radio" checked />
				        <span class="red-text" >No Disponible</span>
				      </label>
				    </p>
				    <p>
				      <label>
				        <input name="available" value="disponible" type="radio" />
				        <span class="green-text">Disponible</span>
				      </label>
				    </p>
			<button type="submit" class="btn btn-block color-cut">Editar</button>
					</div>
	</div>
		<div class="col m5 s12  ">
			<div class=" p5 card ">
				<h4 class="center-align">Editar {{ $item->title }}</h4>
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
                 		<div class="btn color-cut">
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
	                 <select name="category" value="{{old('category')}}">

	                    <option value="{{ $item->category }}"  disabled selected>{{ $item->category }}</option>
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