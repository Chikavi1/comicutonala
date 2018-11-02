@foreach($sellers as $seller)
	<div>
		<a href="{{ route('seller', [$seller->slug]) }}">{{$seller->title }}</a>
		
		
		{{$seller->slug }}
		{{$seller->description }}
		{{$seller->category }}
		{{$seller->cellphone }}
		{{$seller->rating }}
		{{$seller->salon }}
		{{$seller->available }}
		<hr>
	</div>
@endforeach
