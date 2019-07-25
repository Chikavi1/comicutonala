@section('withsearch','withsearch')
@extends('layouts.app')
<style>
  
  hr { 
    border-top: 1px solid #e0e0e0;
  }
  .letras-chicas{
    font-size: .75em;
  }
  .black-color{
    color: black !important;
  }
  .img-sizes{
    max-height: 12.75em;
    min-height: 12.75em;
  }
 
</style>
@section('content')
    @if($busqueda)
      
        <div class="row ">
          <a href="/" class="btn btn-block ">
            <span class="">
              <i class="material-icons"> arrow_back</i>regresar
            </span>
          </a>
        </div>

<div class="row">
  <div class="col s12">
    
        @if( $sellers->count() == 0)
          <div class="center-align">
            <img src="{{ asset('img/almacenar.png') }}" class="img-responsive " width="250" height="250" alt="no encontrado">
            <h4>No encontramos nada con ese nombre</h4>
          </div>
        @endif

      <div class="row">
        <div class="col s12 m4 offset-m4">

  @if( $sellers->count() > 0)
      <h5>Resultados</h5>
      <ul class="collection">
      @foreach($sellers as $seller)
        <li class="collection-item avatar" >
          <a href="{{ route('seller.show', [$seller->slug]) }}">
                <img src="{{Storage::url($seller->image)}}" alt="" class="circle">
                <p class="title"><strong>{{$seller->title}}</strong></p>
                <p class="black-color">{{ $seller->category }}</p>
                <p class="black-color">{{ $seller->schedule }}</p>
                <span class="letras-chicas black-color">{{ $seller->school }}</span>
          </a>
            </li>
      @endforeach
      </ul>
    @endif
      </div>
     
      </div>
  </div>
</div>
    @else

      <div id="inicio" class="">
           <h2 class="center-align">Bienvenido</h2> 
          <h5 class="center-align">{{ isset($centro) ? $centro : ' ' }}</h5>
          <!--<p class="center-align">Aqui podras consultar la comida que venden en el Centro Universitario de Tonala</p>
        -->
      </div>

  <div class="padding">
  
      <div class="row valign-wrapper">
        <div class="col s9 m11">
          <h4>Categorias</h4>
        </div>      
        <div class="col s3 m1">
          <a href="{{ route('categorias.index') }}">ver mas</a>
        </div>      
      </div>
      <div class="row">
          @foreach($categories as $category)
             <a href="{{ route('categorias.show', [$category->id]) }}">
            <div class="col s6 m2">
              <div class="card" style="max-height: 13em;min-height: 13em;">
                <div class="card-image">
                  <img src="{{ asset('img/'.$category->name.'.jpg') }}" style="max-height: 8em;min-height: 8em;">
                </div>
                <div class="card-content">
                  <p class="center-align">{{$category->name}}</p>
                </div>
               
              </div>
            </div>
           </a>

          @endforeach
      </div>

      
      <hr>
    
      <div class="row valign-wrapper">
        <div class="col s9 m11">
          <h4>Te puede interesar</h4>
        </div>      
        <div class="col s3 m1">
          <a href="{{ route('categorias.index') }}">ver mas</a>
        </div>      
      </div> 
      <div class="row " >
        @foreach($sellers as $seller)
        <div class="col s6 m3">
          <a href="{{ route('seller.show', [$seller->slug]) }}">
          <div class="card">
            <div class="card-image">
              <img src="{{ Storage::url($seller->image) }}" class="img-sizes">
            </div>
            <div class="card-content">
              <p class="center-align">{{ $seller->title }}</p>
            </div>
          
          </div>
         </a>
        </div>
          @endforeach
      </div>

      <hr>

      <div class="row valign-wrapper">
        <div class="col s9 m11">
          <h4>Comida</h4>
        </div>      
        <div class="col s3 m1">
          <a href="{{ route('categorias.index') }}">ver mas</a>
        </div>      
      </div> 
      <div class="row " >
        @foreach($salados as $salado)
        <div class="col s6 m3">
          <a href="{{ route('seller.show', [$salado->slug]) }}">
          <div class="card">
            <div class="card-image">
              <img src="{{ Storage::url($salado->image) }}" class="img-sizes">
            </div>
            <div class="card-content">
              <p class="center-align">{{ $salado->title }}</p>
            </div>
          
          </div>
         </a>
        </div>
          @endforeach
      </div>
  
      <hr>

      <div class="row valign-wrapper">
        <div class="col s9 m11">
          <h4>Postres </h4>
        </div>      
        <div class="col s3 m1">
          <a href="{{ route('categorias.index') }}">ver mas</a>
        </div>      
      </div> 
      <div class="row " >
        @foreach($dulces as $dulce)
        <div class="col s6 m3">
          <a href="{{ route('seller.show', [$dulce->slug]) }}">
          <div class="card">
            <div class="card-image">
              <img src="{{ Storage::url($dulce->image) }}" class="img-sizes">
            </div>
            <div class="card-content">
              <p class="center-align">{{ $dulce->title }}</p>
            </div>
          
          </div>
         </a>
        </div>
          @endforeach
      </div>

      <hr>

      <div class="row valign-wrapper">
        <div class="col s9 m11">
          <h4>Bebidas</h4>
        </div>      
        <div class="col s3 m1">
          <a href="{{ route('categorias.index') }}">ver mas</a>
        </div>      
      </div> 
      <div class="row " >
        @foreach($bebidas as $bebida)
        <div class="col s6 m3">
          <a href="{{ route('seller.show', [$bebida->slug]) }}">
          <div class="card">
            <div class="card-image">
              <img src="{{ Storage::url($bebida->image) }}" class="img-sizes">
            </div>
            <div class="card-content">
              <p class="center-align">{{ $bebida->title }}</p>
            </div>
          
          </div>
         </a>
        </div>
          @endforeach
      </div>





  </div>

  @endif


<div class="margin-bottom-footer">
  
</div>


@endsection
