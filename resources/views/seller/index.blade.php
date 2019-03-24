@extends('layouts.app')

@section('content')

<div class="col s12 ">
                 <div class="row">
                   <div class="col s12 ">
    		
                   
                 </div>
              
	<div class="row">
	@foreach($sellers as $seller)
		<div class="row">
		<div class="col s12 m6 offset-m3">
			
		<div class="card">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="activator" src="{{ Storage::url($seller->image) }}" height="400" ="250">
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">{{ $seller->title }}<i class="material-icons right">more_vert</i></span>
      <p><a href="{{route('seller.show',$seller->slug)}}">ver mas</a></p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">{{$seller->title}}<i class="material-icons right">close</i></span>
      <p>{!! $seller->description !!}</p>
      <p>{{ $seller->user->name }}</p>
      <p class="color-blue">{{$seller->cellphone}}</p>
    </div>
  </div>
		</div>
	</div>

	@endforeach
	</div>
		
	



@endsection