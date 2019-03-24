@extends('layouts.app')
@section('content')
 <script src="/vendor/ckeditor-2/ckeditor.js"></script>
  <script src="/vendor/ckeditor-2/adapters/jquery.js"></script>


<script>
  $(document).ready(function(){
    $('select').formSelect();
        $('textarea').ckeditor();
 });
</script>
<div class="row">
  <div class="col s12 m5 offset-m3">
    <div class="card padding">
        <h5>Crea tu perfil de vendedor</h5>
       <form method="post" action="{{ route('seller.store') }}" enctype="multipart/form-data">
                    @csrf
                <div class="input-field">

                    <input type="text" class="form-control" name="title"/>
                    <label for="title">Nombre del negocio</label>

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

                {!! $errors->first('image','<span class="error"> :message</span>') !!}
               <div class="input-field">
                <textarea name="description" id="description">
                  
                </textarea>
                    
                </div>
                <div class="input-field ">
                 <select name="category" id="">

                    <option value="" disabled selected>Selecciona una opcion</option>
                    @foreach($categories as $category)
                     <option value="{{$category->name}}">{{$category->name}}</option>
                     @endforeach
                 </select>
                  <label >categoria</label>
              </div>
                <div class="input-field">
                  <i class="material-icons prefix">phone</i>
                  <input id="cellphone" name="cellphone" type="tel" class="validate">
                  <label for="cellphone">Numero de celular</label>

                  

                    
                </div>
                 <div class="input-field">
                  <i class="material-icons prefix">place</i>  
                  <label for="salon">salon o lugar de venta</label>
                    <input type="text" class="form-control" name="salon"/>
                </div>

                <p>
                  <label>
                    <input type="checkbox" required />
                    <span>Acepto <a href="">Terminos y condiciones</a></span>
                  </label>
                </p>
                <button type="submit" class="btn btn-block">Crear</button>
       </form>
    </div>
  </div>
</div>
@endsection