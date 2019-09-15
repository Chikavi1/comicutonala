@section('withsearch','withsearch')
@extends('layouts.app')
<!DOCTYPE html>
<style>
  body{
    background: #f8f8f8;
  }
  hr { 
    border-top: 1px solid #e0e0e0;
  }
 
  .img-sizes{
    max-height: 12.75em;
    min-height: 12.75em;
  }
  .color-cut-letra{
    color: #17202f
  }
 
</style>

@section('content')
    @if($busqueda)
      
      
<div class="row">
  <div class="col s12" style="padding-top: 3em;">
    
        @if( $sellers->count() == 0)
          <div class="center-align">
            <img alt="" src="{{ asset('img/img-em1/loto_a.png')}}" class="img-responsive " width="250" height="250" alt="no encontrado">
            <h4 class="font-bold">No encontramos nada con ese nombre</h4>
          </div>
        @endif

      <div class="row">
        <div class="col s12 m4 offset-m4">

  @if( $sellers->count() > 0)
      <h5 class="font-bold center-align">Principales resultados</h5>
      <ul class="collection">
      @foreach($sellers as $seller)
        <li class="collection-item avatar" >
          <a href="{{ route('seller.show', [$seller->slug]) }}">
                <img src="{{Storage::url($seller->image)}}" alt="{{$seller->title}}" class="circle">
                <p class="title truncate"><strong>{{$seller->title}}</strong></p>
                <p class="black-text">{{ $seller->category }}</p>
                <p class="black-text">{{ $seller->schedule }}</p>
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
<!--
      <div id="inicio" class="">
           <h2 class="center-align">Bienvenido</h2> 
          <h5 class="center-align">{{ isset($centro) ? $centro : ' ' }}</h5>
          !--<p class="center-align">Aqui podras consultar la comida que venden en el Centro Universitario de Tonala</p>
        --
      </div>
