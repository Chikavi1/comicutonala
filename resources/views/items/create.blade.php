@extends('layouts.app')
@section('content')
<script src="/vendor/ckeditor-2/ckeditor.js"></script>
  <script src="/vendor/ckeditor-2/adapters/jquery.js"></script>

<script>
  $(document).ready(function(){
    $('select').formSelect();
    $('textarea').ckeditor();
    $('.timepicker').timepicker();
  
 });
</script>
	<div class="row">
		<div class="col m5 offset-m4 s12">
			<div class="card padding">
				<h2 class="center-align">Crear Producto</h2>
				<form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
                    @csrf
					<div class="form-group">
                    	<label for="title">Producto</label>
                    	<input type="text" class="form-control" name="title"/>
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
                		</textarea>
               		 </div>

					<div class="form-group">
                    	<label for="category">Categoria</label>
                    	<input type="text" class="form-control" name="category"/>
					</div>

					 <div class="form-group">
	                    <input type="hidden" class="form-control" name="sellers_id" value="{{$id}}"/>
					</div>
                    <div class="form-group">
                    <label for="pricing">Precio</label>
                    <input type="text" class="form-control" name="pricing"/>
                	</div>
                 <button type="submit" class="btn btn-block color-cut">Crear</button>
				</form>
			</div>
		</div>
		
	</div>
@endsection