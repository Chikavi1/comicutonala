@extends('layouts.app')

@section('content')
<style>
	.box-school{
		height: 21.4em;
		min-height: 21.4em;
	}
</style>
<div class="row">
	<div class="col s12 m4 offset-m4 card center-align box-school">
		<h4 class="bold">Centros</h4>
		@foreach($centros as $centro)
			<a class="bold cut-text" href="{{ route('centro',$centro->slug) }}">{{ $centro->title }}</a><br>
			<hr>
		@endforeach
	</div>
</div>
@endsection
