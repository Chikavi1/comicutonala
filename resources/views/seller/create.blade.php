@extends('layouts.app')
@section('content')
 <script src="/vendor/ckeditor-2/ckeditor.js"></script>
 <script src="/vendor/ckeditor-2/adapters/jquery.js"></script>

<script>
  $(document).ready(function(){
    $('select').formSelect();
    $('textarea').ckeditor();
    $('.timepicker').timepicker();
    $('.modal').modal();
 });
</script>
@if($errors->any())
<style>
  .error-parrafo
  {
    margin-top: 0 !important;
    font-size:1.5em;
  }
</style>
  
<div class="color-cut">
  <p class="center white-text error-parrafo" >
    <strong>Tenermos errores</strong>
     @foreach($errors->all() as $error)
     <p class="center-align white-text">{{ $error }}</p>
      @endforeach
  </p>
  <br>
</div>

@endif
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
                <p><strong>Describe el perfil de vendedor</strong></p>
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
                <div class="input-field">
                  <i class="material-icons prefix">phone</i>
                  <input id="cellphone" name="cellphone" type="tel" class="validate" pattern="[0-9]+">
                  <label for="cellphone">Numero de celular</label>

                  

                    
                </div>
                 <div class="input-field">
                  <i class="material-icons prefix">place</i>  
                  <label for="salon">salon o lugar de venta</label>
                    <input type="text" class="form-control" name="salon"/>
                </div>
                <h5>Horario</h5>
                  <div class="row">
                    <div class="input-field">
                        <div class="col s6">
                          <input type="text" class="timepicker" name="inicia" placeholder="Inicia">
                        </div>
                    </div>
                    
                     <div class="input-field">
                        <div class="col s6">
                          <input type="text" class="timepicker" name="finaliza" placeholder="Finaliza" >
                        </div>
                    </div>
                  </div>
                  
                    
                <p>
                  <label>
                    <input type="checkbox" required />
                    <span>Acepto <a class=" modal-trigger" href="#modal1">Terminos y condiciones</a></span>
                  </label>
                </p>
                <button type="submit" class="btn btn-block color-cut">Crear</button>
                </div> 
       </form>
    </div>
  </div>
