@extends('layouts.app') 
    @section('content')
    <style>
       .siiaubox{
        border: 3px solid red;
        color: blue;
        min-height: 15em;
        height: 20em;
       }
       
       .border-blue{
        border: 1px solid #0050ef;
       }
       .border-satisfactorio{
        border: 1px solid green;
       }
       .border-error{
       border: 1px solid red;
        }
       .color-blue{
        color:blue;

       }
      #verificacion input{
       text-align:center;
       color:blue;
    }
    input{
        text-align: center;
    }
.oculto{
    display: none ;
}

.satisfactorio{
    border: 3px solid green;
}
.error{
    border: 5px solid red;
}
 .input-field input.input-siiau:focus {
     border-bottom: 1px solid #ffcc00 !important;
     box-shadow: 0 1px 0 0 #ffcc00 !important;
   }
   .resultado{
    display: none;
   }
   .margin1-top{
    margin-top: 2em;
   }
   .color-satisfactorio{
    color:green !important;
   }
   .color-error{
    color:red !important;
   }
    </style>
    
    <script>
        $(document).ready(function(){

            $("#enviar").click(function(){
                
             });
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


        <div class="row " id="verificacion">
            <div class="padding">

                <div class="col offset-m4 m4 s12 card siiaubox">

                        <p class="center"><strong>Registrate con tu codigo </strong></p>

                        <form method="POST">
                            {{ @csrf_field() }}
                            <div class="row">
                                <div class="input-field  col offset-s2 s8">
                                  <input class="input-siiau" placeholder="Código" id="codigo" name="codigo"  type="text" class="validate" required>
                                </div>
                                <div class="input-field col offset-s2 s8">
                                  <input class="input-siiau" placeholder="NIP" id="nip" name="nip" type="password" class="validate" required> 
                                </div>
                                <div class="input-field col offset-s2 s8">
                                    <button id="verificar" class=" btn-block btnsiiau color-blue border-blue center"> Verificar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                
                 <div class="col offset-m4 m4 s12 card resultado" >
                    <div class="center-align  padding">
                       <div class="resultado-satisfactorio oculto">
                            <img src="{{ asset('img/success.png') }}" alt="" width="70">
                            <h5 class="color-satisfactorio"><span class="message-response"></span></h5>
                            <p class="centro"></p>
                            <button class="btn-block btnsiiau margin1-top color-satisfactorio border-satisfactorio" id="siguiente">Siguiente</button>
                       </div>
                        <div class="resultado-error oculto">
                           <img src="{{ asset('img/error.png') }}" alt="" width="70">
                            <h5 class="color-error">Error</h5>
                            <p id="mensaje-error" class="color-error"></p>
                            <button class="btn-block btnsiiau margin1-top color-error border-error " id="volver">Volver a intentarlo</button>
                        </div>
                    </div>
                </div>
                
                </div>



            </div>

        <script>
    $(document).ready(function(){
            

            $("#verificar").click(function(e){
                e.preventDefault();
                $.ajax({
                      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                        type: 'get',
                        dataType: 'json',
                        url: '{{ url("/scraping") }}',
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'codigo': $('#codigo').val(),
                            'nip' : $('#nip').val()
                        },
                        success: function(response) {
                         console.log(response);

                         $("#name").val(response.nombre);
                         $("#codigo ").val(response.codigo);
                         $("#code ").val(response.codigo);
                         $("#carrera").val(response.carrera);
                         $('#centro').val(response.centro);

                         $(".message-response").text(response.nombre);
                         $(".centro").text(response.centro);
                         $("#mensaje-error").text(response.descripcion);
                          console.log(response.message);
                          $(".siiaubox").fadeOut(2000);
                          $(".siiaubox").hide();
                          $(".resultado").fadeIn(2500);
                             if(response.message === "satisfactorio"){
                                $(".resultado-error").hide();
                                $(".resultado-satisfactorio").show(); 
                                $(".resultado").removeClass("error");
                                $(".resultado").addClass("satisfactorio")  

                             }else if(response.message === "error"){
                                $(".resultado-satisfactorio").hide();
                                $(".resultado-error").show();
                                $(".resultado").removeClass("satisfactorio");
                                $(".resultado").addClass("error");

                             }
                        }
                    });
                    
                              
            });

            $("#volver").click(function(){
                $(".resultado").fadeOut(2000);
                $(".resultado").hide();
                $(".siiaubox").fadeIn(2500);
            });

            $("#siguiente").click(function(){
                $(".siiaubox").fadeOut(2000);
                $("#verificacion").hide();
                $(".container").fadeIn(2500);
                $("#verificacion").remove();
            });

        });
</script>

        <div id="registro" class="container oculto" >
            <div class="row ">
                <div class="col offset-m3 m6 s12 card">
                    <div class="center">
                        <h2>Registrarse</h2>

                        <div class="card-body padding">
                            <form method="POST" action="{{ route('register') }}">
                               {{ @csrf_field() }}
                                <input id="code" type="hidden" class="form-control{{ $errors->has('code') ? ' is-invalid' : '' }}" name="code" value="" required autofocus>

                                  <div class="form-group row">
                                    <label for="codigo" class="col-sm-4 col-form-label text-md-right">Codigo UDG</label>
                                    <div class="col-md-6">
                                        <input disabled id="codigo" type="number" class="form-control{{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" value="" required autofocus>


                                        @if ($errors->has('codigo'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('codigo') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                  <div class="form-group row">
                                    <label for="carrera" class="col-sm-4 col-form-label text-md-right">Carrera</label>

                                    <div class="col-md-6">
                                        <input disabled id="carrera" type="text" class="form-control{{ $errors->has('carrera') ? ' is-invalid' : '' }}" name="carrera" value=""  autofocus>

                                        @if ($errors->has('carrera'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('carrera') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="centro" class="col-sm-4 col-form-label text-md-right">centro</label>

                                    <div class="col-md-6">
                                        <input disabled id="centro" type="text" class="form-control{{ $errors->has('centro') ? ' is-invalid' : '' }}" name="centro" value=""  autofocus>

                                        @if ($errors->has('centro'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('centro') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Correo electronico</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                              


                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-block color-cut">
                                            Registrar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
