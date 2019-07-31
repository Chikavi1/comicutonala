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

	<div class="row">
		<div class="col m5 offset-m4 s12">
			<div class="card padding">
				<h4 class="center-align">Crear Producto</h4>
				<form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
                    @csrf
					<div class="form-group">
                    	<label for="title">Producto</label>
                    	<input type="text" class="form-control" name="title" minlength="3" maxlength="30"/>
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

					<div class="input-field ">
	                 <select name="category" id="">

	                    <option value="" disabled selected>Selecciona una categoria</option>
	                    @foreach($categories as $category)
	                     <option value="{{$category->name}}">{{$category->name}}</option>
	                     @endforeach
	                 </select>
	                  <label >categoria</label>
	                </div>

					 <div class="form-group">
	                    <input type="hidden" class="form-control" name="sellers_id" value="{{$id}}"/>
					</div>
					<div class="input-field col s12">
			          <i class="material-icons prefix green-text">attach_money</i>
                    	<input type="number" class="form-control" name="pricing" placeholder="Precio" />
			        </div>
                   
                 <button type="submit" class="btn btn-block color-cut">Crear</button>
				</form>
			</div>
		</div>
		
	</div>
@endsection