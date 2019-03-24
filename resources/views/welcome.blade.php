@section('withsearch','withsearch')
@extends('layouts.app')

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
      @foreach($sellers as $seller)
        <a href="{{ route('seller.show', [$seller->slug]) }}">

        <div class=" card">
          <div class="card-image"  style="height: 14em;overflow:hidden;">
             <img src="{{ Storage::url($seller->image) }}" width="213" height="200">

            <span class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$seller->bussinessName}}</font></font></span>
          </div>
          <div class="card-action">
            <p>{{ $seller->title }}</p>
          </div>
        </div> 
        </a>
      @endforeach
  </div>
</div>
    @else

      <div id="inicio" class="">
          <h2 class="center-align">Bienvenido</h2>
          <p class="center-align">Aqui podras consultar la comida que venden en el Centro Universitario de Tonala</p>
      </div>

      <div class="row valign-wrapper">
        <div class="col s9 m11">
          <h3>Categorias</h3>
        </div>      
        <div class="col s3 m1">
          <a href="{{ route('categorias.index') }}">ver mas</a>
        </div>      
      </div>
      <div class="scrolling-wrapper">
        @foreach($categories as $category)
        <a href="{{ route('categorias.show', [$category->id]) }}">

        <div class="carta-categoria ">
          <img src="{{ asset('img/'.$category->name.'.jpg') }}" alt=".." style="height: 140px;" class=" responsive-img"> 
        <p class="center-align">{{$category->name}}</p>
          
        </div> 
        </a>
        @endforeach
      </div>
      
      <div class="row valign-wrapper">
        <div class="col s9 m11">
          <h3>Te puede interesar</h3>
        </div>      
        <div class="col s3 m1">
          <a href="{{ route('categorias.index') }}">ver mas</a>
        </div>      
      </div>        
      <div class="row hide-on-large-only" >

        <div class="scrolling-wrapper">
          @foreach($sellers as $seller)
          <a href="{{ route('seller.show', [$seller->slug]) }}">

          <div class="carta card">
            <div class="card-image"  style="height: 14em;overflow:hidden;">
               <img src="{{ Storage::url($seller->image) }}" width="213" height="200">

              <span class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$seller->bussinessName}}</font></font></span>
            </div>
            <div class="card-action">
              <p>{{ $seller->title }}</p>
            </div>
          </div> 
          </a>
          @endforeach
        </div>
      </div>

      <div class="row valign-wrapper">
        <div class="col s9 m11">
          <h3>Comida</h3>
        </div>      
        <div class="col s3 m1">
          <a href="{{ route('categorias.index') }}">ver mas</a>
        </div>      
      </div>
      <div class="scrolling-wrapper">
        @foreach($salados as $salado)
            <a href="{{ route('seller.show', [$salado->slug]) }}">
        <div class="carta card">
          <div class="card-image">
            <img src="{{ Storage::url($salado->image) }}" width="213" height="200">
            <span class="card-title">{{$salado->title}}</span>
          </div>
              
        </div> 
            </a>
        @endforeach
      </div>

      <div class="row valign-wrapper">
        <div class="col s9 m11">
          <h3>Postres </h3>
        </div>      
        <div class="col s3 m1">
          <a href="{{ route('categorias.index') }}">ver mas</a>
        </div>      
      </div>
      <div class="scrolling-wrapper">
        @foreach($dulces as $dulce)
            <a href="{{ route('seller.show', [$dulce->slug]) }}">
        <div class="carta card">
          <div class="card-image">
            <img src="{{ Storage::url($dulce->image) }}" width="213" height="200">
            <span class="card-title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$dulce->title}}</font></font></span>
          </div>
          
         
        </div> 
            </a>
        @endforeach
      </div>

      <div class="row valign-wrapper">
        <div class="col s9 m11">
          <h3>Bebidas</h3>
        </div>      
        <div class="col s3 m1">
          <a href="{{ route('categorias.index') }}">ver mas</a>
        </div>      
      </div>
      <div class="scrolling-wrapper">
          @foreach($bebidas as $bebida)
              <a href="{{ route('seller.show', [$bebida->slug]) }}">
          <div class="carta card">
            <div class="card-image">
              <img src="{{ Storage::url($bebida->image) }}" width="213" height="200">
              <span class="card-title">{{$bebida->title}}</span>
            </div>
            
           
          </div> 
              </a>
           @endforeach
      </div>
  @endif





@endsection
