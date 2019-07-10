
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
			<h4 class="center-align">Tus Cuentas</h4>
			
			<ul class="collection">
			@foreach($sellers as $seller)
			    <li class="collection-item avatar">
			      <img src="{{ Storage::url($seller->image) }}" alt="" class="circle">
			      <a href="">{{$seller->title}}</a>
			      <p>{{$seller->category}} <br>
			         
			      </p>
			      <a href="{{ route('seller.edit',$seller->id) }}" class="secondary-content"><i class="material-icons">edit</i></a> 

			    </li>
			@endforeach
			  </ul>



	</div>
</div>
@endsection