</div>


  <!-- Modal Structure -->
  <div id="modal1" class="modal bottom-sheet">
    <div class="modal-content">
      <h4>Terminos y Condiciones</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni dignissimos vero fugit laboriosam in rem explicabo molestiae et, perspiciatis modi repellat temporibus reprehenderit consequatur sunt omnis impedit, aspernatur. Doloremque ex ipsam quae quas accusantium beatae cum? Tenetur maiores harum quos ullam exercitationem tempore perferendis delectus officiis temporibus voluptatibus. Quidem animi, vel minima blanditiis sit minus numquam aut pariatur! Commodi pariatur voluptates, consectetur ipsa, perspiciatis in et iusto natus. Iste, laudantium sunt corporis. Necessitatibus hic omnis consequatur quibusdam molestias labore, assumenda atque debitis veritatis velit sed ratione fugit animi quo! Accusantium nobis modi maiores asperiores esse cum numquam, officiis alias non, autem tempore, quidem atque blanditiis culpa repellendus quos vel expedita eligendi officia architecto! Libero dignissimos optio asperiores. Ullam voluptas autem, necessitatibus repudiandae perspiciatis dolorem, labore facilis numquam culpa sed consequuntur vero fuga molestiae facere eos iste hic suscipit alias, nesciunt incidunt placeat ab maiores natus, provident modi. Labore, maiores, at.</p>
            <h4>Terminos y Condiciones</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni dignissimos vero fugit laboriosam in rem explicabo molestiae et, perspiciatis modi repellat temporibus reprehenderit consequatur sunt omnis impedit, aspernatur. Doloremque ex ipsam quae quas accusantium beatae cum? Tenetur maiores harum quos ullam exercitationem tempore perferendis delectus officiis temporibus voluptatibus. Quidem animi, vel minima blanditiis sit minus numquam aut pariatur! Commodi pariatur voluptates, consectetur ipsa, perspiciatis in et iusto natus. Iste, laudantium sunt corporis. Necessitatibus hic omnis consequatur quibusdam molestias labore, assumenda atque debitis veritatis velit sed ratione fugit animi quo! Accusantium nobis modi maiores asperiores esse cum numquam, officiis alias non, autem tempore, quidem atque blanditiis culpa repellendus quos vel expedita eligendi officia architecto! Libero dignissimos optio asperiores. Ullam voluptas autem, necessitatibus repudiandae perspiciatis dolorem, labore facilis numquam culpa sed consequuntur vero fuga molestiae facere eos iste hic suscipit alias, nesciunt incidunt placeat ab maiores natus, provident modi. Labore, maiores, at.</p>
            <h4>Terminos y Condiciones</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni dignissimos vero fugit laboriosam in rem explicabo molestiae et, perspiciatis modi repellat temporibus reprehenderit consequatur sunt omnis impedit, aspernatur. Doloremque ex ipsam quae quas accusantium beatae cum? Tenetur maiores harum quos ullam exercitationem tempore perferendis delectus officiis temporibus voluptatibus. Quidem animi, vel minima blanditiis sit minus numquam aut pariatur! Commodi pariatur voluptates, consectetur ipsa, perspiciatis in et iusto natus. Iste, laudantium sunt corporis. Necessitatibus hic omnis consequatur quibusdam molestias labore, assumenda atque debitis veritatis velit sed ratione fugit animi quo! Accusantium nobis modi maiores asperiores esse cum numquam, officiis alias non, autem tempore, quidem atque blanditiis culpa repellendus quos vel expedita eligendi officia architecto! Libero dignissimos optio asperiores. Ullam voluptas autem, necessitatibus repudiandae perspiciatis dolorem, labore facilis numquam culpa sed consequuntur vero fuga molestiae facere eos iste hic suscipit alias, nesciunt incidunt placeat ab maiores natus, provident modi. Labore, maiores, at.</p>
            <h4>Terminos y Condiciones</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni dignissimos vero fugit laboriosam in rem explicabo molestiae et, perspiciatis modi repellat temporibus reprehenderit consequatur sunt omnis impedit, aspernatur. Doloremque ex ipsam quae quas accusantium beatae cum? Tenetur maiores harum quos ullam exercitationem tempore perferendis delectus officiis temporibus voluptatibus. Quidem animi, vel minima blanditiis sit minus numquam aut pariatur! Commodi pariatur voluptates, consectetur ipsa, perspiciatis in et iusto natus. Iste, laudantium sunt corporis. Necessitatibus hic omnis consequatur quibusdam molestias labore, assumenda atque debitis veritatis velit sed ratione fugit animi quo! Accusantium nobis modi maiores asperiores esse cum numquam, officiis alias non, autem tempore, quidem atque blanditiis culpa repellendus quos vel expedita eligendi officia architecto! Libero dignissimos optio asperiores. Ullam voluptas autem, necessitatibus repudiandae perspiciatis dolorem, labore facilis numquam culpa sed consequuntur vero fuga molestiae facere eos iste hic suscipit alias, nesciunt incidunt placeat ab maiores natus, provident modi. Labore, maiores, at.</p>
            <h4>Terminos y Condiciones</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni dignissimos vero fugit laboriosam in rem explicabo molestiae et, perspiciatis modi repellat temporibus reprehenderit consequatur sunt omnis impedit, aspernatur. Doloremque ex ipsam quae quas accusantium beatae cum? Tenetur maiores harum quos ullam exercitationem tempore perferendis delectus officiis temporibus voluptatibus. Quidem animi, vel minima blanditiis sit minus numquam aut pariatur! Commodi pariatur voluptates, consectetur ipsa, perspiciatis in et iusto natus. Iste, laudantium sunt corporis. Necessitatibus hic omnis consequatur quibusdam molestias labore, assumenda atque debitis veritatis velit sed ratione fugit animi quo! Accusantium nobis modi maiores asperiores esse cum numquam, officiis alias non, autem tempore, quidem atque blanditiis culpa repellendus quos vel expedita eligendi officia architecto! Libero dignissimos optio asperiores. Ullam voluptas autem, necessitatibus repudiandae perspiciatis dolorem, labore facilis numquam culpa sed consequuntur vero fuga molestiae facere eos iste hic suscipit alias, nesciunt incidunt placeat ab maiores natus, provident modi. Labore, maiores, at.</p>
            <h4>Terminos y Condiciones</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni dignissimos vero fugit laboriosam in rem explicabo molestiae et, perspiciatis modi repellat temporibus reprehenderit consequatur sunt omnis impedit, aspernatur. Doloremque ex ipsam quae quas accusantium beatae cum? Tenetur maiores harum quos ullam exercitationem tempore perferendis delectus officiis temporibus voluptatibus. Quidem animi, vel minima blanditiis sit minus numquam aut pariatur! Commodi pariatur voluptates, consectetur ipsa, perspiciatis in et iusto natus. Iste, laudantium sunt corporis. Necessitatibus hic omnis consequatur quibusdam molestias labore, assumenda atque debitis veritatis velit sed ratione fugit animi quo! Accusantium nobis modi maiores asperiores esse cum numquam, officiis alias non, autem tempore, quidem atque blanditiis culpa repellendus quos vel expedita eligendi officia architecto! Libero dignissimos optio asperiores. Ullam voluptas autem, necessitatibus repudiandae perspiciatis dolorem, labore facilis numquam culpa sed consequuntur vero fuga molestiae facere eos iste hic suscipit alias, nesciunt incidunt placeat ab maiores natus, provident modi. Labore, maiores, at.</p>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Estoy de acuerdo</a>
    </div>
  </div>
          

@endsection