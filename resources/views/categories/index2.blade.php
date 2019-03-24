 @extends('admin.index')

 @section('admin')
<div class="row">
	<div class="col m8 offset-m2">
		<a href="{{route('categorias.create')}}">Agregar mas categorias</a>
 <table>
        <thead>
          <tr>
              <th>id</th>
              <th>nombre</th>
              <th>Accion</th>
          </tr>
        </thead>

        <tbody>

        @foreach($categories as $category)
          <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name  }}</td>
            <td><a href=" {{ route('categorias.destroy',$category->id) }}" class="red-text"> Eliminar</a> / <a href="">Editar</a></td>
          </tr>
         @endforeach
          
        </tbody>
      </table>	
	</div>
</div>
@endsection