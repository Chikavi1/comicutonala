<style>
	body{
	
}
</style>
		<div class="row padding" style="z-index: 1 !important;background: #f8f8f8;">
			<div class="col s12 m8 offset-m2 ">
			      <ul class="collection border-color" >
			      @forelse($sellers as $seller)
			        <li class="collection-item avatar" style="background: #f8f8f8;" >
			          <a href="{{ route('seller.show', [$seller->slug]) }}">
			                <img src="{{Storage::url($seller->image)}}" alt="{{$seller->title}}" class="circle">
			                <p class="title truncate"><strong>{{$seller->title}}</strong></p>
			                <p class="black-text">{{ $seller->category }}</p>
			                <p class="black-text">{{ $seller->schedule }}</p>
			                <span class="letras-chicas black-text">{{ $seller->school }}</span>
			          </a>
			            </li>
				@empty
					<h4 class="bold center-align blue-text">Sin resultados</h4>
					<p class="center-align">Checa que todos los campos estén completos o intenta buscar otra cosa.</p>
				@endforelse
			      </ul>
			</div>
		</div>
