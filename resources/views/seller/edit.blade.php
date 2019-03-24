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

 <script>
   $(document).ready(function(){
    $('select').formSelect();
 

    if({{ $seller->available }}){
      $('#sw').prop('checked',true);
    }else{
      $('#sw').prop('checked',false);

    }

$("#sw").click(function(){
 if($('#sw').prop('checked')){
       $("#caca").val("1");
       console.log( $("#sw").val());
    }else if(!($('#sw').prop('checked')) ){
      $("#caca").val("0");
       console.log( $("#sw").val());
    }
});

  });
        
 </script>
 <div class="row">
   <div class="col m5 offset-m3">
 <div class="">
   
 <form method="POST"" action="{{ route('seller.update',$seller->slug) }}" files="true"> 
           @method('PATCH')
           @csrf
          <div class="form-group">

              <label for="title">Nombre del negocio</label>
              <input type="text" class="form-control" name="title" value="{{$seller->title}}"/>
          </div>

          <div class="form-group">
              <label for="slug">URL Amigable</label>
              <input type="text" class="form-control" name="slug" value="{{$seller->slug}}"/>
          </div>
         <div class="form-group">
              <label for="description">Descripción</label>
             <textarea class="ckeditor" name="description" id="editor1" rows="10" cols="30">
               {{$seller->description}}
             </textarea>
          </div>
          <div class="input-field col s12">
             <select name="category" id="">
                <option value="" disabled selected>{{$seller->category}}</option>
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
              <input type="text" class="form-control" name="cellphone" value="{{$seller->cellphone}}"/>
          </div>
           <div class="form-group">
              <label for="salon">salón</label>
              <input type="text" class="form-control" name="salon" value="{{$seller->salon}}"/>
          </div>
         <div class="form-group">
              <label for="available">Disponible</label>
              <input type="hidden" class="form-control" name="available" id="caca" value="{{$seller->available}}"/>
          </div>
        
          <div class="col m5">
            <div class="switch">
    <label>
      Desactivar
      <input type="checkbox" id="sw"  >
      <span class="lever"></span>
      Activar
    </label>
  </div>

          </div>
          <div>
              
          <button type="submit" class="btn btn-primary">Editar</button>
      </form>
 </div>
     
   </div>
 </div>

 @endsection