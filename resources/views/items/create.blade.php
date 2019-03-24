@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col m5 offset-m4 s12">
			<div class="card padding">
				<h2 class="center-align">Crear Producto</h2>
				<form method="POST" action="{{ route('items.store') }}">
					<div class="form-group">
                    @csrf
                    <label for="title">Producto</label>
                    <input type="text" class="form-control" name="title"/>

                    <div class="form-group">
                    <label for="pricing">Precio</label>
                    <input type="text" class="form-control" name="pricing"/>
                </div>
                 <button type="submit" class="btn btn-block color-cut">Crear</button>
				</form>
			</div>
		</div>
		<a href="{{ url()->previous() }}" class="waves-effect waves-light btn valign-wrapper"><i class="material-icons">arrow_back_ios</i>Regresar</a>
	</div>
@endsection