-->
  <div class="padding">
  
      <div class="row valign-wrapper">
        <div class="col s9 m11">
          <h4 class="font-bold">Categorias</h4>
        </div>      
        <div class="col s3 m1">
          <a href="{{ route('categorias.index') }}" class="font-bold color-cut-letra">ver más</a>
        </div>      
      </div>

      <div class="row">
          @foreach($categories as $category)
             <a href="{{ route('categorias.show', [$category->id]) }}">
            <div class="col s6 m2">
              <div class="card hoverable secundary-color-bg" style="max-height: 13em;min-height: 13em;">
                <div class="card-image ">
                  <img src="{{ asset('img/'.$category->name.'.jpg') }}" alt="{{$category->name}}" style="max-height: 8em;min-height: 8em;">
                </div>
                <div class="card-content four-color-bg">
                  <p class="center-align white-text">{{ ucfirst($category->name) }}</p>
                </div>
               
              </div>
            </div>
           </a>

          @endforeach
      </div>

      
      <hr>
    
      <div class="row valign-wrapper">
        <div class="col s11 offset-s1 m11">
          <h4 class="font-bold">Te puede interesar</h4>
        </div>      
        <div class="col  m1">
        </div>      
      </div> 

      <div class="row " >

        @foreach($sellers as $seller)
        <div class="col s12 m3">
          <div class="card  hoverable line-bottom">
            <div class="card-image waves-effect waves-block waves-light">
              <img class="activator img-responsive img-sizes" alt="{{ $seller->name}}"   src="{{ Storage::url($seller->image) }}" >
            </div>
            <div class="card-content four-color-bg ">
              <span class="card-title activator white-text center-align truncate">
                {{ str_limit($seller->title, 20)  }}
              </span>
            </div>
            <div class="card-reveal  ">
                <span class="card-title grey-text center-align truncate">
                  {{ str_limit($seller->title, 15)  }}<i class="material-icons right">close</i>
                </span>
                <p class="valign-wrapper"><i class="material-icons red-text">call</i>
                  &nbsp;{{ $seller->cellphone }}
                </p>
                <p class="valign-wrapper"><i class="material-icons green-text">place</i>
                  &nbsp;{{$seller->salon}}
                </p>
                <p class="valign-wrapper"><i class="material-icons blue-text">schedule</i>
                  &nbsp;{{$seller->schedule}}
                </p>
                @if($seller->available == 1)
                  <p class="valign-wrapper"><i class="material-icons green-text">check</i>Disponible</p>
                @elseif($seller->available == 0)
                  <p class="valign-wrapper"><i class="material-icons red-text">block</i>No Disponible</p>
                @endif

            
                <a href="{{route('seller.show',$seller->slug)}}" class="bottom btn color-cut ">Ver más</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <hr>
     
 <div class="row valign-wrapper">
        <div class="col s9 m11">
          <h4 class="font-bold">Comida</h4>
        </div>      
        <div class="col s3 m1">
          <a href="{{ route('categorias.show',1) }}" class="color-cut-letra">ver más</a>
        </div>      
      </div> 
      <div class="row " >
         @if($salados == "[]")
          <h5 class="center-align">No hay vendedores disponibles </h5>
        @endif
        @foreach($salados as $salado)
         <div class="col s12 m3">
          <div class="card  hoverable line-bottom-2">
            <div class="card-image waves-effect waves-block waves-light">
              <img alt="{{ $salado->title }}" class="activator img-responsive img-sizes"   src="{{ Storage::url($salado->image) }}" >
            </div>
            <div class="card-content four-color-bg ">
              <span class="card-title activator white-text center-align truncate">
                {{ str_limit($salado->title, 20)  }}
              </span>
            </div>
            <div class="card-reveal  ">
                <span class="card-title grey-text center-align truncate">
                  {{ str_limit($salado->title, 15)  }}<i class="material-icons right">close</i>
                </span>
                <p class="valign-wrapper"><i class="material-icons red-text">call</i>
                  &nbsp;{{ $salado->cellphone }}
                </p>
                <p class="valign-wrapper"><i class="material-icons green-text">place</i>
                  &nbsp;{{$salado->salon}}
                </p>
                <p class="valign-wrapper"><i class="material-icons blue-text">schedule</i>
                  &nbsp;{{$salado->schedule}}
                </p>
                @if($salado->available == 1)
                  <p class="valign-wrapper"><i class="material-icons green-text">check</i>Disponible</p>
                @elseif($salado->available == 0)
                  <p class="valign-wrapper"><i class="material-icons red-text">block</i>No Disponible</p>
                @endif

            
                <a href="{{route('seller.show',$salado->slug)}}" class="bottom btn color-cut ">Ver más</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
  
      <hr>

      <div class="row valign-wrapper">
        <div class="col s9 m11">
          <h4 class="font-bold">Postres </h4>
        </div>      
        <div class="col s3 m1">
          <a href="{{ route('categorias.show',2) }}" class="color-cut-letra">ver más</a>
        </div>      
      </div> 
      <div class="row " >
         @if($dulces == "[]")
          <h5 class="center-align">No hay vendedores disponibles </h5>
        @endif
        @foreach($dulces as $dulce)
         <div class="col s12 m3">
          <div class="card  hoverable line-bottom-3">
            <div class="card-image waves-effect waves-block waves-light">
              <img alt="{{ $dulce->title }}" class="activator img-responsive img-sizes"   src="{{ Storage::url($dulce->image) }}" >
            </div>
            <div class="card-content four-color-bg ">
              <span class="card-title activator white-text center-align truncate">
                {{ str_limit($dulce->title, 20)  }}
              </span>
            </div>
            <div class="card-reveal  ">
                <span class="card-title grey-text center-align truncate">
                  {{ str_limit($dulce->title, 15)  }}<i class="material-icons right">close</i>
                </span>
                <p class="valign-wrapper"><i class="material-icons red-text">call</i>
                  &nbsp;{{ $dulce->cellphone }}
                </p>
                <p class="valign-wrapper"><i class="material-icons green-text">place</i>
                  &nbsp;{{$dulce->salon}}
                </p>
                <p class="valign-wrapper"><i class="material-icons blue-text">schedule</i>
                  &nbsp;{{$dulce->schedule}}
                </p>
                @if($dulce->available == 1)
                  <p class="valign-wrapper"><i class="material-icons green-text">check</i>Disponible</p>
                @elseif($dulce->available == 0)
                  <p class="valign-wrapper"><i class="material-icons red-text">block</i>No Disponible</p>
                @endif

            
                <a href="{{route('seller.show',$dulce->slug)}}" class="bottom btn color-cut ">Ver más</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <hr>

      <div class="row valign-wrapper">
        <div class="col s9 m11">
          <h4 class="font-bold">Bebidas</h4>
        </div>      
        <div class="col s3 m1">
          <a href="{{ route('categorias.show',3) }}" class="color-cut-letra">ver más</a>
        </div>      
      </div> 
      <div class="row " >
      @if($bebidas == "[]")
          <h5 class="center-align">No hay vendedores disponibles </h5>
        @endif
        @foreach($bebidas as $bebida)
         

         <div class="col s12 m3">
          <div class="card  hoverable line-bottom-4">
            <div class="card-image waves-effect waves-block waves-light">
              <img alt="{{ $bebida->title }}" class="activator img-responsive img-sizes"   src="{{ Storage::url($bebida->image) }}" >
            </div>
            <div class="card-content four-color-bg ">
              <span class="card-title activator white-text center-align truncate">
                {{ str_limit($bebida->title, 20)  }}
              </span>
            </div>
            <div class="card-reveal  ">
                <span class="card-title grey-text center-align truncate">
                  {{ str_limit($bebida->title, 15)  }}<i class="material-icons right">close</i>
                </span>
                <p class="valign-wrapper"><i class="material-icons red-text">call</i>
                  &nbsp;{{ $bebida->cellphone }}
                </p>
                <p class="valign-wrapper"><i class="material-icons green-text">place</i>
                  &nbsp;{{$bebida->salon}}
                </p>
                <p class="valign-wrapper"><i class="material-icons blue-text">schedule</i>
                  &nbsp;{{$bebida->schedule}}
                </p>
                @if($bebida->available == 1)
                  <p class="valign-wrapper"><i class="material-icons green-text">check</i>Disponible</p>
                @elseif($bebida->available == 0)
                  <p class="valign-wrapper"><i class="material-icons red-text">block</i>No Disponible</p>
                @endif

            
                <a href="{{route('seller.show',$bebida->slug)}}" class="bottom btn color-cut ">Ver más</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>





  </div>

  @endif
<div class="margin-bottom-footer">
  
</div>


@endsection
