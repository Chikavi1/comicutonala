@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col m5 offset-m4">
			<div class="card">
				<h2>Crear Producto</h2>
				<form method="POST" action="{{ route('items.store') }}">
					<div class="form-group">
                    @csrf
                    <label for="title">Producto</label>
                    <input type="text" class="form-control" name="title"/>

                    <div class="form-group">
                    <label for="pricing">Precio</label>
                    <input type="text" class="form-control" name="pricing"/>
                </div>
                 <button type="submit" class="btn btn-block">Crear</button>
				</form>
			</div>
		</div>
			<a href="{{ url()->previous() }}" class="btn btn-default">regresar</a>
	</div>
@endsection