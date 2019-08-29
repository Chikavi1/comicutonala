@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 offset-m2 m8">
            <div class="card">
               <h4 class="center padding">Restablecer contraseña</h4>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                  
                            <div class="input-field col s8 offset-s2">
                              <input id="email" type="email" class="validate" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                              <label for="email">Correo</label>
                               @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                            </div>
                      
                        
                            <div class="input-field col s8 offset-s2">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                  <label for="password">Contraseña</label>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                              <div class="input-field col s8 offset-s2">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                <label for="password-confirm">Confirmar contraseña</label>

                            
                        </div>

                                <button type="submit" class="btn btn-block color-cut">
                                    Restablecer tu contraseña
                                </button>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection
