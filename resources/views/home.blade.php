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
                    
                Te amo mucho amor,gracias por ponerme atención no sabes lo bonito que es para mi poderte compartir mis proyectos contigo,te amo! mi pichonsita ❤️
                </p>
                <div class="center">
                    
                <a href="{{ route('welcome') }}" style="text-align: center;">inicio de la plataforma</a>
                </div>
                <img class="responsive-img " src="https://scontent.fgdl3-1.fna.fbcdn.net/v/t1.0-9/67968717_2440182406062477_1301510966273376256_n.jpg?_nc_cat=108&_nc_oc=AQkRIZvL2US1yxvKqjXOOIUeABnGsGRqvKrr_U0k4Y3FTkAVJLJV1tKG2YyHCPTwYIU&_nc_ht=scontent.fgdl3-1.fna&oh=3cf625c78a60bbc542e628b20870a53f&oe=5DE9AD57"  alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
