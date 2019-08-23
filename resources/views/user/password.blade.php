@extends('layouts.app')

@section('content')

<div class="row">
	@if ($message = Session::get('success'))
<div class="color-cut">
  <h5 class="center white-text" style="margin-top: 0 !important;padding: 1em;"><strong>{{ $message }}</strong></h5>
</div>
@endif
	<div class="col m4 offset-m4 s12">
		
		<div class="card padding">
			<h5 class="center-align">Cambiar contraseña</h5>
			<form method="post" action="{{ url('profile/updatepassword') }}" class="padding">
				{{ csrf_field() }}
				<div class="input-field">
                    <input type="password" class="form-control" name="mypassword"/>
                    <label for="mypassword">Contraseña actual</label>
                </div>
                <div class="input-field">
                    <input type="password" class="form-control" name="password"/>
                    <label for="password">Nueva contraseña</label>
                </div>
                <div class="input-field">
                    <input type="password" class="form-control" name="password_confirmation"/>
                    <label for="password_confirm">Confirma tu nueva contraseña</label>
                </div>
                <input type="submit" value="Actualizar" class="btn btn-block color-cut">
			</form>

		</div>
	</div>
</div>
	
@endsection