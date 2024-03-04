@extends('emails.layout.base')

@section('content')
<div class="card text-center">
    <div class="card-header">
        {{ $demand['procedure'] }}
    </div>
    <div class="card-body">
        <p>Bonjour <strong> {{ $demand['name']}}</strong></p>
        <p class="card-text">Nous sommes heureux de vous informer que l'étude de votre demande 
            <h5 class="card-title">{{ $demand['reference'] }}</h5> est a terme.
            Veuillez vous rendre sur la plateforme afin de pouvoir prendre connaissance de votre note d'étude.
        </p>
    </div>
    <div class="card-footer text-muted">
        <a href="#">© portailmid.gov.bf</a>
    </div>
</div>
@endsection