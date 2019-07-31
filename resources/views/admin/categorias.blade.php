 @extends('admin.index')

 @section('admin')
<div class="row">
	<div class="col m8 offset-m2">
		<a href="{{route('categorias.create')}}" class="green-text btn-flat ">Agregar mas categorias</a>
 <table>
        <thead>
          <tr>
              <th>nombre</th>
              <th>Accion</th>
          </tr>
        </thead>

        <tbody>

        @foreach($categories as $category)
          <tr>
            <td>{{ $category->name  }}</td>
            <td><a href=" {{ route('categorias.destroy',$category->id) }}" class="red-text"> Eliminar</a> / <a href="">Editar</a></td>
          </tr>
         @endforeach
          
        </tbody>
      </table>	
	</div>
</div>
@endsection