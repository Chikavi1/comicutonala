 @extends('admin.index')

 @section('admin')
 <script>
 	
 	$(document).ready(function(){
    $('.materialboxed').materialbox();
  });	
 </script>
<div class="row">
	<div class="col m10 offset-m1">
 <table class="responsive-table ">
        <thead>
          <tr>
              <th>imagen</th>
              <th>titulo</th>
              <th>categoria</th>
              <th>telefono</th>
              <th>lugar</th>
              <th class="center-align">horario</th>
              <th class="center-align">accion</th>
          </tr>
        </thead>

        <tbody>
          @foreach($sellers as $seller)
          <tr>
            <td><img src="{{Storage::url($seller->image)}}" class="materialboxed" 	 width="50"></td>
            <td><a href="{{route('seller.show',$seller->slug)}}" class="blue-text">{{ $seller->title}}</a></td>
            <td>{{ $seller->category }}</td>
            <td>{{ $seller->cellphone }}</td>
            <td>{{ $seller->salon }}</td>
            <td>{{ $seller->schedule }}</td>
            <td><a href="{{ route('admin.upseller',$seller->id) }}" class="green-text">Aprobar</a> | 
            	<a href="{{ route('admin.rejectedseller',$seller->id) }}" class="red-text">Rechazar</a>
            </td>
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