@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <h4 class="center-align"> jaja esta en construccion raza,sigan por el camino
                    </h4>
                    <center>
                    
                     <a  href="{{ route('welcome') }}" style="text-align: center;">inicio de la plataforma</a>
                    <br>
                      <img alt="" src="{{ asset('img/almacenar.png')}}" class="responsive-img "  alt="no encontrado">
                    </center>
                
            </div>
        </div>
    </div>
</div>
@endsection
