
@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
<div class="color-cut">
  <p class="center white-text" style="margin-top: 0 !important;padding: 1em;"><strong>{{ $message }}</strong></p>
</div>
@endif


<h4 class="center">
	 {{ $user->name }}
</h4>



<div class="padding">
	
<div class="row">
  <div class="card col s12 m6 offset-m3 z-depth-5">
 	 	<h5 class="center-align">Datos de la cuenta</h5>
			<table class=" highlight striped">
			    <thead>
			        <tr>
			            <th>Nombre del Usuario</th>
			            <th class="right-align">{{$user->name}}</th>

			        </tr>
			    </thead>

			    <tbody >
			    	<tr >
			          <td>correo</td>
			          <td class="right-align">{{$user->email}}</td>
			        </tr>
			        <tr >
			          <td>codigo</td>
			          <td class="right-align">{{$user->code}}</td>
			        </tr>
			        <tr >
			          <td>Carrera</td>
			          <td class="right-align">{{$user->career}}</td>
			        </tr>
			    </tbody>
			</table>
		<a href="{{ route('profile.password') }}" class="btn btn-block color-cut">cambiar contraseña</a>
  </div>
</div>
<div class="row">
	<div class="col m8 offset-m2 s12 card">
			<h5 class="center-align">Tus negocios</h5>
			
			<ul class="collection">
				@if(empty($sellers->count()))
				<div class="center-align">
					<p>Aun no tienes cuentas de vendedores :(</p>
					<p>puedes <a href="{{ route('seller.create')}}">registrar</a> una cuenta </p>
				</div>
				@else
					@foreach($sellers as $seller)
				    <li class="collection-item avatar">
				      <img src="{{ Storage::url($seller->image) }}" alt="" class="circle">
				      <a href="{{ route('seller.show',$seller->slug) }}" class="bold">{{$seller->title}}</a>

				      <p>{{$seller->category}} <br></p>
						@if($seller->status == 2)
							<p class="blue-text">PENDIENTE</p>
						@elseif($seller->status == 1)
							<p class="green-text">PUBLICADO</p>
						@elseif($seller->status == 3)
							<p class="red-text">RECHAZADO</p>
						@endif
				      <a href="{{ route('seller.edit',$seller->id) }}" class="secondary-content"><i class="material-icons">edit</i></a> 
				    </li>
					@endforeach
				@endif
			
			  </ul>



	</div>
</div>
</div>
@endsection

