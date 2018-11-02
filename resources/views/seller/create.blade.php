@extends('layouts.app')
@section('content')

<script>
  $(document).ready(function(){
    $('select').formSelect();
 });
</script>
<div class="row">
  <div class="col m5 offset-m3">
    <div class="card">
       <form method="post" action="{{ route('seller.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="title">Nombre del negocio</label>
                    <input type="text" class="form-control" name="title"/>
                </div>

                <div class="form-group">
                    <label for="slug">URL Amigable</label>
                    <input type="text" class="form-control" name="slug"/>
                </div>
               <div class="form-group">
                    <label for="description">Descripción</label>
                    <input type="text" class="form-control" name="description"/>
                </div>
                  <div class="input-field col s12">
             <select name="category" id="">
                <option value="" disabled selected>Selecciona una opcion</option>
               <option value="comida salada">Comida salada</option>
               <option value="comida dulce">Comida dulce</option>
               <option value="bebidas">bebidas</option>
               <option value="postres">postres</option>
               <option value="botana">botana</option>
             </select>
            <label >categoria</label>
          </div>
                <div class="form-group">
                    <label for="cellphone">Numero de celular</label>
                    <input type="text" class="form-control" name="cellphone"/>
                </div>
                 <div class="form-group">
                    <label for="salon">salon</label>
                    <input type="text" class="form-control" name="salon"/>
                </div>
                <button type="submit" class="btn btn-block">Crear</button>
       </form>
    </div>
  </div>
</div>
@endsection