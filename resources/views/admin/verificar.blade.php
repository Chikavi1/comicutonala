 @extends('admin.index')

 @section('admin')
<div class="row">
  <div class="col m8 offset-m2">
 <table class="responsive-table">
        <thead>
          <tr>
              <th>imagen</th>
              <th>titulo</th>
              <th>categoria</th>
              <th>telefono</th>
              <th>lugar</th>
              <th>horario</th>
              <th>accion</th>
          </tr>
        </thead>

        <tbody>
          @foreach($sellers as $seller)
          <tr>
            <td><img src="{{Storage::url($seller->image)}}" alt="" width="50"></td>
            <td>{{ $seller->title}}</td>
            <td>{{ $seller->category }}</td>
            <td>{{ $seller->cellphone }}</td>
            <td>{{ $seller->salon }}</td>
            <td>{{ $seller->schedule }}</td>   
            <td><a href="{{ route('admin.banseller',$seller->id) }}" class="btn red">Bloquear</a></td>  
          </tr>
          @endforeach
        </tbody>
      </table>  


  <div class="row">
    <div class="col s10 offset-s1 sm2 offset-m4">
      <div class="render">
       {{$sellers->links('vendor.pagination.materializecss')}}
      </div>
     </div>
  </div>
  
  </div>
</div>
@endsection