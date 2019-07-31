
<script>
	
$(document).ready(function(){    
    $('.modal').modal();
  });
</script>



<div class="row">
	<div class="col s8 offset-s2  offset-m5">

		<div class="render">
			 {{$items->links('vendor.pagination.materializecss')}}
		</div>
	</div>
</div>


<div class="animated">
	
@foreach($items as $item)
		

		<div class="col s12 m4">
		    <div class="card small hoverable">
		    	<a href="#modal{{$item->id}}" class=" modal-trigger">
		    		
			    <div class="card-image waves-effect waves-block waves-light">
			      <img class="activator" src="{{ Storage::url($item->image) }}">
			    </div>
			    <div class="card-content">
			      <span class="card-title activator grey-text text-darken-4">{{$item->title}}</span>
			    	@if(Auth::id() ==  $seller->user_id)
						<div class="row">
							<div class="col s12">
								<a href="{{ route('items.edit',$item->id) }}" class="btn center-align btn-block color-cut">Editar</a>
							</div>
						</div>
					@endif
			    </div>
		    	</a>
			</div>
		</div>

		<div id="modal{{$item->id}}" class="modal modal-show modal-fixed-footer">
		    <div class="modal-content" >
				<img class="responsive-img hide-on-med-and-up" src="{{ Storage::url($item->image) }}">


		    	<div class="row">	
		    		<div class="col m6 s12" style="border-right: 1px solid #e0e0e0">
		      			<img class="responsive-img hide-on-small-only" width="600" src="{{Storage::url($item->image)}}">
		    		</div>
		    		<div class="col m6 s12">
		    			<h4 class="center-align bold">{{ ucfirst($item->title) }}</h4>
		    			<hr>
		    			<div class="padding">
		    				<p>Categoria:</p>
							<h5 class="bold">{{$item->category}} </h5>
							<p>Descripción:</p>
							<p>{!! $item->description !!}</p>
							<p class="color-green center-align bold pricing-size">$ {{$item->pricing}} MXN</p>
		    			</div >
					    </div>
		    		</div>
		    	</div>

		      <div class="modal-footer"  >
					      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
			   </div>
		</div>
		@endforeach
</div>
