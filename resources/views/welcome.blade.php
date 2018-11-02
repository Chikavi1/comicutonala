@extends('layouts.app')

@section('content')
    <div id="inicio" class="hide-on-med-and-down">
      <h2 class="center-align">Bienvenido</h2>
      <p class="center-align">Aqui podras consultar la comida que venden en el Centro Universitario de Tonala</p>
    </div>

    <div class="row ">
      <h3>Principales</h3>
      <div class="col  s12 m6">
        <div class="card  large">
          <div class="card-image">
            <img src="{{ asset('img/hamburguesas.jpg') }}">
            <span class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Titulo de la tarjeta</font></font></span>
          </div>
          <div class="card-content">
            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Soy una tarjeta muy simple. </font><font style="vertical-align: inherit;">Soy bueno en contener pequeños trozos de información. </font><font style="vertical-align: inherit;">Soy conveniente porque necesito un poco de marcado para usar con eficacia.</font></font></p>
          </div>
          <div class="card-action">
            <a href="/$slug"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Este es un enlace. </font></font></a>
          </div>
         </div>
      </div>
       <div class="col s12 m6">
        <div class="card large">
          <div class="card-image">
            <img src="{{ asset('img/Patatas-chips.jpg') }}">
            <span class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Titulo de la tarjeta</font></font></span>
          </div>
          <div class="card-content">
            <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Soy una tarjeta muy simple. </font><font style="vertical-align: inherit;">Soy bueno en contener pequeños trozos de información. </font><font style="vertical-align: inherit;">Soy conveniente porque necesito un poco de marcado para usar con eficacia.</font></font></p>
          </div>
          <div class="card-action">
            <a href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Este es un enlace. </font></font></a>
          </div>
         </div>
      </div>
    </div>

    <div class="row hide-on-large-only" >
      <h3>Te puede interesar</h3>

      <div class="scrolling-wrapper">

        @foreach($sellers as $seller)
        <div class="carta card">
          <div class="card-image"  style="height: 14em;overflow:hidden;">
            <img src="{{ $seller->image }}" class="responsive-img">
            <span class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$seller->bussinessName}}</font></font></span>
          </div>
          <div class="card-action">
            <a href="{{ route('seller.show', [$seller->slug]) }}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ir a su perfil </font></font></a>
          </div>
        </div> 
        @endforeach

       

      </div>


       <h3>Bebidas</h3>
        @foreach($bebidas as $bebida)
      <div class="scrolling-wrapper">
        
        <div class="carta card">
          <div class="card-image">
            <img src="{{$bebida->image}}">
            <span class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$bebida->title}}</font></font></span>
          </div>
          <div class="card-action">
            <a href="{{ route('seller.show', [$bebida->slug]) }}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ver perfil </font></font></a>
          </div>
        </div> 
        @endforeach

        
       

      </div>

       <h3>Comida Salada</h3>

      <div class="scrolling-wrapper">
        @foreach($salados as $salado)
        <div class="carta card">
          <div class="card-image">
            <img src="{{$salado->image}}">
            <span class="card-title">{{$salado->title}}</span>
          </div>
          <div class="card-action">
            <a href="{{ route('seller.show', [$salado->slug]) }}">Ver perfil</a>
          </div>
        </div> 
      @endforeach
      </div>

       <h3>Comida dulce</h3>
      <div class="scrolling-wrapper">
        @foreach($dulces as $dulce)
        <div class="carta card">
          <div class="card-image">
            <img src="{{$dulce->image}}">
            <span class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$dulce->title}}</font></font></span>
          </div>
          <div class="card-action">
            <a href="{{ route('seller.show', [$dulce->slug]) }}"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Este es un enlace. </font></font></a>
          </div>
        </div> 
        @endforeach


       

    </div>
@endsection
