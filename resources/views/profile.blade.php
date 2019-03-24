
@extends('layouts.app')

@section('content')
<h1 class="center-align">{{ $user->name }}</h1>
<h4 class="center">
	 {{ $user->email }}
</h4>


<div class="row">
  <div class="card col s12 m6 offset-m3 z-depth-5">
    
  <h5 class="center-align">Datos de la cuenta</h5>
    <table class=" highlight striped">
          <thead>
            <tr>
                <th>Nombre del Usuario</th>
                <th>{{$user->name}}</th>
            </tr>
          </thead>

          
            <tr>
              <td>telefono</td>
              <td>{{$user->phone}}</td>
            </tr>
            
        </tbody>
      </table>
  </div>
</div>

@endsection

