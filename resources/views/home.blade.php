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
                <p class="padding">
                    
                Te amo mucho amor,gracias por ponerme atención no sabes lo bonito que es para mi poderte compartir mis proyectos,te amo! mi pichonsita ❤️
                </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
