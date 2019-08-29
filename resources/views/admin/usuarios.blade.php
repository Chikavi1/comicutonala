 @extends('admin.index')

 @section('admin')
<div class="row">
	<div class="col m8 offset-m2">
 <table class="responsive-table">
        <thead>
          <tr>
              <th>nombre</th>
              <th>codigo</th>
              <th>correo</th>
              <th>carrera</th>
          </tr>
        </thead>

        <tbody>
          @foreach($users as $user)
          <tr>
            <td>{{ $user->name}}</td>
            <td>{{ $user->code }}</td>
            <td>{{ $user->email }}</td>   
            <td>{{ $user->career }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>	


  <div class="row">
    <div class="col s10 offset-s1 sm2 offset-m4">
      <div class="render">
       {{$users->links('vendor.pagination.materializecss')}}
      </div>
     </div>
  </div>
	
  </div>
</div>
@endsection