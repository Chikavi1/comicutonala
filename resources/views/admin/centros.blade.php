 @extends('admin.index')
 @section('admin')
 	<div class="container">
 		
		<h3>Centros Disponibles</h3>
	@foreach($centros as $centro)
		<ul>
			<li>
  				<a href="/centro/{{$centro->slug}}">{{ $centro->title }} </a>
			</li>
		</ul>
 	@endforeach
 	</div>
 	<div class="container">
 		<h4>Centros de usuarios</h4>
 		@foreach($centrosUser as $centro)
		<ul>
			<li>
  				<a href="">{{ $centro->school }}</a>
			</li>
		</ul>	
 		@endforeach
 	</div>
 @endsection