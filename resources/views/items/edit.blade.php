@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col m5 offset-m4">
			<div class="card">
				<h2>Editar {{ $item->title }}</h2>
				<form method="POST" action="{{ route('items.update',$item->id) }}">
                    @method('PATCH')
                    @csrf
					<div class="form-group">
                    <label for="title">Producto</label>
                    <input type="text" class="form-control" name="title" value="{{$item->title}}"/>

                    <div class="form-group">
                    <label for="pricing">Precio</label>
                    <input type="text" class="form-control" name="pricing" value="{{ $item->pricing }}"/>
                </div>
                 <button type="submit" class="btn btn-block">Editar</button>
				</form>
			</div>
		</div>
			<a href="{{ url()->previous() }}" class="btn btn-default">regresar</a>
	</div>
@endsection