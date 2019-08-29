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
  <div class="col s12 m5 offset-m3">
    <div class="card padding">
        <h5>Edita <strong>{{ $seller->title }}</strong></h5>
       <form method="post" action="{{ route('seller.update',$seller->slug) }}" enctype="multipart/form-data">
                     @method('PATCH')
                     @csrf
                <div class="input-field">

                    <input type="text" class="form-control" name="title" value="{{$seller->title}}"/>
                    <label for="title">Nombre del negocio</label>

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

                {!! $errors->first('image','<span class="error"> :message</span>') !!}
               <div class="input-field">
                <textarea name="description" id="description">
                  {{$seller->description}}
                </textarea>
                    
                </div>
                <div class="input-field ">
                 <select name="category" id="">

                    <option value="" disabled selected>{{$seller->category}}</option>
                    @foreach($categories as $category)
                     <option value="{{$category->name}}">{{$category->name}}</option>
                     @endforeach
                 </select>
                  <label >categoria</label>
              </div>
                <div class="input-field">
                  <i class="material-icons prefix green-text">phone</i>
                  <input id="cellphone" name="cellphone" type="tel" class="validate" value="{{$seller->cellphone}}">
                  <label for="cellphone">Numero de celular</label>

                  

                    
                </div>
                 <div class="input-field">
                  <i class="material-icons prefix red-text">place</i>  
                  <label for="salon">salon o lugar de venta</label>
                    <input type="text" class="form-control" name="salon" value="{{$seller->salon}}"/>
                </div>
                <h5>Horario</h5>
                  <div class="row">
                    <div class="input-field">
                        <div class="col s6">
                          <input type="text" class="timepicker" name="inicia" placeholder="Inicia" value="{{$hora1}}">
                        </div>
                    </div>
                    
                     <div class="input-field">
                        <div class="col s6">
                          <input type="text" class="timepicker" name="finaliza" placeholder="Finaliza" value="{{$hora2}}" >
                        </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                      <label for="available">Disponible</label>
                      <input type="hidden" class="form-control" name="available" id="caca" value="{{$seller->available}}"/>
                  </div>
                  <br>
                  <div class="col m5 margin-bottom">
                    <div class="switch">
                      <label>
                        Desactivar
                        <input type="checkbox" id="sw"  >
                        <span class="lever"></span>
                        Activar
                      </label>
                    </div>
                  </div>

                <button type="submit" class="btn btn-block color-cut">Editar</button>
       </form>
    </div>
  </div>
</div>
@endsection