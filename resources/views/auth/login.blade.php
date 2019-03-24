@extends('layouts.app')

@section('content')

<style>
    body{
     background-size: cover;
     background-repeat: no-repeat;
    background-position: left;
     background-image: url({{ asset('img/cut.jpeg')   }});
    }
    #email{
        color:white;
    }
    #password{
        color:white;
    }
</style>

<div class="container">
    <div class="row ">
        <div class="col offset-m3 m7 s12">
            <div class="card " style="background-color: rgba(0, 0, 0, 0.7);border: 7px solid white;" >
            <div class="center">
                
               <h2 class="center" style="color:white;">Entrar</h2>

                
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Correo</label>

                            <div class="col s12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback white-text" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col s12 ">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Recordarme
                                    </label>
                                </div>
                            </div>
                        </div>
                            <a class=" btn-link" href="{{ route('password.request') }}">
                                   ¿Olvidaste tu contraseña?
                                </a>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Ingresar
                                </button>

                            </div>
                                
                                <div class="row">
                                  
                                <a href="{{ route('register') }}" class="white-text" > Registrarme</a>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
           
        </div>
    </div>
</div>
@endsection
