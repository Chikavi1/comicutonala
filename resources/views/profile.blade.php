
@extends('layouts.app')

@section('content')

@if ($message = Session::get('success'))
<div class="color-cut">
  <h5 class="center white-text" style="margin-top: 0 !important;padding: 1em;"><strong>{{ $message }}</strong></h5>
</div>
@endif

<h1 class="center-align">{{ $user->name }}</h1>
<h4 class="center">
	 {{ $user->email }}
</h4>



<div class="padding">
	
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

			    <tbody>  
			        <tr>
			          <td>telefono</td>
			          <td>{{$user->phone}}</td>
			        </tr>
			    </tbody>
			</table>
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
				      <a href="{{ route('seller.show',$seller->slug) }}">{{$seller->title}}</a>
				      <p>{{$seller->category}} <br></p>
				      <a href="{{ route('seller.edit',$seller->id) }}" class="secondary-content"><i class="material-icons">edit</i></a> 
				    </li>
					@endforeach
				@endif
			
			  </ul>



	</div>
</div>
</div>
@endsection

